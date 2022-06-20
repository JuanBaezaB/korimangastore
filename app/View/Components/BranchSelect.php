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

    /**
     * Template to replace the string 'id'
     * 
     * @var false|string
     */
    public $redirectTemplate;


    /**
     * @var false|string
     */
    public $redirect;

    /**
     * Create a new component instance.
     * 
     * @param string $id
     * @param string|integer $current
     * @param boolean $allBranches
     * @param false|string $redirectTemplate
     * @param false|string $redirect
     * @return void
     */
    public function __construct($id, $current, $allBranches = false, $redirectTemplate = false, $redirect = false)
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
