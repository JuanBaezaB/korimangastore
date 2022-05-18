<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;
    protected $table = 'mangas';

    protected $fillable = [
        'format_id',
        'editorial_id'
    ];

    public function creativePeople() {
        return $this->belongsToMany(CreativePerson::class, CreativePerson_manga::$table)->withPivot('creative_type');
    }
}
