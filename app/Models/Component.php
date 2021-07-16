<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    public function employees()
    {
        return $this->hasManyThrough(Employee::class, EmployeeComponentRelation::class);
    }
}
