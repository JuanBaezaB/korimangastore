<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Branch;
use App\Models\Product;
use Illuminate\Http\Request;

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
        $products = $productsRaw->mapWithKeys(function ($item, $key) {
            return [
                $item['id'] => [
                    'amount' => $item['n']
                ]
            ];
        });

        $sale = new Sale();
        $sale->discount_amount = $discountAmount;
        $sale->user_id = $request->user()->id;
        $sale->branch_id = $branch_id;
        $sale->save();

        $sale->products()->sync($products);
        return response()->json([ 'success' => true ]);
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

    public function list(Request $request) {
        $givenId = $request->get('id', null);
        if ($givenId == -1) {
            $givenId = null;
        }

        if (!$givenId) {
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
        return response()->json([ "data" => $sales]);
    }
    
    public function charts()
    {
        $sales = Sale::all();
        
        return response()->view('admin.basic_management.internal_configuration.sale.graphic.graphic', compact('sales'));

    }
}
