<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    static $rules = [
		'name' => 'required'
    ];

    protected $table = 'series';

    protected $fillable = [
        'name'
    ];
}
