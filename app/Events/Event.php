<?php

namespace App\Events;

use App\Ciclo;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Event
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $ciclo;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Ciclo $ciclo)
    {
        $this->ciclo = $ciclo;
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
