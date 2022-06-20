<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BranchSelect extends Component
{

    /**
     * The id of the component
     * 
     * @var string
     */
    public $id;

    /**
     * Currently selected option
     * 
     * @var string|integer
     */
    public $current;

    /**
     * If it should show an extra "all" branches option
     * 
     * @var boolean
     */
    public $allBranches;

    public $redirectTemplate;

    public $redirect;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $current, $allBranches, $redirectTemplate, $redirect)
    {
        //
        $this->id = $id;
        $this->current = $current;
        $this->allBranches = $allBranches;
        $this->redirectTemplate = $redirectTemplate;
        $this->redirect = $redirect;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.branch-select');
    }
}
