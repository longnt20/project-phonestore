<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_slide1',
        'image_slide2',
        'image_slide3',
        'image_slide4',
        'product_id',
    ];
}
