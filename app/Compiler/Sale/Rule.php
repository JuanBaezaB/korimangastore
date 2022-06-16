<?php

namespace App\Compiler\Sale;

use Illuminate\Support\Arr;

class Rule {
    static protected $name = '';
    static public $arguments = [];
    static public $subrules = [];

    /**
     * Array of children rules
     * @var $children
     */
    protected $children = [];
    protected $givenArguments = [];
    
    public function __construct($json) {
        $json = collect($json);
        $this->children = $json->only(static::$subrules)->map([RuleCompiler::class, 'compileRule']);
        $this->givenArguments = $json->only(static::$arguments);
    }

    public function check($model) {
        return false;
    }

    static public function canCompile($json) {
        return collect($json)->has(Arr::flatten([static::$name, static::$arguments, static::$subrules]));
    }

}
