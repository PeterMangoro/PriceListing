<?php

namespace App\Listeners\Social;

use App\Events\Social\UpdatingSocial;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateSocial
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
     * @param  \App\Events\Social\UpdatingSocial  $event
     * @return void
     */
    public function handle(UpdatingSocial $event)
    {
        //
    }
}
