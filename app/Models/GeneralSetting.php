<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralSetting extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'general_settings';

    protected $fillable = [
        'name',
        'description',
        'value',
    ];
}
