<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreativePerson extends Model
{
    use HasFactory;

    protected $table = 'creative_people';

    protected $fillable = [
        'name'
    ];

    static $rules = [
        'name' => 'required'
    ];

    public function mangas() {
        return $this->belongsToMany(Manga::class, 'creative_person_mangas')->withPivot('creative_type');
    }

}
