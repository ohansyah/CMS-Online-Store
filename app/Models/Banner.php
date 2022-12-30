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

    /**
     * Remove tags from description
     *
     * @return string
     */
    public function getDescriptionHeaderAttribute()
    {
        $limit = 35;

        $withoutTag = strip_tags($this->description);
        $explode = explode(' ', $withoutTag, $limit);
        $explode[$limit - 1] = '...';
        $finalString = implode(' ', $explode);

        return $finalString;
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
