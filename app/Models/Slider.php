<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'button_text', 'button_link',
        'image', 'is_active', 'position'
    ];
}

