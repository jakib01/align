<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustrySeeder extends Seeder
{
    public function run()
    {
        // Inserting industries into the database
        DB::table('industry')->insert([
            ['industry_name' => 'Technology'],
            ['industry_name' => 'Healthcare'],
            ['industry_name' => 'Finance'],
            ['industry_name' => 'Education'],
            ['industry_name' => 'Manufacturing'],
            ['industry_name' => 'Retail'],
        ]);
    }
}


