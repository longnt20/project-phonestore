<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'is_active',
        'description',
        'category_id',
    ];
    public $attributes = [
        'is_active'=>0,
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function variants(){
        return $this->hasMany(Variant::class);
    }
}
