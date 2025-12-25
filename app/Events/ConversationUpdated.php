<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Models\Conversation;

class ConversationUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $conversation;

    /**
     * Create a new event instance.
     */
    public function __construct(Conversation $conversation)
    {
        $this->conversation = $conversation->load(['user', 'lastMessage']);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('admin.conversations'),
        ];
    }

    /**
     * The event's broadcast name.
     */
    public function broadcastAs(): string
    {
        return 'conversation.updated';
    }

    /**
     * Get the data to broadcast.
     */
    public function broadcastWith(): array
    {
        return [
            'id' => $this->conversation->id,
            'user' => [
                'id' => $this->conversation->user->id,
                'nom' => $this->conversation->user->nom,
                'prenom' => $this->conversation->user->prenom,
            ],
            'last_message' => $this->conversation->lastMessage ? [
                'message' => $this->conversation->lastMessage->message,
                'created_at' => $this->conversation->lastMessage->created_at->toISOString(),
            ] : null,
            'unread_count' => $this->conversation->unread_count,
            'last_message_at' => $this->conversation->last_message_at?->toISOString(),
        ];
    }
}
