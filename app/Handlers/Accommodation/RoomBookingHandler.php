<?php

namespace App\Handlers\Accommodation;

use App\Models\Shared\Room;
use App\Actions\Accommodation\Room\CheckOutRoom;
use App\DataObjects\Accommodation\Booking\CheckInData;
use App\Events\Accommodation\Booking\CreatingAccommodationBooking;
use App\Http\Requests\Accommodation\Room\CreateAccommodationBookingRequest;


class RoomBookingHandler
{
    public static function store(CreateAccommodationBookingRequest $request, Room $room)
    {
        $validated_object = CheckInData::fromRequest($request);
        event(new CreatingAccommodationBooking($room, $validated_object, ));
    }

    public static function checkOut(Room $room)
    {
        CheckOutRoom::from($room);
    }
}
