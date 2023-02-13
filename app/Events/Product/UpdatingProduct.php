<?php

namespace App\Events\Product;

use App\Models\Product;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdatingProduct
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public object $product;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(public object $validated_request, public string $uuid)
    {
        $product = Product::whereUUIDmatches($uuid)->first();
        $this->validated_request = $validated_request;
        $this->product = $product;
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
