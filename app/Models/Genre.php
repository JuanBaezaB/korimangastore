<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    static $rules = [
		'name' => 'required',
        'type'=>'required'
    ];

    protected $table = 'genres';

    protected $fillable = [
        'name',
        'type'
    ];
}
