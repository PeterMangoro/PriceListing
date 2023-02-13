<?php

namespace App\Actions\Car;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateCarAction
{
    public static function handle(object $validated_request): int
    {
        return DB::table('cars')->insertGetId([
            'uuid' => Str::uuid()->toString(),
            'car_make_id' => $validated_request->car_make_id,
            'car_model_id' => $validated_request->car_model_id,
            'detail' => $validated_request->detail,
            // 'location' => $validated_request->location,
            'price' => $validated_request->price,
            'num_plate' => $validated_request->num_plate,
            'sale_status' => $validated_request->sale_status,
            'rent_status' => $validated_request->rent_status,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
    }
}
