<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreativePerson extends Model
{
    use HasFactory;

    public function mangas() {
        return $this->belongsToMany(Manga::class)->withPivot('creative_type');
    }

}
