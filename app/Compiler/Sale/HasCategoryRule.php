<?php

namespace App\Compiler\Sale;

use Illuminate\Support\Arr;

class HasCategoryRule extends Equal {
    static public $name = 'hasCategory';

    public function check($model) {
        $categories = collect(Arr::wrap($this->givenArguments['what']));
        return $categories->contains($model->category->id);
    }
}
