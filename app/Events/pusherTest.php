<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class pusherTest implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $test = 'test';
    public $age = 15;
    public $name = 'ahmed';

    /**
     * Create a new event instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('test.1'),
        ];
    }
    public function broadcastWith(): array
    {
        return [['first' => 'test', 'last'=> 16]];
    }

    public function broadcastAs()
    {
        return "testpusher";
    }
}
