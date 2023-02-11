<?php

namespace App\Listeners\Social;

use App\Events\Social\CreatingSocial;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateSocial
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
     * @param  \App\Events\Social\CreatingSocial  $event
     * @return void
     */
    public function handle(CreatingSocial $event)
    {
        //
    }
}
