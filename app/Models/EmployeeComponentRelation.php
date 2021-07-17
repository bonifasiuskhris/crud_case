<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EmployeeComponentRelation extends Pivot
{
    protected $table = 'employee_component_relation';

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function component()
    {
        return $this->belongsTo(Component::class);
    }
}
