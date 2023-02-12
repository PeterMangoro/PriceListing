<?php

namespace App\Events\Plot;

use App\Models\Plot;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use App\Http\Requests\Plot\UpdatePlotRequest;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UpdatingPlot
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Plot $plot;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        public object $validated_request, 
        public string $uuid )
    {
        $plot = Plot::whereUUIDMatches($uuid)->first();
        $this->validated_request = $validated_request;
        $this->plot = $plot;
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
