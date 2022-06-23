<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\User;
use App\Models\Product;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $branches = Branch::all();
        $the_branch = null;
        if (empty($id_branch)) {
            $is_all_branches = true;
        } else {
            $the_branch = Branch::find($id_branch);
            $is_all_branches = false;
        }

        $the_compact = compact('branches', 'is_all_branches', 'the_branch');
        return response()->view('admin.sales.list_sale', $the_compact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $id_branch = $request->get('id', null);
        $branches = Branch::all();
        $the_branch = null;
        if (!empty($id_branch)) {
            $the_branch = Branch::find($id_branch);
        }
        $the_compact = compact('branches', 'the_branch');
        return response()->view('admin.sales.add_sale', $the_compact);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
<<<<<<< Updated upstream
        $quantity = $request->get('quantity');

        $normalizedQuantity = ($request->get('reverse')) ? -$quantity : $quantity;

        $branch_id = $request->get('branch_id');
        $product_id = $request->get('product_id');
        $product = Product::findOrFail($product_id);
        $branch = $product->branches()->find($branch_id);
        if (empty($branch)) {
            if ($normalizedQuantity <= 0) {
                throw new \Exception("expected positive quantity for non existent stock");
            }
            $product->branches()->attach($branch_id, ['stock' => $quantity]);
        } else {
            $stock = $product->branches()->newPivotStatementForId($branch)->value('stock');
            if ($stock + $normalizedQuantity < 0) {
                throw new \Exception("expected positive quantity for new stock value");
            }
            $product->branches()->updateExistingPivot($branch, ['stock' => $stock + $normalizedQuantity]);
        }
        $product->category->name;
        $ret = [
            'quantity' => $normalizedQuantity,
            'branch' => $branch,
            'product' => $product
        ];
        return response()->json($ret);
=======
        $request->validate([
            'products' => 'array|required',
            'products.*.id' => 'exists:products,id|required',
            'products.*.n' => 'gt:0|integer|required',
            'discount_amount' => 'gte:0|integer',
            'branch_id' => 'exists:branches,id|required'
        ]);

        $all = collect($request->all());
        $discountAmount = $all->get('discount_amount');
        $productsRaw = collect($all->get('products'));
        $branch_id = $all->get('branch_id');
        $branch = Branch::find($branch_id);
        $products = $productsRaw->mapWithKeys(function ($item, $key) {
            return [
                $item['id'] => [
                    'amount' => $item['n']
                ]
            ];
        });

        DB::transaction(function ()
        use ($products, $branch, $discountAmount, $request, $branch_id) {
            foreach ($products as $id => $stuff) {
                // TODO: cambiar este hack
                (new StockController)->change(-$stuff['amount'], $branch, $id);
            }

            $sale = new Sale();
            $sale->discount_amount = $discountAmount;
            $sale->user_id = $request->user()->id;
            $sale->branch_id = $branch_id;
            $sale->save();

            $sale->products()->sync($products);
        });
        return response()->json(['success' => true]);
>>>>>>> Stashed changes
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }

    public function list(Request $request)
    {
        $givenId = $request->get('id', null);

        if (!$givenId) {
<<<<<<< Updated upstream
            $products = Sale::with('branches', 'category')
            ->withSum('branches', 'branch_product.stock')
            ->get()
            ->toArray();
        } else {
            $products = Sale::with([
                'branches' => function ($query) use ($givenId) {
                    $query->whereKey($givenId);
                },
                'category'])
            ->whereRelation('branches', 'branch_id', $givenId)
            ->whereRelation('branches', 'stock', '>', 0)
            ->get()
            ->toArray();
        }
        return response()->json([ "data" => $products]);
=======
            $sales = Sale::with(['branch', 'products', 'user'])
                ->withCount('products')
                ->addSelect([
                    'total_price' => Product::selectRaw('SUM(product_sale.amount * products.price)')
                        ->join('product_sale', 'product_sale.product_id', '=', 'products.id')
                        ->whereColumn('product_sale.sale_id', 'sales.id')
                ]);
        } else {
            $sales = Sale::with(['branch', 'products', 'user'])
                ->withCount('products')
                ->whereRelation('branch', 'id', $givenId)
                ->addSelect([
                    'total_price' => Product::selectRaw('SUM(product_sale.amount * products.price)')
                        ->join('product_sale', 'product_sale.product_id', '=', 'products.id')
                        ->whereColumn('product_sale.sale_id', 'sales.id')
                ]);
        }
        $sales = $sales->get()->toArray();
        return response()->json(["data" => $sales]);
