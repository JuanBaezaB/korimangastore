<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DeleteItemCart extends Component
{
    public $productId;
    public function render()
    {
        return view('livewire.delete-item-cart');
    }
    public function delete(){
        $this->emitTo('cart-shopping', 'deleteProduct', $this->productId);
    }
}
