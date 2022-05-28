<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    use HasFactory;

    static $rules = [
        'name' => 'required',
    ];

    protected $table = 'formats';

    protected $fillable = [
        'name',
        'description'
    ];

    public function mangas() {
        return $this->hasMany(Manga::class);
    }
}
