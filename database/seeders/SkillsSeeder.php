<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsSeeder extends Seeder
{
    public function run()
    {
        // Inserting skill data into the database
        DB::table('skills')->insert([
            ['skill_name' => 'PHP'],
            ['skill_name' => 'JavaScript'],
            ['skill_name' => 'Laravel'],
            ['skill_name' => 'React'],
            ['skill_name' => 'Python'],
            // Add more skills as needed
        ]);
    }
}

