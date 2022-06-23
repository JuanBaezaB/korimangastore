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
    
}
