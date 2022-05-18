<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreativePerson_manga extends Model
{
    use HasFactory;

    static $rules = [
        'creative_type' => 'required|in:art,story,both'
    ];

    protected $table = 'creative_person_mangas';

    protected $fillable = [
        'manga_id',
        'creative_person_id',
        'creative_type'
    ];
}
