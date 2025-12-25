@extends('layouts.app')

@section('title', 'Conversation')

@section('content')
<div class="conversation-page">
    <div class="conversation-wrapper">
        <div class="conversation-header-page">
            <a href="{{ route('conversations.index') }}" class="back-btn">
                <i class='bx bx-arrow-back'></i>
                Retour
            </a>
            <h1><i class='bx bx-chat'></i> Conversation avec le Vendeur</h1>
        </div>

        <div class="chat-wrapper">
            @livewire('chat-box', ['conversationId' => $conversation->id])
        </div>
    </div>
</div>

<style>
.conversation-page {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    min-height: calc(100vh - 100px);
}

.conversation-wrapper {
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    overflow: hidden;
    height: calc(100vh - 140px);
    display: flex;
    flex-direction: column;
}

.conversation-header-page {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 20px 30px;
    color: white;
}

.back-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: white;
    text-decoration: none;
    font-size: 1rem;
    margin-bottom: 10px;
    padding: 8px 15px;
    border-radius: 8px;
    background: rgba(255,255,255,0.2);
    transition: all 0.3s ease;
}

.back-btn:hover {
    background: rgba(255,255,255,0.3);
    transform: translateX(-5px);
}

.back-btn i {
    font-size: 1.2rem;
}

.conversation-header-page h1 {
    margin: 0;
    font-size: 1.8rem;
    display: flex;
    align-items: center;
    gap: 12px;
}

.conversation-header-page h1 i {
    font-size: 2rem;
}

.chat-wrapper {
    flex: 1;
    overflow: hidden;
}

/* Styles pour le composant chat-box */
.chat-wrapper .chat-container {
    height: 100%;
    border-radius: 0;
    box-shadow: none;
}

.chat-wrapper .chat-header {
    background: #f8f9fa;
    color: #2c3e50;
    border-bottom: 2px solid #ecf0f1;
    padding: 15px 20px;
}

.chat-wrapper .chat-messages {
    background: #f8f9fa;
}

@media (max-width: 768px) {
    .conversation-page {
        padding: 10px;
    }
    
    .conversation-wrapper {
        height: calc(100vh - 100px);
    }
    
    .conversation-header-page {
        padding: 15px 20px;
    }
    
    .conversation-header-page h1 {
        font-size: 1.4rem;
    }
}
</style>
@endsection
