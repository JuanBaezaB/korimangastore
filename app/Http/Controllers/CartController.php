<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        if(Auth::guest()){
            $cartItems = Cart::getContent();
        }else {
            $userId = auth()->user()->id;
            $cartItems = Cart::session($userId)->getContent();
        }

        return response()->view('public.cart', compact('cartItems'));
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
            Cart::session($userId);
            $product = Product::firstWhere('id', 1);

            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 4,
                'attributes' => array(),
                'associatedModel' => $product
            ]);
            dd(Cart::getContent());
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
