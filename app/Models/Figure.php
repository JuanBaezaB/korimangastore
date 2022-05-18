<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Figure extends Model
{
    use HasFactory;
    protected $table = 'figures';

    protected $fillable = [
        'figure_type',
    ];

}
