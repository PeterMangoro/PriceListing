<?php

namespace App\Actions\Mall\Transport;

class UpdateTripAction
{
    public static function handle(
        object $validated_request, 
        object $trip):void
    {
        $trip->car_id = $validated_request->car_id;
        $trip->destination = $validated_request->destination;
        $trip->departure = $validated_request->departure;
        $trip->date = $validated_request->date;
        $trip->price = $validated_request->price;
        $trip->passengers = $validated_request->passengers;
        $trip->detail = $validated_request->detail;
        $trip->save();
    }
}
