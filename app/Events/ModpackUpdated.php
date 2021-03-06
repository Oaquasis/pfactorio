<?php

namespace pfactorio\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ModpackUpdated implements  ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $title, $type, $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message, $type = "danger")
    {
        $this->title = "Mods Synchronisation";
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('pf_notifications');
    }

    public function broadcastAs()
    {
        return "notify";
    }
}
