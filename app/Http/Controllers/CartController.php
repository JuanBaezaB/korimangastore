<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;


class CartController extends Controller
{
    public function cart()
    {
        $cartCollection = Cart::getContent();
        //dd($cartCollection);
        return view('cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);;
    }


    public function remove($id)
    {
        Cart::remove($id);
        return Response()->json(['response' => 'Eliminado correctamente!']);
    }


    public function add(Request $request)
    {
        try {
            $userId = auth()->user()->id;
            $product = Product::firstWhere('id', 1);

            $cartItem = Cart::session($userId)->add(1, $product->name, $product->price, 2, array());
        } catch (\Throwable $th) {
            dd($th);
        }
        return Response()->json(['response' => 'Añadido correctamente!']);
    }


    public function update(Request $request)
    {
        Cart::update(
            $request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
            )
        );
        return Response()->json(['response' => 'Actualizado correctamente!']);
    }


    public function clear()
    {
        Cart::clear();
        return Response()->json(['response' => 'Vaciado correctamente!']);
    }
}
