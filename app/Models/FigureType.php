<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FigureType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function figure() {
        return $this->hasMany(Figure::class);
    }
}
