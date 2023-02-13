<?php

namespace App\Http\Controllers\Accommodation\Room;

use App\Handlers\Accommodation\RoomBookingHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\Accommodation\Room\CreateAccommodationBookingRequest;
use App\Models\Shared\Room;

class RoomBookingController extends Controller
{
    public function store(CreateAccommodationBookingRequest $request, Room $room)
    {
        RoomBookingHandler::store($request, $room);
        return redirect()->back()->with('flash.banner', 'Room Check-In Successful');
    }

    public function destroy(Room $room)
    {
        RoomBookingHandler::checkOut($room);
        return back()->with('flash.banner', 'Room Check-Out Successful');
    }
}
