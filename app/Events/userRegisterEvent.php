<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class userRegisterEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    /**
     * Create a new event instance.
     */
    public function __construct($user)
    {
        // dd($user);
        $this->user = $user;
    }


    public function broadcastOn()
    {
        return ['push-channel'];
        // return [
        //     new Channel('push-channel'),
        // ];
    }

    public function broadcastAs()
    {
        return 'user-register';
    }
}
