<?php

namespace App\Events\Car\Insurance;

use App\Models\CarInsurance;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdatingCarInsurance
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $car_insurance;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        public object $validated_request,
        public string $uuid
    ) {
        $car_insurance = CarInsurance::whereUUIDmatches($uuid)->first();
        $this->validated_request = $validated_request;
        $this->car_insurance = $car_insurance;
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
