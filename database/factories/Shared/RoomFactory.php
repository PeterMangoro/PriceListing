<?php

namespace Database\Factories\Shared;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shared\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $order = 5;
    public function definition()
    {
        return [
            'roomable_type' => 'App\Models\Mall\Accommodation', 
            'roomable_id'=>43030,
            'detail' => $this->faker->paragraph,
            'title'=>'Room '. self::$order++ ,
            'type'=>fake()->word,
            'sale_status'=> true
        ];
    }
}
