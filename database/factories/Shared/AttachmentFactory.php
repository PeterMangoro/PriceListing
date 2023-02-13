<?php

namespace Database\Factories\Shared;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attachment>
 */
class AttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id'=>rand(1,200),
            'path' => fake()->randomElement([
                'storage/Products/Images/fad6f6b3cdc97f20bfbae2a687336820eca6f58e08c7213b142a7b8c8fd8d678.jpg',
                'storage/Products/Images/10b6a1655381a34d842c8eade8a4f5e11257d0efe6af5ed2dfec4af4aa9ff038.jpg',
                'storage/Products/Images/3d370e076a06dd0096a3dda85d156988ad5e865a0f7aad92b907a525443037ce.jpg',
                'storage/Products/Images/f9d5d80828838326bbb7724a32c0003d521415595b0dd9847cf1af7ef6a40eff.jpg',
                'storage/Products/Images/a685e4b25fa21d047e08e69978f03fc13efc62701f1c67b337299617919192e6.jpg'
                
            ]),
        ];
    }
}
