<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserLastLogin extends Model
{
    use HasFactory;
    protected $table = 'user_last_logins';
    
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'added_on',
    ];

    
}
