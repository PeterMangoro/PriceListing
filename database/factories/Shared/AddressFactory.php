<?php

namespace Database\Factories\Shared;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $order = 1;

    public function definition()
    {
        $city = fake()->city;
        $city_slug = Str::of($city)->slug('_');
        $common = array(
            'addressable_id' => self::$order++ ,           
            'street'=>fake()->streetAddress,
            'town'=>fake()->streetName,
            'city'=>$city,
            'city_slug'=>$city_slug,
            'country'=>fake()->country 
        );

    $mother =   array(
             Arr::add($common,'addressable_type','App\Models\User'),#user
             Arr::add($common,'addressable_type','App\Models\Accommodation'),#accommodation
            Arr::add($common,'addressable_type','App\Models\Car'),#car
            Arr::add($common,'addressable_type','App\Models\Plot'), #plot
        ) ;

    
        foreach ($mother as $array) {
           return $array;
        }
        // return   
        //    ;
           
            
        ;
    }
}
