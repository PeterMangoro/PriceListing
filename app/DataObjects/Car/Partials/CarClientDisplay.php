<?php

namespace App\DataObjects\Car\Partials;

use App\ValueObjects\Discount;
use App\ValueObjects\Money;

class CarClientDisplay
{
    public function __construct(
        public  readonly string $car_make, 
        public  readonly string $car_model,
        public  readonly string $price,
        public  readonly string $uuid,
        public  readonly string $latest_image,
        public  readonly ?object $discount,
    ) {
       
    }
    public static function data(object $car, ?string $morph = null)
    {       
        $price = $car->price ?? 
        $car->$morph->price;

        if ($car->discount === null) {
            $discount = null;
        } else {
            $car->discount ? 
            $discount = Discount::from($car->discount, $price) : 
            $discount = Discount::from($car->$morph->discount, $price);
        }

        return new self(
            $car->$morph->car_make ?? 
            $car->car_make,
            $car->$morph->car_model ?? 
            $car->car_model,           
            $car->price ? 
            Money::from($car->price) : 
            Money::from($car->$morph->price),
            $car->uuid ?? $car->$morph->uuid,
            collect($car)['latest_image']['path'] ??
             collect($car)[$morph]['latest_image']['path'] ?? 
             '/storage/no-thumbnail/No_image_available.svg',
            $discount
        );
    }
}
