<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductSearch extends Component
{

    /**
     * The id of the component
     * 
     * @var string
     */
    public $id;

    /**
     * Create a new component instance.
     *
     * @param string $id
     * @return void
     */
    public function __construct($id)
    {
        //
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-search');
    }
}
