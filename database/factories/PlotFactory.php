<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mall\Plot>
 */
class PlotFactory extends Factory
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
            'user_id'=>rand(1,100),
            'size' => fake()->randomFloat(2,0,30),
            'price' => fake()->randomFloat(2000,0,30000),
            'detail'=>fake()->paragraph,
            'location'=>fake()->city,
            'sale_status'=>fake()->randomElement([true,false]),
            'created_at'=> fake()->dateTimeBetween($startDate = '-2 years', $endDate = '+2 years', $timezone = null),
   
        ];
    }
}
