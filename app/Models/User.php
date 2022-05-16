<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'social_media',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'twitter',
        'facebook',
        'instagram',
        'linkedin',
        'image_url',
    ];

    public function getSocialMediaAttribute($value)
    {
        return json_decode($value);
    }

    public function getTwitterAttribute()
    {
        return optional($this->social_media->twitter ?? null);
    }

    public function getFacebookAttribute()
    {
        return optional($this->social_media->facebook ?? null);
    }

    public function getInstagramAttribute()
    {
        return optional($this->social_media->instagram ?? null);
    }

    public function getlinkedinAttribute()
    {
        return optional($this->social_media->linkedin ?? null);
    }

    public function getImageUrlAttribute()
    {
        $image_storage = \Config::get('constants.image_storage.user_admin');
        $url = (!filter_var($this->image, FILTER_VALIDATE_URL) === false)
        ? $this->image
        : url($image_storage . '/' . $this->image);
        return $url;
    }
}
