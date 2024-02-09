<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $name;
    public string $text;

    public function __construct($un, $msg)
    {
        $this->name = $un;
        $this->text = $msg;
    }

    public function broadcastOn() //: array
    {
        // return [
        //     new Channel('chat'),
        // ];
        return new Channel('chat');
    }

    // public function broadcastWith(): array
    // {
    //     return [
    //         'username' => $this->username,
    //         'message' => $this->message,
    //     ];
    // }

    // public function broadcastAs(){

    // }
}
