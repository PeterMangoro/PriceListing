<?php

namespace App\Actions\Shared\Payment\Accommodation;

use Illuminate\Support\Facades\DB;

class CreateAccommodationRoomPayment
{
    public static function create(
        object $room,
        object $validated_request
    ): int {
        return DB::table('payments')->insertGetId([
            'payable_type' => 'App\Models\Shared\Room',
            'payable_id' => $room->id,
            'amount' => $room->latestPrice->amount,
            'service' => $validated_request->service,
            'status' => 'Success',
            'guest' => $validated_request->guest,
        ]);
    }
}
