<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProducts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_id;
    public $query;
    public $sort_by;

    protected $listeners = ['reloadProducts', 'searchProduct', 'refreshComponent'=>'$refresh'];

    protected function getProducts()
    {
        $products = Product::query();

        if(!empty($this->category_id)){
            $products = $products->where('category_id', $this->category_id);
        }

        if(!empty($this->query)){
            $products = $products->where('name','like','%' . $this->query . '%');
        }

        if(!empty($this->sort_by)){
            if ($this->sort_by == "min") {
                $products = $products->orderBy('price', request('qty', 'asc'));
            }elseif ($this->sort_by == "max") {
                $products = $products->orderBy('price', request('qty', 'desc'));
            }
        }

        return $products->paginate(12);
    }

    public function render()
    {
        return view('livewire.show-products',['products'=>$this->getProducts()]);
    }

    public function reloadProducts($category_id, $sort_by)
    {
        $this->category_id =$category_id;
        $this->sort_by = $sort_by;
        $this->resetPage();

        $this -> emit('resfreshComponent');
    }

    public function searchProduct($search)
    {
        $this->query = $search;
        $this->resetPage();
        $this -> emit('resfreshComponent');
    }

}
