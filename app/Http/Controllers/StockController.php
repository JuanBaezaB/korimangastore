<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_branch = null)
    {
        //
        $branches = Branch::all();
        $the_branch = null;
        if (empty($id_branch)) {
            $products = Product::all();
            $is_all_branches = true;
        } else {
            $the_branch = Branch::find($id_branch);
            $products = Product::with('branches')
            ->whereRelation('branches', 'branch_id', $id_branch)
            ->whereRelation('branches', 'stock', '>', 0)
            ->get()
            ->toArray();
            $is_all_branches = false;
        }

        $the_compact = compact('products', 'branches', 'is_all_branches', 'the_branch');
        return response()->view('admin.product_management.stock.stock.list', $the_compact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function list(Request $request) {
        $givenId = $request->get('id', null);

        if (!$givenId) {
            $products = Product::with('branches', 'category')
            ->withSum('branches', 'branch_product.stock')
            ->get()
            ->toArray();
        } else {
            $products = Product::with([
                'branches' => function ($query) use ($givenId) {
                    $query->whereKey($givenId);
                },
                'category'])
            ->whereRelation('branches', 'branch_id', $givenId)
            ->get()
            ->toArray();
        }
        return response()->json([ "data" => $products]);
    }
}
