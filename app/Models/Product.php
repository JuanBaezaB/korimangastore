<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
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
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class,'provider_id','id');
    }

    public function branches() {
        return $this->belongsToMany(Branch::class)->withPivot('stock');
    }

    public function series() {
        return $this->belongsToMany(Serie::class, Serie_product::$table);
    }
    
}
