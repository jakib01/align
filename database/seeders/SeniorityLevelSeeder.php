<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SeniorityLevel;

class SeniorityLevelSeeder extends Seeder
{
    public function run()
    {
        SeniorityLevel::create(['seniority_level' => 'Junior Level']);
        SeniorityLevel::create(['seniority_level' => 'Mid Level']);
        SeniorityLevel::create(['seniority_level' => 'Senior Level']);
        SeniorityLevel::create(['seniority_level' => 'Manager']);
    }
}


