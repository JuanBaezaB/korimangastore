<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    use HasFactory;

    static $rules = [
        'name' => 'required',
        'origin' => 'required'
    ];

    protected $table = 'editorials';

    protected $fillable = [
        'name',
        'origin'
    ];
}
