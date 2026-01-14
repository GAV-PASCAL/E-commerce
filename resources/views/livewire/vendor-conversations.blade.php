<div class="vendor-conversations-container">
    <div class="conversations-header">
        <h2><i class='bx bx-message-dots'></i> Messages</h2>
        <span class="total-conversations">{{ count($conversations) }} conversation(s)</span>
    </div>

    <div class="conversations-list">
        @forelse($conversations as $conversation)
            <div 
                class="conversation-item {{ $conversation['unread_count'] > 0 ? 'unread' : '' }}"
                wire:click="selectConversation({{ $conversation['id'] }})"
            >
                <div class="conversation-avatar">
                    <i class='bx bx-user-circle'></i>
                </div>
                
                <div class="conversation-info">
                    <div class="conversation-header-info">
                        <h4 class="client-name">
                            {{ $conversation['user']['prenom'] }} {{ $conversation['user']['nom'] }}
                        </h4>
                        @if($conversation['last_message_at'])
                            <span class="conversation-time">
                                {{ \Carbon\Carbon::parse($conversation['last_message_at'])->diffForHumans() }}
                            </span>
                        @endif
                    </div>
                    
                    <div class="conversation-preview">
                        @if($conversation['last_message'])
                            <p class="last-message">
                                {{ Str::limit($conversation['last_message']['message'], 50) }}
                            </p>
                        @else
                            <p class="last-message no-message">Aucun message</p>
                        @endif
                        
                        @if($conversation['unread_count'] > 0)
                            <span class="unread-badge">{{ $conversation['unread_count'] }}</span>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="no-conversations">
                <i class='bx bx-message-x'></i>
                <p>Aucune conversation pour le moment</p>
            </div>
        @endforelse
    </div>

    <style>
    .vendor-conversations-container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        height: 98%;
        display: flex;
        flex-direction: column;
    }

    .conversations-header {
        padding: 10px;
        border-bottom: 2px solid #B45309;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .conversations-header h2 {
        margin: 0;
        font-size: 1.5rem;
        color: #;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .conversations-header h2 i {
        font-size: 1.8rem;
        color: #92400E;
    }

    .total-conversations {
        background: #B45309;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.9rem;
        color: #fff;
    }

    .conversations-list {
        flex: 1;
        overflow-y: auto;
        padding: 10px;
    }

    .conversation-item {
        display: flex;
        gap: 15px;
        padding: 15px;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-bottom: 8px;
        border: 2px solid transparent;
    }

    .conversation-item:hover {
        background: #f5f5dc;
        transform: translateX(3px);
    }

    .conversation-item.active {
        background: #e3f2fd;
        border-color: #B45309;
    }

    .conversation-item.unread {
        background: #fff9e6;
    }

    .conversation-avatar {
        flex-shrink: 0;
    }

    .conversation-avatar i {
        font-size: 3rem;
        color: #3f3f3fff;
    }

    .conversation-info {
        flex: 1;
        min-width: 0;
    }

    .conversation-header-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 5px;
    }

    .client-name {
        margin: 0;
        font-size: 1.1rem;
        color: #000000ff;
        font-weight: 600;
    }

    .conversation-time {
        font-size: 0.9yrem;
        color: #000000ff;
        white-space: nowrap;
    }

    .conversation-preview {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
    }

    .last-message {
        margin: 0;
        font-size: 0.9rem;
        color: #6e6e6eff;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .last-message.no-message {
        font-style: italic;
        color: #303030ff;
    }

    .unread-badge {
        background: #e74c3c;
        color: white;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: bold;
        flex-shrink: 0;
    }

    .no-conversations {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 60px 20px;
        color: #191919ff;
    }

    .no-conversations i {
        font-size: 4rem;
        margin-bottom: 15px;
        opacity: 0.5;
    }

    .no-conversations p {
        font-size: 1.1rem;
        margin: 0;
    }

    /* Scrollbar personnalisée */
    .conversations-list::-webkit-scrollbar {
        width: 6px;
    }

    .conversations-list::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .conversations-list::-webkit-scrollbar-thumb {
        background: #bdc3c7;
        border-radius: 10px;
    }

    .conversations-list::-webkit-scrollbar-thumb:hover {
        background: #ffffffff;
    }
    </style>
</div>
