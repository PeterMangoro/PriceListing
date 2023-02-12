<?php

namespace App\Actions\Mall\Accommodation;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateAccommodationAction
{
    public static function handle(object $validated_request): int
    {
        $location = $validated_request->location;
        return DB::table('accommodations')->insertGetId([
            'uuid' => Str::uuid()->toString(),
            'a_rooms' => $validated_request->a_rooms,
            'detail' => $validated_request->detail,
            'location' => $location['city'] . ','.$location['town'],
            'price' => $validated_request->price,
            'sale_status' => true,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
    }
}
