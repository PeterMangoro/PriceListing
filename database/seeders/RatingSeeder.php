<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($j = 1; $j <= 3; $j++) {
            for ($i = 1; $i <= 100000; $i++) {
                DB::table('ratings')->insert(
                    [
                        //Services
                        [
                            'user_id'=>rand(1,1000),
                            'ratingable_id' => $i,
                            'ratingable_type' => 'App\Models\Mall\Service',
                            'rating' => rand(1, 10),
                            'comment' => fake()->paragraph,

                        ],
                        //Products
                        [
                            'user_id'=>rand(1,1000),
                            'ratingable_id' => $i,
                            'ratingable_type' => 'App\Models\Mall\Product',
                            'rating' => rand(1, 10),
                            'comment' => fake()->paragraph,

                        ],

                        //Accommodations
                        [
                            'user_id'=>rand(1,1000),
                            'ratingable_id' => $i,
                            'ratingable_type' => 'App\Models\Mall\Accommodation',
                            'rating' => rand(1, 10),
                            'comment' => fake()->paragraph,

                        ],

                        //Cars
                        [
                            'user_id'=>rand(1,1000),
                            'ratingable_id' => $i,
                            'ratingable_type' => 'App\Models\Mall\Car',
                            'rating' => rand(1, 10),
                            'comment' => fake()->paragraph,

                        ],

                        //Transports
                        [
                            'user_id'=>rand(1,1000),
                            'ratingable_id' => $i,
                            'ratingable_type' => 'App\Models\Mall\Transport',
                            'rating' => rand(1, 10),
                            'comment' => fake()->paragraph,

                        ],

                    ]
                );
            };
        }
    }
}
