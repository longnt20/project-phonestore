<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'quantity',
        'variant_image',
        'product_id',
        'color_id',
        'storage_capacitiy_id',
    ];
}
