<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\Attributes\On;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;

class NotificationBadge extends Component
{
    public $unreadMessagesCount = 0;

    public function mount()
    {
        $this->updateCounts();
    }

    public function getListeners()
    {
        $userId = Auth::id();
        return [
            "echo-private:App.Models.User.{$userId},.Illuminate\\Notifications\\Events\\BroadcastNotificationCreated" => 'onNotification',
            'message-received' => 'onMessageReceived',
            'notification-received' => 'onNotification', // Event local optionnel
        ];
    }

    public function onNotification()
    {
        $this->updateCounts();
    }

    public function onMessageReceived()
    {
        $this->updateCounts();
    }

    public function updateCounts()
    {
        if (!Auth::check()) return;

        $user = Auth::user();

        // Compter les messages non lus envoyés par les AUTRES dans les conversations de l'utilisateur
        $this->unreadMessagesCount = Message::where('is_read', false)
            ->where('sender_id', '!=', $user->id)
            ->whereHas('conversation', function($query) use ($user) {
                if ($user->role_id == 1) {
                    // Pour le vendeur, toutes les conversations
                    return $query;
                } else {
                    // Pour le client, seulement ses conversations
                    return $query->where('user_id', $user->id);
                }
            })
            ->count();
    }

    public function render()
    {
        return view('livewire.notification-badge');
    }
}
