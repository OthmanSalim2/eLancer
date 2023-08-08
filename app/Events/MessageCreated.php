<?php

namespace App\Events;

use Auth;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

class MessageCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    public $sender;
    /**
     * Create a new event instance.
     */
    public function __construct($message)
    {
        $this->message = $message;
        $this->sender = Auth::user();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PresenceChannel('messages.' . $this->message->recipient_id),
        ];
    }

    // this represent name of event mean will send this name without the full path of event
    public function broadcastAs()
    {
        return 'message.created';
    }

    // this method it use to send array inside it data that me need it
    // this method must always return array
    // this message it's will send to channel if was found and not construct
    public function broadcastWith(): array
    {
        return [
            'message' => $this->message,
            'user' => Auth::user()->name,
            'time' => Carbon::now()->diffForHumans(),
        ];
    }
}
