<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch_product extends Model
{
    use HasFactory;
    protected $table = 'branch_product';

    protected $fillable = [
        'branch_id',
        'product_id',
        'stock'
    ];
}
