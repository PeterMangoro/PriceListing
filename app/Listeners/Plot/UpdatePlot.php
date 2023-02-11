<?php

namespace App\Listeners\Plot;

use App\Events\Plot\UpdatingPlot;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdatePlot
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
     * @param  \App\Events\Plot\UpdatingPlot  $event
     * @return void
     */
    public function handle(UpdatingPlot $event)
    {
        //
    }
}
