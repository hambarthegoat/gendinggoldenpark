<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HouseType extends Model
{
    protected $fillable = [
        'name', 'price', 'land', 'building',
        'bedrooms', 'bathrooms', 'carport',
        'image', 'gradient_classes', 'featured', 'sort_order',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];
}
