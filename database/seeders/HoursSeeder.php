<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HoursSeeder extends Seeder
{
    public function run()
    {
        // Inserting hours data into the database
        DB::table('hours')->insert([
            ['hours' => 'Full-time'],
            ['hours' => 'Part-time'],
            ['hours' => 'Flexible hours'],
            ['hours' => 'Contract'],
            // Add more options as needed
        ]);
    }
}

