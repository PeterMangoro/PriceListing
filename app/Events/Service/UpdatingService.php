<?php

namespace App\Events\Service;

use App\Models\Service;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UpdatingService
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public object $service;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(public object $validated_request,public string  $uuid)
    {
        $service = Service::whereUUIDmatches($uuid)->first();
        $this->validated_request = $validated_request;
        $this->service = $service;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
