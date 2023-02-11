<?php

namespace App\Actions\Shared\Payment\Accommodation;

use Illuminate\Support\Facades\DB;

class CreateAccommodationRoomPayment
{
    public static function create(
        object $room,
        object $request
    ): int {
        return DB::table('payments')->insertGetId([
            'payable_type' => 'App\Models\Shared\Room',
            'payable_id' => $room->id,
            'amount' => $room->latestPrice->amount,
            'service' => $request->service,
            'status' => 'Success',
            'guest' => $request->guest,
        ]);
    }
}
