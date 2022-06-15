<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('amount');
    }

    public function totalPrice() {
        return Sale::whereKey($this)->withSum('products', 'product_sale.amount * price AS total_price')->value('total_price');
    }
    
}
