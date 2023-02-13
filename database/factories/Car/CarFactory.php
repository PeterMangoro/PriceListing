<?php

namespace Database\Factories\Car;


use App\Models\Car\CarMake;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $id = rand(1,242);
        $carModel= CarMake::find($id)->carModels()->inRandomOrder()->first()->id;
        // dd($carModel);
        return [
            'page_visits'=> rand(),
            'car_make_id' => $id,
            'user_id' => rand(1, 5000),
            'car_model_id' => $carModel,
            'num_plate' => (fake()->streetSuffix).(fake()->postcode),
            'detail' => fake()->text,           
            'price' => fake()->randomFloat(2, 0, 2342),
            'rent_status' => rand(0, 1),
            'sale_status' => rand(0, 1),
            'created_at'=> fake()->dateTimeBetween($startDate = '-2 years', $endDate = '+2 years', $timezone = null),

        ];
    }
}
