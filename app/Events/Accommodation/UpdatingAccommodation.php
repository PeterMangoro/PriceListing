<?php

namespace App\Events\Accommodation;

use App\Models\Accommodation;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdatingAccommodation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Accommodation $accommodation;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        public object $validated_request,
        public string $uuid
    ) {
        $accommodation = Accommodation::whereUUIDmatches($uuid)->first();
        $this->validated_request = $validated_request;
        $this->accommodation = $accommodation;
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
