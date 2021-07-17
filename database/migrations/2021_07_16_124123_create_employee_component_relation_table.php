<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeComponentRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_component_relation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('period_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('component_id');
            $table->biginteger('current_amount');
            $table->biginteger('new_amount');
            $table->timestamps();

            $table->foreign('period_id')->references('id')->on('periods');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('component_id')->references('id')->on('components');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_component_relation');
    }
}
