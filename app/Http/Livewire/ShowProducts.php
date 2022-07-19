<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ShowProducts extends Component
{
    public $products;

    protected $listeners = ['reloadProducts', 'refreshComponent'=>'$refresh'];

    public function mount()
    {
        $this->products = Product::get();
    }

    public function render()
    {
        return view('livewire.show-products',['products'=>$this->products]);
    }

    public function reloadProducts($category_id, $query)
    {
        $this->products = Product::query();

        if($category_id){
            $this->products = $this->products->where('category_id', $category_id);
        }

        if($query){
            $this->products = $this->products->where('name','like','%' . $query . '%');
        }

        $this->products = $this->products->get();

        $this -> emit('resfreshComponent');
    }

}