>>>>>>> Stashed changes
    }



    public function charts()
    {
        $salesMonth = [];
        $percentListSales = [];
        $percentListUser = [];

        $sales = Sale::all();
        $cUsers  = User::count();
        $cSales = Sale::count();
        $cProducts = Product::count();

        $dateFrom = Carbon::now()->subDays(30);
        $dateTo = Carbon::now();

        $previousDateFrom = Carbon::now()->subDays(60);
        $previousDateTo = Carbon::now()->subDays(31);

        //Variables function retPercent

        $monthlySales = Sale::where('created_at', '>=', $dateFrom)->where('created_at', '<=', $dateTo)->count();
        $previousMonthlySales = Sale::where('created_at', '>=', $previousDateFrom)->where('created_at', '<=', $previousDateTo)->count();

        $monthlyUsers = User::where('created_at', '>=', $dateFrom)->where('created_at', '<=', $dateTo)->count();
        $previousMonthlyUser = User::where('created_at', '>=', $previousDateFrom)->where('created_at', '<=', $previousDateTo)->count();




        $salesMonth['Enero'] =  Sale::whereMonth('created_at', '=', '01')->whereYear('created_at', '=', date("Y"))->count('id');
        $salesMonth['Febrero'] =  Sale::whereMonth('created_at', '=', '02')->whereYear('created_at', '=', date("Y"))->count('id');
        $salesMonth['Marzo'] =  Sale::whereMonth('created_at', '=', '03')->whereYear('created_at', '=', date("Y"))->count('id');
        $salesMonth['Abril'] =  Sale::whereMonth('created_at', '=', '04')->whereYear('created_at', '=', date("Y"))->count('id');
        $salesMonth['Mayo'] =  Sale::whereMonth('created_at', '=', '05')->whereYear('created_at', '=', date("Y"))->count('id');
        $salesMonth['Junio'] =  Sale::whereMonth('created_at', '=', '06')->whereYear('created_at', '=', date("Y"))->count('id');
        $salesMonth['Julio'] =  Sale::whereMonth('created_at', '=', '07')->whereYear('created_at', '=', date("Y"))->count('id');
        $salesMonth['Agosto'] =  Sale::whereMonth('created_at', '=', '08')->whereYear('created_at', '=', date("Y"))->count('id');
        $salesMonth['Septiembre'] =  Sale::whereMonth('created_at', '=', '09')->whereYear('created_at', '=', date("Y"))->count('id');
        $salesMonth['Octubre'] =  Sale::whereMonth('created_at', '=', '10')->whereYear('created_at', '=', date("Y"))->count('id');
        $salesMonth['Noviembre'] =  Sale::whereMonth('created_at', '=', '11')->whereYear('created_at', '=', date("Y"))->count('id');
        $salesMonth['Diciembre'] =  Sale::whereMonth('created_at', '=', '12')->whereYear('created_at', '=', date("Y"))->count('id');


        function retPercent($monthly, $previousMonthly) //necesito que reciba una clase (sale, user)
        {

            $list_data = [];
            if ($previousMonthly < $monthly) {
                if ($previousMonthly > 0) {
                    $sustract = $monthly - $previousMonthly;
                    $list_data['mark']  = "+";
                    $list_data['percent'] = $sustract / $previousMonthly * 100; //incremento de porcentaje
                } else {
                    $list_data['mark']  = "+";
                    $list_data['percent'] = 100; //incremento de porcentaje

                }
            } else {
                $sustract = $previousMonthly - $monthly;
                $list_data['mark'] = "-";
                $list_data['percent'] = $sustract / $previousMonthly * 100; //disminucion de porcentaje
            }
            return $list_data;
        }
        $percentListSales = retPercent($monthlySales, $previousMonthlySales);
        $percentListUsers = retPercent($monthlyUsers, $previousMonthlyUser);




        return view('admin.basic_management.internal_configuration.sale.graphic.graphic', compact('salesMonth', 'cUsers', 'cSales', 'cProducts', 'sales', 'percentListUsers', 'percentListSales'));
    }
}
