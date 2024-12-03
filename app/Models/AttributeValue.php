<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;
    protected $table = 'attribute_values'; // Bảng liên kết với model
    protected $fillable = ['attribute_id', 'value'];
    public function attribute()
    {
        return $this->belongsToMany(ProductAttribute::class,'attribute_id','id');
    }
    public function variant_attributes()
    {
        return $this->belongsToMany(VariantAttribute::class);
    }
}
