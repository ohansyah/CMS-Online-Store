<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'image',
        'is_cover',
        'created_at',
        'updated_at',
    ];

    public function getImageUrlAttribute()
    {
        $image_storage = \Config::get('constants.image_storage.product');
        $url = (!filter_var($this->image, FILTER_VALIDATE_URL) === false) ? $this->image : url($image_storage . '/' . $this->image);
        return $url;
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
