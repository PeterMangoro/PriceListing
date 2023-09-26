<?php

namespace App\Actions\Car\Insurance;

class UpdateCarInsuranceAction
{
    public static function handle(
        object $validated_request,
        object $car_insurance
    ): void {
        $car_insurance->owner = $validated_request->owner;
        $car_insurance->contact = $validated_request->contact;
        $car_insurance->car_title = $validated_request->car_title;
        $car_insurance->car_reg = $validated_request->car_reg;
        $car_insurance->zimra = $validated_request->zimra;
        $car_insurance->car_insurance = $validated_request->car_insurance;
        $car_insurance->reg_date = $validated_request->reg_date;
        $car_insurance->reg_exp = $validated_request->reg_exp;
        $car_insurance->save();
    }
}
