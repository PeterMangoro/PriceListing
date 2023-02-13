<?php

namespace App\Listeners\Accommodation\Booking;

use App\Events\Accommodation\Booking\UpdatingAccommodationBooking;

class UpdateAccommodationBooking
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
     * @param  \App\Events\Accommodation\Booking\UpdatingAccommodationBooking  $event
     *
     * @return void
     */
    public function handle(UpdatingAccommodationBooking $event)
    {
    }
}
