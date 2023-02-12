<?php

namespace App\Listeners\Accommodation\Room;

use App\Models\Shared\Room;
use Illuminate\Support\Facades\DB;
use App\Services\Shared\PriceService;
use App\Services\Shared\AddressService;
use App\Services\Shared\CategoryService;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\Shared\AttachmentService;
use App\Services\Accommodation\RoomService;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Accommodation\Room\CreatingAccommodationRoom;

class CreateAccommodationRoom
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Accommodation\Room\CreatingAccommodationRoom  $event
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
            AttachmentService::addImages($request->images, $room, 'room', 300) : null;
            PriceService::addPriceForModel($room, $request->price);
        });
    }
}
