<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;
    protected $fillable= [
        'first_name',
        'last_name',
        'email',
        'phone',
        'date_of_birth',
        'hire_date',
        'salary',
        'is_active',
        'department_id',
        'manager_id',
        'profile_picture',
        'address',
    ];
    public $attributes = [
        'is_active' =>0
    ];

    public function department():BelongsTo{
        return $this->belongsTo(Department::class);
    }

    public function manager():BelongsTo{
        return $this->belongsTo(Manager::class);
    }
}
