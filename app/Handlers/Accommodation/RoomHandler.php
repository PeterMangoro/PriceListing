<?php

namespace App\Handlers\Accommodation;

use App\Models\Accommodation;
use App\DataObjects\Accommodation\Room\RoomCreateData;
use App\Http\Requests\Accommodation\Room\CreateRoomRequest;
use App\Events\Accommodation\Room\CreatingAccommodationRoom;

class RoomHandler
{
  

    public static function store(Accommodation $accommodation, CreateRoomRequest $request)
    {
        $validated_object = RoomCreateData::fromRequest($request);
        event(
            new CreatingAccommodationRoom(
                $accommodation,
                $validated_object));
    }  

    
}
