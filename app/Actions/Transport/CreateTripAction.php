<?php

namespace App\Actions\Transport;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateTripAction
{
    public static function handle(object $validated_request, ?int $new_car_id): int
    {
        //user choose an existing car
        if ($validated_request->car_id) {
            $car_id = $validated_request->car_id;
        }
        //user created a new car
        else {
            $car_id = $new_car_id;
        }

        return DB::table('transports')->insertGetId([
            'uuid' => Str::uuid()->toString(),
            'car_id' => $car_id,
            'destination' => $validated_request->destination,
            'departure' => $validated_request->departure,
            'date' => $validated_request->date,
            'passengers' => $validated_request->passengers,
            'detail' => $validated_request->detail,
            'price' => $validated_request->price,
            'user_id' => Auth::user()->id,
        ]);
    }
}
