<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Product;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

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
            $is_all_branches = true;
        } else {
            $the_branch = Branch::find($id_branch);
            $is_all_branches = false;
        }

        $the_compact = compact('branches', 'is_all_branches', 'the_branch');
        return response()->view('admin.product_management.stock.list_stock', $the_compact);
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
        return response()->view('admin.product_management.stock.add_stock', $the_compact);
    }

    /**
     * 
     * @param integer $quantity
     * @param string|integer $branch_id
     * @param string|integer|\App\Models\Product $product
     * @param bool $reverse
     * @return array
     */
    public function change($quantity, $branch_id, $product, $reverse = false) {
        /*
            NOTA: este metodo no deberia ser en controller, porque OTROS controllers tambien
            lo necesitan, una alternativa seria moverlo al modelo, pero la verdad no se que
            podria ser mas adecuado y mejor practica
        */
        if (is_numeric($product)) {
            $product = Product::findOrFail($product);
        }
        $branch = $product->branches()->find($branch_id);


        $normalizedQuantity = ($reverse) ? -$quantity : $quantity;
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

        return $ret;
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
        $reverse = $request->get('reverse', false);
        $branch_id = $request->get('branch_id');
        $product_id = $request->get('product_id');
        $ret = $this->change($quantity, $branch_id, $product_id, $reverse);
        return response()->json($ret);
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
            ->whereRelation('branches', 'stock', '>', 0)
            ->get()
            ->toArray();
        }
        return response()->json([ "data" => $products]);
    }
}
