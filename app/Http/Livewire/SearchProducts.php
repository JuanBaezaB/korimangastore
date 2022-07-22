<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchProducts extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.search-products');
    }

    public function filter()
    {
        $this->emitTo('show-products','searchProduct', $this->search);
    }
}
