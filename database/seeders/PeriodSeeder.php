<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periods')->insert([
            'month_year' => '06-2021',
            'month' => 'June',
            'year' => '2021',
            'description'=>'Monthly Adjustment'
        ]);
        DB::table('periods')->insert([
            'month_year' => '07-2021',
            'month' => 'July',
            'year' => '2021',
            'description'=>'Adjustment Semester 1'
        ]);
    }
}
