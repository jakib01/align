<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkingPatternSeeder extends Seeder
{
    public function run()
    {
        // Inserting working pattern data into the database
        DB::table('working_pattern')->insert([
            ['pattern_name' => 'Remote'],
            ['pattern_name' => 'On-site'],
            ['pattern_name' => 'Hybrid'],
            // Add more patterns as needed
        ]);
    }
}

