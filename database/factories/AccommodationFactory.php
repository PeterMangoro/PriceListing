<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AccommodationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 10000),
            'page_visits' => rand(),
            'detail' => fake()->text,
            'a_rooms' => rand(1, 9),
            't_rooms' => rand(9, 20),
            // 'l_price' => fake()->randomFloat(2,0,2342),
            'location' => fake()->address,
            'price' => fake()->randomFloat(2, 0, 53342),
            'sale_status' => rand(0, 1),
            'rental_status' => rand(0, 1),
            'lodge_status' => rand(0, 1),
            'created_at' => fake()->dateTimeBetween($startDate = '-2 years', $endDate = '+2 years', $timezone = null),
        ];
    }
}
