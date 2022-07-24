<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class FilterProducts extends Component
{

    public $category_id;
    public $query;
    public $sort_by;

    public function render()
    {
        $categories = Category::get();
        return view('livewire.filter-products',['categories'=> $categories]);
    }
    public function filter($branch_id)
    {
        $this->emitTo('show-products','reloadProducts', $this->category_id, $this->sort_by);
    }
}
