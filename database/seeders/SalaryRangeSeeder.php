<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalaryRangeSeeder extends Seeder
{
    public function run()
    {
        // Inserting the salary ranges into the database
        DB::table('salary_ranges')->insert([
            ['salary_range' => '0 - £29,999'],
            ['salary_range' => '£30,000 - £49,999 GBP'],
            ['salary_range' => '£50,000 - £100,000 GBP'],
        ]);
    }
}

