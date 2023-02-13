<?php

namespace Database\Factories\Shared;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shared\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => rand(1,10000), 
            'mission' =>fake()->sentence(6,true),
            'vision' =>fake()->sentence(3,true),
            'company_values' =>fake()->sentence(6,true),
            'history' =>fake()->paragraph(5,true),
            'year' =>fake()->year,
        ];
    }
}
