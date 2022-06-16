<?php

namespace App\Compiler\Sale;

class OrRule extends Binop {
    static public $name = 'or';
    
    public function check($model) {
        return $this->children['a']->check($model) || $this->children['b']->check($model);
    }
}