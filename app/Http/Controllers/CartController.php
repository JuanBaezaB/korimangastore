<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;


class CartController extends Controller
{
    public function add()
    {
        try {
            $userId = auth()->user()->id;
            $product = Product::firstWhere('id', 1);

            $cartItem = Cart::session($userId)->add(1, $product->name, $product->price, 2, array())->associate('Product');
            Cart::session($userId)->add(455, 'Sample Item', 100.99, 2, array());
            dd(Cart::session($userId)->getContent(), Cart::session($userId)->getTotal(), $cartItem);
        } catch (\Throwable $th) {
            dd($th);
        }

    }
}
