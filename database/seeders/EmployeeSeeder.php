<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'emp_id' => 'EMP00001',
            'full_name' => 'Kevin Malone',
        ]);
        DB::table('employees')->insert([
            'emp_id' => 'EMP00002',
            'full_name' => 'Michael',
        ]);
        DB::table('employees')->insert([
            'emp_id' => 'EMP00003',
            'full_name' => 'John Doe',
        ]);
        DB::table('employees')->insert([
            'emp_id' => 'EMP00004',
            'full_name' => 'Jane Doe',
        ]);
    }
}
