<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie_product extends Model
{
    use HasFactory;
    protected $table = 'serie_product';

    protected $fillable = [
        'product_id',
        'serie_id'
    ];
}
