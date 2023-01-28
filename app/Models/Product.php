<?php

namespace App\Models;

use App\Traits\Model\ColumnFilterer;
use App\Traits\Model\ColumnSorter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, ColumnFilterer, ColumnSorter, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'category_id',
        'created_at',
        'updated_at',
    ];

    protected $searchable = [
        'name',
    ];

    public static function boot(){
        parent::boot();
        static::deleted(function($model){
            $model->productImages()->delete();
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function getCoverImageUrlAttribute()
    {
        return $this->productImages->isNotEmpty()
        ? $this->productImages->first()->image_url
        : \Config::get('constants.image_storage.no_image');
    }
}
