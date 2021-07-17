<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PeriodEmployeeRelation extends Pivot
{
    //
    protected $table = 'period_employee_relation';

    public $timestamps = false;
}
