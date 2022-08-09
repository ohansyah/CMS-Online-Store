<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'menus';

    protected $fillable = [
        'parent_id',
        'name',
        'type',
        'classification',
        'icon',
        'route',
        'classification_order',
        'classification_inner_order',
    ];

    public function scopeGetOrderedMenu($query)
    {
        return $query->orderBy('classification_order', 'asc')
            ->orderBy('classification_inner_order', 'asc');
    }
}
