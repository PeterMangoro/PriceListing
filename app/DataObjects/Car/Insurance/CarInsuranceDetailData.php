<?php

namespace App\DataObjects\Car\Insurance;

class CarInsuranceDetailData
{
    public function __construct(
        public readonly  int $id,
        public  readonly string $owner,
        public  readonly string $contact,
        public  readonly array $car_title,
        public  readonly object $car_reg,
        public  readonly string $payment,
        public  readonly string $reg_date,
        public readonly  string $reg_exp,
       
    ) {
    }
    public static function toWebPage($car_insurance)
    {
       
        return new self(
            $car_insurance->id,
            $car_insurance->owner,
            $car_insurance->contact,
            $car_insurance->car_title,
            $car_insurance->car_reg,
            $car_insurance->payment,
            $car_insurance->reg_date,
            $car_insurance->reg_exp,
          
        );
    }
}
