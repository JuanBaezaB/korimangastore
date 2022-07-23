<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddCart extends Component
{
    public $productId;

    public function render()
    {
        return view('livewire.add-cart');
    }
    public function add(){
        $this->emitTo('cart-shopping', 'addProduct', $this->productId);
    }
}
