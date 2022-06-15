<?php

namespace App\Compiler;

use Illuminate\Support\Str;

class SaleRuleCompiler {

    public $rule;
    protected $compiled;

    public function __construct($rule = null) {
        $this->rule = $rule;
        $this->compiled = null;
    }

    protected static $RULES = [
        'or' => 'binop',
        'and' => 'binop',
        'hasCategory' => 'check',
        'hasId' => 'check'
    ];

    protected static function compileRule($rule) {
        $rule = collect($rule);

        $name = $rule->get('rule');
        $titleName = Str::title($name);
        $method = "compile${titleName}";
        $dummy = (new static);

        $type = self::$RULES[$name];

        switch ($type) {
            case 'binop': 
                return $dummy->{$method}($rule->get('a'), $rule->get('b'));
            case 'check':
                return $dummy->{$method}($rule->get('arg'));
        }
    }

    protected static function compileBinop($a, $b, $binop) {
        $aCompiled = self::compileRule($a);
        $bCompiled = self::compileRule($b);

        return function ($model) use ($aCompiled, $bCompiled, $binop) {
            return $binop($aCompiled, $bCompiled, $model);
        };
    }

    protected static function compileOr($a, $b) {
        return self::compileBinop($a, $b, function ($fa, $fb, $model) {
            return $fa($model) || $fb($model);
        });
    }

    protected static function compileAnd($a, $b) {
        return self::compileBinop($a, $b, function ($fa, $fb, $model) {
            return $fa($model) && $fb($model);
        });
    }

    protected static function recOr($arr, $check) {

        $arr = collect($arr);

        if ($arr->isEmpty()) {
            return function ($model) { return false; };
        }

        return function ($model) use ($arr, $check) {
            return $check($model, $arr->first())
            || self::recOr($arr->skip(1), $check)($model);
        };
    }

    protected static function compileCheck($idOrArray, $check) {
        if (!is_array($idOrArray)) {
            $array = [$idOrArray];
        } else {
            $array = $idOrArray;
        }
        return self::recOr($array, $check);
    }

    protected static function compileHasCategory($categoryId) {
        return self::compileCheck($categoryId, function ($model, $categoryId) {
            return $model->category->id == $categoryId;
        });
    }

    protected static function compileHasId($productId) {
        return self::compileCheck($productId, function ($model, $productId) {
            return $model->id == $productId;
        });
    }

    /**
     * @return App\Compiler\SaleRuleCompiler
     */
    public function compile() {
        $this->compiled = self::compileRule($this->rule);
        return $this;
    }

    public function check($model) {
        $f = $this->compiled;
        return $f($model);
    }

    protected function append($rule) {
        if (!$this->rule) {
            $this->rule = $rule;
        } else {
            $old = $this->rule;
            $this->rule = null;
            $this->and($rule, $this->old);
        }
        return $this;
    }

    public function and($a, $b) {
        return $this->append([
            'rule' => 'and',
            'a' => $a,
            'b' => $b
        ]);
    }

    public function hasCategory($matches) {
        return $this->append([
            'rule' => 'hasCategory',
            'arg' => $matches
        ]);
    }
}
