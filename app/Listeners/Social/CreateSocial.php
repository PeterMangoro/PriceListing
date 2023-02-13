<?php

namespace App\Listeners\Social;

use App\Events\Social\CreatingSocial;
use App\Services\Shared\SocialService;

class CreateSocial
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
     * @param  \App\Events\Social\CreatingSocial  $event
     *
     * @return void
     */
    public function handle(CreatingSocial $event)
    {
        $validated_request = $event->validated_request;
        SocialService::create($validated_request);
    }
}
