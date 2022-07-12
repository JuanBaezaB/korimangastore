<?php

namespace App\Events;

use App\Models\Branch;
use App\Models\Product;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OutOfStockEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $product, $branch;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Product $product, Branch $branch){
        $this->product = $product;
        $this->branch = $branch;
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
