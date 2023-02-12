<?php

namespace App\Actions\Mall\Car;

class UpdateCarAction
{
    public static function handle(
        object $validated_request, 
        object $car):void
    {
        $car->car_make_id = $validated_request->car_make_id;
        $car->car_model_id = $validated_request->car_model_id;
        $car->sale_status = $validated_request->sale_status;
        $car->rent_status = $validated_request->rent_status;
        $car->num_plate = $validated_request->num_plate;
        $car->price = $validated_request->price;
        $car->detail = $validated_request->detail;
        // $car->location = $validated_request-> location;
        $car->save();
    }
}
