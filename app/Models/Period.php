<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    protected $fillable = [
        'month_year',
        'month',
        'year',
        'description',
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'period_employee_relation');
    }
}
