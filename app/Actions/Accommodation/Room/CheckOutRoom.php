<?php

namespace App\Actions\Accommodation\Room;

use App\Models\Shared\Room;

class CheckOutRoom
{
    public static function from(Room $room):void
    {
        $room->guest->delete();
    }
}
