<?php

namespace App\Compiler\Sale;

class AndRule extends Binop {
    static public $name = 'and';

    public function check($model) {
        return $this->children['a']->check($model) && $this->children['b']->check($model);
    }
}