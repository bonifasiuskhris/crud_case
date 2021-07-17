<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_id',
        'full_name',
    ];

    public function components()
    {
        return $this->belongsToMany(Component::class, 'employee_component_relation');
    }

    public function periods()
    {
        return $this->belongsToMany(Period::class, 'employee_component_relation');
    }

    public function payroll()
    {
        return $this->hasMany(EmployeeComponentRelation::class);
    }
}
