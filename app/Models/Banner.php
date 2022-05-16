<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'banners';

    protected $fillable = [
        'name',
        'description',
        'data',
        'type',
        'start_date',
        'end_date',
    ];

    public function scopeActive($query)
    {
        $now = date('Y-m-d H:i:s');
        return $query->where('start_date', '<=', $now)->where('end_date', '>=', $now);
    }

    public function scopeBanner($query)
    {
        return $query->where('type', 'home');
    }

    public function scopePopup($query)
    {
        return $query->where('type', 'popup');
    }

    public function getImageUrlAttribute()
    {
        $image_storage = \Config::get('constants.image_storage.banner');
        return url($image_storage . '/' . $this->image);
    }
}
