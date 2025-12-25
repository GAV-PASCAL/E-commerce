<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Conversation;
use App\Models\Message;
use App\Events\MessageSent;
use App\Events\ConversationUpdated;

class ChatBox extends Component
{
    public $conversationId;
    public $produitId = null;
    public $newMessage = '';
    public $messages = [];

    public function mount($conversationId, $produitId = null)
    {
        $this->conversationId = $conversationId;
        $this->produitId = $produitId;
        $this->loadMessages();
        
        // Marquer comme lu
        $conversation = Conversation::find($conversationId);
        if ($conversation && $conversation->user_id == auth()->id()) {
            $conversation->markAsRead();
        }
    }

    public function loadMessages()
    {
        $this->messages = Message::where('conversation_id', $this->conversationId)
            ->with(['sender', 'produit'])
            ->orderBy('created_at', 'asc')
            ->get()
            ->toArray();
    }

    public function sendMessage()
    {
        $this->validate([
            'newMessage' => 'required|string|max:1000',
        ]);

        $message = Message::create([
            'conversation_id' => $this->conversationId,
            'sender_id' => auth()->id(),
            'message' => $this->newMessage,
            'message_type' => 'text',
            'produit_id' => $this->produitId,
            'is_read' => false,
        ]);

        // Mettre à jour la conversation
        $conversation = Conversation::find($this->conversationId);
        $conversation->incrementUnread();

        // Broadcast les événements
        broadcast(new MessageSent($message))->toOthers();
        broadcast(new ConversationUpdated($conversation))->toOthers();

        $this->newMessage = '';
        $this->loadMessages();
        
        // Réinitialiser le produit après le premier message
        $this->produitId = null;
        
        // Dispatch l'événement pour vider l'input côté client
        $this->dispatch('message-sent');
    }

    #[On('echo-private:conversation.{conversationId},message.sent')]
    public function messageReceived($data)
    {
        $this->loadMessages();
    }

    public function render()
    {
        return view('livewire.chat-box', [
            'conversation' => Conversation::with(['user', 'lastMessage'])->find($this->conversationId)
        ]);
    }
}
