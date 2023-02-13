<?php

namespace Database\Seeders;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        for ($i = 1; $i <= 100000; $i++) {
            $city = fake()->city;
            $city_slug = Str::of($city)->slug('_');
            $common = array(
                'addressable_id' => $i,
                'street' => fake()->streetAddress,
                'town' => fake()->streetName,
                'city' => $city,
                'city_slug' => $city_slug,
                'country' => fake()->country
            );

            $mother =   array(
                Arr::add($common, 'addressable_type', 'App\Models\User'), #user
                Arr::add($common, 'addressable_type', 'App\Models\Mall\Accommodation'), #accommodation
                Arr::add($common, 'addressable_type', 'App\Models\Mall\Car'), #car
                Arr::add($common, 'addressable_type', 'App\Models\Mall\Plot'), #plot
            );
            DB::table('addresses')->insert(
                $mother
            );
        };
    }
}
