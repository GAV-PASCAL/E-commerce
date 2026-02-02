<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageNotificationIndicator extends Component
{
    public $hasUnreadMessages = false;

    public function mount()
    {
        $this->checkUnreadMessages();
    }

    public function getListeners()
    {
        $userId = Auth::id();
        return [
            "echo-private:App.Models.User.{$userId},.Illuminate\\Notifications\\Events\\BroadcastNotificationCreated" => 'onNotification',
            'message-received' => 'onMessageReceived',
        ];
    }

    public function onNotification()
    {
        $this->checkUnreadMessages();
    }

    public function onMessageReceived()
    {
        $this->checkUnreadMessages();
    }

    public function checkUnreadMessages()
    {
        if (!Auth::check()) {
            $this->hasUnreadMessages = false;
            return;
        }

        $user = Auth::user();

        // Vérifier s'il y a des messages non lus
        $unreadCount = Message::where('is_read', false)
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

        $this->hasUnreadMessages = $unreadCount > 0;
    }

    public function render()
    {
        return view('livewire.message-notification-indicator');
    }
}
