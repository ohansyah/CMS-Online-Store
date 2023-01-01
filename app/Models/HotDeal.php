<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotDeal extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'hot_deals';

    protected $fillable = [
        'title',
        'subtitle',
        'image',
        'type',
        'data',
        'start_date',
        'end_date',
    ];

    public function scopeActive($query)
    {
        $now = date('Y-m-d H:i:s');
        return $query->where('start_date', '<=', $now)->where('end_date', '>=', $now);
    }

    public function getImageUrlAttribute()
    {
        $image_storage = \Config::get('constants.image_storage.hot_deals');

        $url = $this->image;
        if ($this->image) {
            if (!filter_var($this->image, FILTER_VALIDATE_URL)) {
                $url = url($image_storage . '/' . $this->image);
            }
        } else {
            $url = \Config::get('constants.image_storage.no_image');
        }

        return $url;
    }

    public function getDataAttribute($value)
    {
        return json_decode($value);
    }


    public function getStatusAttribute()
    {
        $now = date('Y-m-d H:i:s');
        if ($this->start_date <= $now && $this->end_date >= $now) {
            return true;
        } else {
            return false;
        }
    }
}
