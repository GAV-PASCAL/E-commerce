<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Conversation;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Channel pour une conversation spécifique
Broadcast::channel('conversation.{conversationId}', function ($user, $conversationId) {
    $conversation = Conversation::find($conversationId);
    
    // L'utilisateur peut accéder s'il est le propriétaire de la conversation ou s'il est admin
    return $conversation && ($conversation->user_id === $user->id || $user->role_id == 1);
});

// Channel pour toutes les conversations (admin seulement)
Broadcast::channel('admin.conversations', function ($user) {
    return $user->role_id == 1;
});
