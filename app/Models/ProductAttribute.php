<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    protected $table = 'attributes'; // Tên bảng thực tế trong cơ sở dữ liệu
    protected $fillable = ['name'];

    public function values()
    {
        return $this->hasMany(AttributeValue::class,'attribute_id','id');
    }
}
