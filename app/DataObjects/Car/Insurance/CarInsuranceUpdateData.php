<?php

namespace App\DataObjects\Car\Insurance;

class CarInsuranceUpdateData
{
    public function __construct(
        public  readonly string $owner,
        public  readonly string $contact,
        public  readonly string $car_title,
        public  readonly string $car_reg,
        public  readonly string $payment,
        public  readonly string $reg_date,
        public  readonly string $rent_status,
        public  readonly string $reg_exp,
    ) {
    }
    public static function fromRequest($request)
    {      
        return new self(
            $request->owner,            
            $request->contact,
            $request->car_title,
            $request->car_reg,
            $request->payment,         
            $request->reg_date,
            $request->rent_status,
            $request->reg_exp,
           
        );
    }
}
