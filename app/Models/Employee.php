<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function components()
    {
        return $this->hasManyThrough(Component::class, EmployeeComponentRelation::class);
    }

    public function periods()
    {
        return $this->hasManyThrough(Period::class, PeriodEmployeeRelation::class);
    }
}
