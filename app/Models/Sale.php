<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'discount_amount'
    ];

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('amount');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function branch() {
        return $this->belongsTo(Branch::class);
    }

    public function totalPrice() {
        return Sale::whereKey($this)
        ->withSum('products', 'product_sale.amount * product.price AS total_price')
        ->groupBy('product_sale.sale_id')
        ->value('total_price');
    }
    
}
