<?php

namespace Database\Factories\Shared;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shared\RoomUser>
 */
class RoomUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $order = 7;

    public function definition()
    {
        return [
            'room_id'=>rand(1,154),
            'payment_id'=> self::$order++,
            'guest'=>fake()->name,
        ];
    }
}
