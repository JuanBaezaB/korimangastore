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
        $products = Product::query();

        if(!empty($category_id)){
            $products = $products->where('category_id', $category_id);
        }

        if(!empty($query)){
            $products = $products->where('name','like','%' . $query . '%');
        }

        //dd($products->toSql(), $products->getBindings());

        $this->products = $products->get();

        //$this -> emit('resfreshComponent');
    }

}
