<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use phpDocumentor\Reflection\Types\This;

class CustomerLawyerChatEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public int $customerId;
    public int $lawyerId;
    public string $message;

    public function __construct(int $customerId, int $lawyerId, string $message)
    {
        $this->customerId = $customerId;
        $this->lawyerId = $lawyerId;
        $this->message = $message;
    }


    public function broadcastOn(): array
    {
        return [
            new PresenceChannel('customer_id'.$this->customerId.'lawyer_id'.$this->customerId),
        ];
    }

    // public function broadcastAs(){
    //     return 'cust-lawyer-chat';
    // }

}
