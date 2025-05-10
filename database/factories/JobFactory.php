<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    return [
        'employer_id' => $this->faker->numberBetween(1, 10),
        'company_name' => $this->faker->company,
        'company_logo' => null,
        'title' => $this->faker->jobTitle,
        'description' => $this->faker->paragraph,
        'requirements' => implode(', ', $this->faker->words(3)),
        'benefits' => $this->faker->sentence,
        'salary_range' => '$' . $this->faker->numberBetween(40000, 120000) . '-' . '$' . $this->faker->numberBetween(121000, 200000),
        'seniority_level' => $this->faker->randomElement(['Junior', 'Mid', 'Senior']),
        'job_location' => $this->faker->city,
        'working_pattern' => $this->faker->randomElement(['On-site', 'Remote', 'Hybrid']),
        'industry' => $this->faker->word,
        'application_deadline' => $this->faker->dateTimeBetween('+1 week', '+2 months')->format('Y-m-d'),
        'visa_sponsorship' => $this->faker->randomElement(['Yes', 'No']),
        'created_at' => now(),
        'updated_at' => now(),
    ];
}
}
