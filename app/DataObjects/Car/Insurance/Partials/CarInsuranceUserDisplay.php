<?php

namespace App\DataObjects\Car\Insurance\Partials;

use App\ValueObjects\Time;

class CarInsuranceUserDisplay
{
    public function __construct(
        public readonly  string $owner,
        public readonly  string $contact,
        public readonly  string $car_title,
        public readonly  string $car_reg,
        public  readonly string $uuid,
        public  readonly array $payment,
        public  readonly string $reg_date,
        public  readonly string $reg_exp,
        public  readonly int $id,
    ) {
    }
    public static function data($car)
    {
        $payment = [
            'zimra'=> $car->zimra ? 'zimra': null,
            'car_insurance'=> $car->car_insurance? 'Car Insurance' : null,
        ];

        return new self(
            $car->owner,
            $car->contact,
            $car->car_title,
            $car->car_reg,
            $car->uuid,
            $payment,
            Time::date($car->reg_date),
            Time::date($car->reg_exp) ,
            $car->id
        );
    }
}
