<?php

namespace Database\Factories\Shared;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shared\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'payable_type' => 'App\Models\Shared\Room',
            'payable_id' => rand(1, 154),
            'amount' => fake()->randomFloat(2, 0, 999),
            'created_at' => fake()->dateTimeBetween($startDate = '-2 years', $endDate = '+1 month', $timezone = null),
            'status' => 'Success',
            'service' => fake()->words(3, true),
            'guest'=>fake()->name(),
        ];
    }
}
