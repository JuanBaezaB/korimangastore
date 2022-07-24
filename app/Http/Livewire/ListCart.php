<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class ListCart extends Component
{
    protected $listeners = ['delete','refreshComponent' => '$refresh'];
    protected function getCart()
    {
        if (!Auth::guest()) {
            $userId = auth()->user()->id;
            Cart::session($userId);
        }
        $cart = Cart::getContent();
        return $cart;
    }
    public function render()
    {
        return view('livewire.list-cart', ['cart' => $this->getCart()]);
    }

    public function delete($productId)
    {
        if (!Auth::guest()) {
            $userId = auth()->user()->id;
            Cart::session($userId);
        }
        $quantity = Cart::get($productId)->quantity;
        if ($quantity - 1 == 0) {
            Cart::remove($productId);
        } else {
            Cart::update($productId, array(
                'quantity' =>-1, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
            ));
        }

        $this->emitTo('cart-shopping', 'refreshComponent');
    }

    public function add($productId)
    {
        if (!Auth::guest()) {
            $userId = auth()->user()->id;
            Cart::session($userId);
        }
        $quantity = Cart::get($productId)->quantity;
        if ($quantity + 1 < 50) {
            Cart::update($productId, array(
                'quantity' => 1,
            ));
        }

        $this->emitTo('cart-shopping', 'refreshComponent');
    }
}
