<?php

namespace App\Handlers\Accommodation;

use App\DataObjects\Accommodation\Room\RoomCreateData;
use App\Events\Accommodation\Room\CreatingAccommodationRoom;
use App\Http\Requests\Accommodation\Room\CreateRoomRequest;
use App\Models\Accommodation;

class RoomHandler
{
    public static function store(Accommodation $accommodation, CreateRoomRequest $request)
    {
        $validated_object = RoomCreateData::fromRequest($request);
        event(
            new CreatingAccommodationRoom(
                $accommodation,
                $validated_object
            )
        );
    }
}
