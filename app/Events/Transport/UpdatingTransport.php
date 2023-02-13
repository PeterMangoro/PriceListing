<?php

namespace App\Events\Transport;

use App\Models\Car\Transport;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdatingTransport
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Transport $transport;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(public object $validated_request, public string $uuid)
    {
        $transport = Transport::where('uuid', $uuid)->first();
        $this->transport = $transport;
        $this->validated_request = $validated_request;
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
