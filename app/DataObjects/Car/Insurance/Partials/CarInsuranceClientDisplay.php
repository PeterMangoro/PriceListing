<?php

namespace App\DataObjects\Car\Insurance\Partials;


class CarInsuranceClientDisplay
{
    public function __construct(
        public  readonly string $owner,
        public  readonly string $contact,
        public  readonly string $car_title,
        public  readonly string $car_reg,
        public  readonly string $payment,
        public  readonly string $reg_date,
        public  readonly string $reg_exp,
    ) {
    }
    public static function data(object $car)
    {

        return new self(
            $car->owner,
            $car->contact,
            $car->car_title,
            $car->car_reg,
            $car->payment,
            $car->reg_date,
            $car->reg_exp,

        );
    }
}
