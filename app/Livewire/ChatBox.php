<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Conversation;
use App\Models\Message;
use App\Events\MessageSent;
use App\Events\ConversationUpdated;
use App\Models\User;
use App\Notifications\NewMessageNotification;
use App\Jobs\SendUnreadMessageEmailJob;

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

        // Notifier le vendeur (admin)
        $vendeur = User::where('role_id', 1)->first();
        if ($vendeur) {
            $vendeur->notify(new NewMessageNotification($message));
            
            // Programmer l'envoi d'un email si le message n'est pas lu après 5 minutes
            \Log::info('ChatBox: Programmation email de rappel', [
                'message_id' => $message->id,
                'recipient_id' => $vendeur->id,
                'scheduled_for' => now()->addMinutes(5)->toDateTimeString(),
            ]);
            
            SendUnreadMessageEmailJob::dispatch($message->id, $vendeur->id)
                ->delay(now()->addMinutes(5));
        }

        $this->newMessage = '';
        $this->loadMessages();
        
        // Réinitialiser le produit après le premier message
        $this->produitId = null;
        
        // Dispatch l'événement pour vider l'input côté client
        $this->dispatch('message-sent');
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
        $this->dispatch('message-received');
    }

    public function render()
    {
        return view('livewire.chat-box', [
            'conversation' => Conversation::with(['user', 'lastMessage'])->find($this->conversationId)
        ]);
    }
}
