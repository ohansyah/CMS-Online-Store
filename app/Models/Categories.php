<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'parent_id',
        'name',
        'image',
    ];

    public function parent()
    {
        return $this->belongsTo(Categories::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Categories::class, 'parent_id');
    }

    public function scopeParentCategory($query)
    {
        return $query->whereIn('parent_id', [1]);
    }

    public function getImageUrlAttribute()
    {
        $image_storage = \Config::get('constants.image_storage.category');
        $url = (!filter_var($this->image, FILTER_VALIDATE_URL) === false)
        ? $this->image
        : url($image_storage . '/' . $this->image);
        return $url;
    }
}
