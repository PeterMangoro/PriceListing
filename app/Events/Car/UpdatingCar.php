<?php

namespace App\Events\Car;

use App\Models\Car\Car;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdatingCar
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $car;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        public object $validated_request,
        public string $uuid
    ) {
        $car = Car::whereUUIDmatches($uuid)->first();
        $this->validated_request = $validated_request;
        $this->car = $car;
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
