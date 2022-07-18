<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuestion extends Model
{
    use HasFactory;

    static $rules = [
        'email' => 'required',
        'title' => 'required',
        'description' => 'required',
        'answer',
        'status',
    ];
}
