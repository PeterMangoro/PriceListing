<?php

namespace App\Listeners\Social;

use App\Events\Social\UpdatingSocial;
use App\Services\Shared\SocialService;

class UpdateSocial
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
     * @param  \App\Events\Social\UpdatingSocial  $event
     *
     * @return void
     */
    public function handle(UpdatingSocial $event)
    {
        $validated_request = $event->validated_request;
        $social = $event->social;
        SocialService::update($validated_request, $social);
    }
}
