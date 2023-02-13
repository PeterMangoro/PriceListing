<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mall\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'page_visits'=> rand(),
            'user_id' => rand(1,1000),
            'title' => $this->faker->word,
            'price' => fake()->randomFloat(2,0,999),
            'detail' => $this->faker->paragraph,
            'sale_status'=> fake()->randomElement([True,False]),
            'created_at'=> fake()->dateTimeBetween($startDate = '-2 years', $endDate = '+2 years', $timezone = null),
        ];
    }
}
