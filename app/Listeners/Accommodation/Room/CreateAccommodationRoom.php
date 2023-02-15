<?php

namespace App\Listeners\Accommodation\Room;

use App\Events\Accommodation\Room\CreatingAccommodationRoom;
use App\Models\Shared\Room;
use App\Services\Accommodation\RoomService;
use App\Services\Shared\AttachmentService;
use App\Services\Shared\PriceService;
use Illuminate\Support\Facades\DB;

class CreateAccommodationRoom
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Accommodation\Room\CreatingAccommodationRoom  $event
     *
     * @return void
     */
    public function handle(CreatingAccommodationRoom $event)
    {
        $request = $event->validated_request;
        $accommodation = $event->accommodation;
        DB::transaction(function () use ($request, $accommodation) {
            $room = RoomService::addRoomForModel($accommodation, $request);
            $room = Room::whereUUIDmatches($room->uuid)->first();
            $request->images ?
            AttachmentService::addImages($request->images, $room, 'room', 600) : null;
            PriceService::addPriceForModel($room, $request->price);
        });
    }
}
