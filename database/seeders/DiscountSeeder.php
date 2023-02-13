<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //for products
        for ($i = 1; $i < 3000; $i++) {
            DB::table('discounts')->insert([
                //products
                // [
                //     'discountable_id' => rand(1,100000),
                //     'discountable_type' => 'App\Models\Mall\Product',
                //     // 'title' => fake()->words,
                //     'price' => fake()->randomFloat(2, 0, 500),
                //     'exp_date' =>  fake()->dateTimeBetween($startDate = '-2 years', $endDate = '+2 years', $timezone = null),
                // ],

                [
                    'discountable_id' => rand(1,100000),
                    'discountable_type' => 'App\Models\Mall\Accommodation',
                    // 'title' => fake()->words,
                    'price' => fake()->randomFloat(2, 0, 500),
                    'exp_date' =>  fake()->dateTimeBetween($startDate = '-2 years', $endDate = '+2 years', $timezone = null),
                ],



            ]);
        };
    }
}
