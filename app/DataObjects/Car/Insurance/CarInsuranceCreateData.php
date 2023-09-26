<?php

namespace App\DataObjects\Car\Insurance;

class CarInsuranceCreateData
{
    public function __construct(
        public readonly string $owner,
        public readonly ?string $contact,
        public readonly string $car_title,
        public readonly string $car_reg,
        public readonly ?string $zimra,
        public readonly ?string $car_insurance,
        // public readonly string $reg_date,
        public readonly string $reg_exp,
    ) {
    }
    public static function fromRequest($request)
    {
          return new self(
            $request->owner,            
            $request->contact,
            $request->car_title,
            $request->car_reg,
            $request->zimra,    
            $request->car_insurance,     
            // $request->reg_date,
            $request->reg_exp,
         
        );
    }
}
