<?php

namespace App\Compiler\Sale;

use Illuminate\Support\Str;

class RuleCompiler {

    public $rule;
    protected $compiled;

    public function __construct($rule = null) {
        $this->rule = $rule;
        $this->compiled = null;
    }

    protected static $RULES = [
        OrRule::class,
        AndRule::class,
        HasCategoryRule::class,
        HasIdRule::class
    ];

    protected static function compileRule($rule) {
        foreach (static::$RULES as $ruleClass) {
            if (call_user_func([$ruleClass, 'canCompile'], $rule)) {
                return new $ruleClass($rule);
            }
        }
    }

    /**
     * @return \App\Compiler\SaleRuleCompiler
     */
    public function compile() {
        $this->compiled = self::compileRule($this->rule);
        return $this;
    }

    public function check($model) {
        $f = $this->compiled;
        return $f($model);
    }

}
