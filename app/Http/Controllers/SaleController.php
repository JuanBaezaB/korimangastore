<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Branch;
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

        if (!$givenId) {
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
    }
    
}
