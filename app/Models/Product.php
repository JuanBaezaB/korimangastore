<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public const TYPE_MANGA = 1;
    public const TYPE_FIGURE = 2;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'code',
        'description',
        'price',
        'status',
        'category_id',
        'provider_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function branches() {
        return $this->belongsToMany(Branch::class)->withPivot('stock');
    }

    public function series() {
        return $this->belongsToMany(Serie::class, 'serie_product');
    }

    public function sales() {
        return $this->belongsToMany(Sale::class)->withPivot('amount');
    }

    public function productable() {
        return $this->morphTo();
    }

    /**
     * Modifies stock of this product for a branch
     * Returns an array with the branch, the stock and the product itself
     *
     * @param App\Model\Branch|integer $branch
     * @param integer $stock
     * @return array
     */
    public function changeStock($branch, $stock) {
        if (is_a($branch, Branch::class)) {
            $branch_id = $branch->id;
        } else {
            $branch_id = $branch;
        }

        if(!$branch_id || !Branch::find($branch_id)) {
            throw new \Exception("Branch with id " . $branch_id . " does not exist");
        }

        $hasTheBranch = $this->branches()->find($branch_id);
        if ($hasTheBranch) {
            $existentStock = $this->branches()->newPivotStatementForId($branch_id)->value('stock');
            $resultingStock = $stock + $existentStock;
            if ($resultingStock < 0) {
                throw new \Exception(
                    "Expected positive quantity resultant of the added stock amount."
                    . "Current stock: " . $existentStock 
                    . " Delta: " . $stock);
            }
            $this->branches()->updateExistingPivot($branch_id, ['stock' => $resultingStock]);
        } else {
            if ($stock <= 0) {
                throw new \Exception(
                    "New stock for branch can't be negative for product " 
                    . $this->id 
                    . " name=" . $this->name);
            }
            $this->branches()->attach($branch_id, ['stock' => $stock]);
        }
        
        return [
            'product' => $this,
            'quantity' => $stock,
            'branch' => $branch
        ];
    }
    
}
