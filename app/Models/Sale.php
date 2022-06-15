<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    static $rules = [
		'name' => 'required',
    ];
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'product_id'
    ];
    public function product() {
      return $this->belongsTo(Poduct::class);
  }
}
