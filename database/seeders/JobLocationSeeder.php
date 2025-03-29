<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobLocationSeeder extends Seeder
{
    public function run()
    {
        DB::table('job_location')->insert([
            ['location_name' => 'Remote'],
            ['location_name' => 'On-site'],
            ['location_name' => 'Hybrid'],
        ]);
    }
}


