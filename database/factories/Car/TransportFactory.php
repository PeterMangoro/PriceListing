<?php

namespace Database\Factories\Car;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransportFactory extends Factory
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
            'user_id' => rand(1, 9),
            'car_id' => rand(1, 100),
            'destination' => fake()->state,
            'departure' => fake()->state,
            'date' =>  fake()->dateTimeBetween($startDate = '-2 years', $endDate = '+2 years', $timezone = null),
            'price' => fake()->randomFloat(2, 0, 2342),
            'detail' => fake()->text(),
            'passengers' => rand(1, 30),
        ];
    }
}
