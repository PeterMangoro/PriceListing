<?php

namespace App\Listeners\Plot;

use App\Events\Plot\CreatingPlot;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreatePlot
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
     * @param  \App\Events\Plot\CreatingPlot  $event
     * @return void
     */
    public function handle(CreatingPlot $event)
    {
        //
    }
}
