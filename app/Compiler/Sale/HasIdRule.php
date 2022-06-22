<?php

namespace App\Compiler\Sale;

use Illuminate\Support\Arr;

class HasIdRule extends Equal {
    static public $name = 'hasId';

    public function check($model) {
        $ids = collect(Arr::wrap($this->givenArguments['what']));
        return $ids->contains($model->id);
    }
}
