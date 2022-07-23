<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class ListCart extends Component
{
    protected $listeners = ['refreshComponent'=>'$refresh'];
    protected function getCart(){
        if(!Auth::guest()){
            $userId = auth()->user()->id;
           Cart::session($userId);
        }
        $cart = Cart::getContent();
        return $cart;

    }
    public function render()
    {
        return view('livewire.list-cart',['cart'=>$this->getCart()]);
    }


}
