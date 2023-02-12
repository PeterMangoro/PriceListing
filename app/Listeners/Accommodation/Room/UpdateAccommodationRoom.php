<?php

namespace App\Listeners\Accommodation\Room;

use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Accommodation\Room\UpdatingAccommodationRoom;

class UpdateAccommodationRoom
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
     * @param  \App\Events\Accommodation\Room\UpdatingAccommodationRoom  $event
     * @return void
     */
    public function handle(UpdatingAccommodationRoom $event)
    {
        
    }
}
