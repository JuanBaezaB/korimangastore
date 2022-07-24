<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'path'];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return string an url to the file directed by path
     */
    public function url() {
        return Storage::url($this->path);
    }
}
