<?php

namespace Database\Factories\Shared;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shared\Price>
 */
class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $order = 1;
    public function definition()
    {
        return [
            'pricable_type'=>'App\Models\Shared\Room',
            'pricable_id'=>self::$order++,
            'amount'=>fake()->randomFloat(2,0,999),

        ];
    }
}
