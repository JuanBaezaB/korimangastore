<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartShopping extends Component
{
    protected $listeners = ['addProduct','deleteProduct','refreshComponent'=>'$refresh'];
    protected function getCount()
    {
        if(!Auth::guest()){
            $userId = auth()->user()->id;
            Cart::session($userId);
        }
        $count = Cart::getTotalQuantity();
        return $count;
    }

    public function render()
    {
        return view('livewire.cart-shopping', ['count' => $this->getCount()]);
    }

    public function addProduct($productId)
    {
        $product = Product::firstWhere('id', $productId);

        if(!Auth::guest()){
            $userId = auth()->user()->id;
            Cart::session($userId);
        }

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ]);
        $this->emit('resfreshComponent');
    }

    public function deleteProduct($productId)
    {
        $product = Product::firstWhere('id', $productId);
        if(!Auth::guest()){
            $userId = auth()->user()->id;
            Cart::session($userId);
        }
        Cart::remove($product->id);

        $this->emitTo('list-cart','refreshComponent');
    }
}
