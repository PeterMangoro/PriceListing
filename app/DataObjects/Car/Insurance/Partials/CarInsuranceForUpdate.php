<?php

namespace App\DataObjects\Car\Insurance\Partials;

use App\ValueObjects\MakePoints;

class CarInsuranceForUpdate
{
    public function __construct(
        public  readonly string $uuid,
        public readonly string $owner,
        public readonly ?array $contact,
        public readonly string $car_title,
        public readonly string $car_reg,
        public readonly ?string $zimra,
        public readonly ?string $car_insurance,
        // public readonly string $reg_date,
        public readonly string $reg_exp,
        
    ) {
    }

    public static function from(object $car)
    {
        
        return new self(
            $car->uuid,
            $car->owner,
            MakePoints::from($car->contact),
            $car->car_title,
            $car->car_reg,
            $car->zimra,
            $car->car_insurance,
            $car->reg_exp,
        );
    }
}
