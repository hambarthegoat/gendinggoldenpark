<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    protected $fillable = ['label', 'from_class', 'to_class', 'image', 'span', 'sort_order'];
}
