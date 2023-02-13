<?php

namespace Database\Factories\Shared;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SocialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>rand(1,100000),
            'title'=>fake()->randomElement(['facebook','email','twitter','heroku','whatsApp','tiktok','youtube']),
            'username'=>fake()->userName(),
            'value'=>fake()->randomElement([fake()->email(),fake()->phoneNumber()])
        ];
    }
}
