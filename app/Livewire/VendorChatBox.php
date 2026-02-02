<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Conversation;
use App\Models\Message;
use App\Events\MessageSent;
use App\Events\ConversationUpdated;
use App\Notifications\NewMessageNotification;
use App\Jobs\SendUnreadMessageEmailJob;

class VendorChatBox extends Component
{
    public $conversationId;
    public $newMessage = '';
    public $messages = [];
    public $conversation = null;

    public function mount($conversationId)
    {
        $this->conversationId = $conversationId;
        $this->loadMessages();
        $this->loadConversation();
        
        // Marquer comme lu
        $conversation = Conversation::find($conversationId);
        if ($conversation) {
            $conversation->markAsRead();
        }
    }

    public function loadConversation()
    {
        $this->conversation = Conversation::with(['user', 'lastMessage'])
            ->find($this->conversationId);
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
        \Log::info('VendorChatBox::sendMessage appelée', [
            'conversationId' => $this->conversationId,
            'newMessage' => $this->newMessage,
            'user_id' => auth()->id(),
        ]);

        $this->validate([
            'newMessage' => 'required|string|max:1000',
        ]);

        $message = Message::create([
            'conversation_id' => $this->conversationId,
            'sender_id' => auth()->id(),
            'message' => $this->newMessage,
            'message_type' => 'text',
            'is_read' => false,
        ]);

        \Log::info('Message créé', ['message_id' => $message->id]);

        // Mettre à jour la conversation
        $conversation = Conversation::find($this->conversationId);
        $conversation->update(['last_message_at' => now()]);

        // Broadcast les événements
        broadcast(new MessageSent($message))->toOthers();
        broadcast(new ConversationUpdated($conversation))->toOthers();

        // Notifier le client
        if ($conversation->user) {
            $conversation->user->notify(new NewMessageNotification($message));
            
            // Programmer l'envoi d'un email si le message n'est pas lu après 5 minutes
            SendUnreadMessageEmailJob::dispatch($message->id, $conversation->user->id)
                ->delay(now()->addMinutes(5));
        }

        $this->newMessage = '';
        $this->loadMessages();
        
        // Dispatch l'événement pour vider l'input côté client
        $this->dispatch('vendor-message-sent');
        
        \Log::info('Message envoyé avec succès');
    }

    public function getListeners()
    {
        return [
            "echo-private:conversation.{$this->conversationId},message.sent" => 'messageReceived',
        ];
    }

    public function messageReceived($data)
    {
        $this->loadMessages();
        
        // Marquer comme lu automatiquement
        $conversation = Conversation::find($this->conversationId);
        if ($conversation) {
            $conversation->markAsRead();
        }

        $this->dispatch('message-received');
    }

    public function render()
    {
        return view('livewire.vendor-chat-box');
    }
}
