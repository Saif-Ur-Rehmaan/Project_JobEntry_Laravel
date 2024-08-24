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
    public function definition(): array
    {
        return [
            'JobName' => fake()->company(), // Generates a company name
            'JobLocation' => fake()->city(), // Generates a city name
            'JobNature' => fake()->randomElement(['Full-time', 'Part-time', 'Contract']), // Random job nature
            'JobMinPrice' => fake()->numberBetween(0, 100), // Random minimum salary
            'JobMaxPrice' => fake()->numberBetween(150, 500), // Random maximum salary
            'JobPublishedOn' => fake()->date(), // Generates a random date
            'JobDateLine' => fake()->date(), // Generates a random deadline date
            'JobVaccencies' => fake()->numberBetween(1, 1000), // Generates a number of vacancies
            'JobDescription' => fake()->paragraph(), // Generates a paragraph for the job description
            'JobResponsiblity' => fake()->sentence(), // Generates a sentence for the job responsibility
            'JobCompanyImage' => "https://picsum.photos/200/300", // Generates a paragraph for company details
            'JobCompanyDetail' => fake()->paragraph(), // Generates a paragraph for company details
            'JobQualification' => fake()->sentence(), // Generates a sentence for job qualifications
        ];
    }
}
