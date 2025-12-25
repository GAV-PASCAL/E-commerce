<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Conversation;

class VendorConversations extends Component
{
    public $conversations = [];

    public function mount()
    {
        $this->loadConversations();
    }

    public function loadConversations()
    {
        $this->conversations = Conversation::with(['user', 'lastMessage'])
            ->orderBy('last_message_at', 'desc')
            ->get()
            ->toArray();
    }

    public function selectConversation($conversationId)
    {
        // Marquer comme lu
        $conversation = Conversation::find($conversationId);
        if ($conversation) {
            $conversation->markAsRead();
            $this->loadConversations();
        }
        
        // Émettre un événement pour informer le composant parent
        $this->dispatch('conversationSelected', conversationId: $conversationId);
    }

    #[On('echo-private:admin.conversations,conversation.updated')]
    public function conversationUpdated($data)
    {
        $this->loadConversations();
    }

    public function render()
    {
        return view('livewire.vendor-conversations');
    }
}
