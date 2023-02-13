<?php

namespace App\Listeners\Accommodation\Booking;

use App\Actions\Shared\Payment\Accommodation\CreateAccommodationRoomPayment;
use App\Events\Accommodation\Booking\CreatingAccommodationBooking;
use Illuminate\Support\Facades\DB;

class CreateAccommodationBooking
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
     * @param  \App\Events\Accommodation\Booking\CreatingAccommodationBooking  $event
     *
     * @return void
     */
    public function handle(CreatingAccommodationBooking $event)
    {
        $validated_request = $event->validated_request;
        $room = $event->room;

        DB::transaction(function () use ($validated_request, $room) {
            $payment_id = CreateAccommodationRoomPayment::create($room, $validated_request);

            $room->guest()->create([
                'guest' => $validated_request->guest,
                'payment_id' => $payment_id,
            ]);
        });
    }
}
