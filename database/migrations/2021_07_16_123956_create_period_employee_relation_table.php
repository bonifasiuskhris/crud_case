<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodEmployeeRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('period_employee_relation', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('period_id');
            $table->unsignedBigInteger('employee_id');

            $table->foreign('period_id')->references('id')->on('periods');
            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('period_employee_relation');
    }
}
