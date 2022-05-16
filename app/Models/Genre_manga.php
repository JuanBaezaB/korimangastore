<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre_manga extends Model
{
    use HasFactory;
    protected $table = 'genre_manga';

    protected $fillable = [
        'manga_id',
        'genre_id',
    ];
}
