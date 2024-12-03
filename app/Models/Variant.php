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
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function attributes()
    {
        return $this->belongsToMany(AttributeValue::class, 'variant_attributes');
    }
    public function variant_attributes()
    {
        return $this->belongsToMany(VariantAttribute::class);
    }
}
