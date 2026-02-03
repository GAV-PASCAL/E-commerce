<div class="vendor-chat-container">
    @if($conversation)
        <div class="chat-header">
            <div class="client-info">
                <div class="profile-initials-circle">
                    {{ strtoupper(mb_substr($conversation->user->nom ?? 'U', 0, 1)) }}{{ strtoupper(mb_substr($conversation->user->prenom ?? 'N', 0, 1)) }}
                </div>
                <div>
                    <h3>{{ $conversation->user->prenom }} {{ $conversation->user->nom }}</h3>
                    <p class="client-email">{{ $conversation->user->email }}</p>
                </div>
            </div>
            <div class="chat-actions">
                <button class="btn-icon" title="Actualiser">
                    <i class='bx bx-refresh' wire:click="loadMessages"></i>
                </button>
            </div>
        </div>

        <div class="chat-messages" id="vendorChatMessages">
            @foreach($messages as $message)
                <div class="message {{ $message['sender_id'] == auth()->id() ? 'message-sent' : 'message-received' }}">
                    <div class="message-content">
                        <div class="message-header">
                            <span class="message-sender">
                                @if($message['sender_id'] == auth()->id())
                                    <i class='bx bx-shield'></i> Vous (Vendeur)
                                @else
                                    <i class='bx bx-user'></i> {{ $message['sender']['prenom'] }} {{ $message['sender']['nom'] }}
                                @endif
                            </span>
                            <span class="message-time">
                                {{ \Carbon\Carbon::parse($message['created_at'])->format('H:i') }}
                            </span>
                        </div>
                        
                        @if($message['produit'])
                            <div class="message-produit">
                                <i class='bx bx-package'></i>
                                <div>
                                    <strong>Produit concerné:</strong>
                                    <p>{{ $message['produit']['nom'] }} - {{ number_format($message['produit']['prix'], 0, ',', ' ') }} FCFA</p>
                                </div>
                            </div>
                        @endif
                        
                        <p class="message-text">{{ $message['message'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <form wire:submit.prevent="sendMessage" class="chat-input-form">
            <div class="input-wrapper">
                <input 
                    type="text" 
                    wire:model="newMessage" 
                    placeholder="Répondre au client..." 
                    class="chat-input"
                    autocomplete="off"
                    id="vendorChatInput"
                >
                <button type="submit" class="chat-send-btn" wire:loading.attr="disabled">
                    <i class='bx bx-send' wire:loading.remove></i>
                    <i class='bx bx-loader-alt bx-spin' wire:loading></i>
                    <span wire:loading.remove>Envoyer</span>
                    <span wire:loading>Envoi...</span>
                </button>
            </div>
            @error('newMessage')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </form>
    @else
        <div class="no-conversation-selected">
            <i class='bx bx-message-square-dots'></i>
            <h3>Sélectionnez une conversation</h3>
            <p>Choisissez une conversation dans la liste pour commencer à discuter avec vos clients</p>
        </div>
    @endif

<style>
.vendor-chat-container {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    height: 100%;
    display: flex;
    flex-direction: column;
}

.chat-header {
    padding: 20px;
    border-bottom: 2px solid #f0f0f0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: linear-gradient(135deg, #92400E 0%, #B45309 100%);
    color: white;
    border-radius: 12px 12px 0 0;
}

.client-info {
    display: flex;
    align-items: center;
    gap: 15px;
}

.profile-initials-circle {
    width: 48px;
    height: 48px;
    background-color: white;
    color: #B45309;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.1rem;
    flex-shrink: 0;
}

.client-info h3 {
    margin: 0;
    font-size: 1.3rem;
    font-weight: 600;
}

.client-email {
    margin: 5px 0 0 0;
    font-size: 0.9rem;
    opacity: 0.8;
}

.chat-actions {
    display: flex;
    gap: 10px;
}

.btn-icon {
    background: rgba(255,255,255,0.2);
    border: none;
    padding: 10px;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-icon:hover {
    background: rgba(255,255,255,0.3);
    transform: scale(1.1);
}

.btn-icon i {
    font-size: 1.5rem;
    color: white;
}

.chat-messages {
    flex: 1;
    overflow-y: auto;
    padding: 20px;
    background: #f8f9fa;
}

.message {
    display: flex;
    margin-bottom: 20px;
    animation: slideIn 0.3s ease;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.message-sent {
    justify-content: flex-end;
}

.message-received {
    justify-content: flex-start;
}

.message-content {
    max-width: 70%;
    padding: 15px;
    border-radius: 12px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.message-sent .message-content {
    background: linear-gradient(135deg, #B45309 0%, #92400E 100%);
    color: white;
    border-bottom-right-radius: 4px;
}

.message-received .message-content {
    background: white;
    color: #2b2b2bff;
    border-bottom-left-radius: 4px;
}

.message-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 8px;
    padding-bottom: 8px;
    border-bottom: 1px solid #B45309;
}

.message-received .message-header {
    border-bottom-color: #ecf0f1;
}

.message-sender {
    font-size: 0.85rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 5px;
}

.message-sender i {
    font-size: 1rem;
}

.message-time {
    font-size: 0.75rem;
    opacity: 0.7;
}

.message-produit {
    background: rgba(255,255,255,0.15);
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 10px;
    display: flex;
    gap: 10px;
    align-items: start;
}

.message-received .message-produit {
    background: #ecf0f1;
}

.message-produit i {
    font-size: 1.5rem;
    margin-top: 3px;
}

.message-produit strong {
    display: block;
    margin-bottom: 3px;
}

.message-produit p {
    margin: 0;
    font-size: 0.9rem;
}

.message-text {
    margin: 0;
    line-height: 1.5;
    word-wrap: break-word;
}

.chat-input-form {
    padding: 20px;
    border-top: 2px solid #f0f0f0;
    background: white;
    border-radius: 0 0 12px 12px;
}

.input-wrapper {
    display: flex;
    gap: 10px;
}

.chat-input {
    flex: 1;
    padding: 15px 20px;
    border: 2px solid #ecf0f1;
    border-radius: 25px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.chat-input:focus {
    outline: none;
    border-color: #92400E;
    box-shadow: 0 0 0 3px #B45309;
}

.chat-send-btn {
    background: linear-gradient(135deg, #B45309 0%, #92400E 100%);
    color: white;
    border: none;
    padding: 15px 30px;
    border-radius: 25px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.chat-send-btn:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px #92400E;
}

.chat-send-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.chat-send-btn i {
    font-size: 1.2rem;
}

.error-message {
    color: #e74c3c;
    font-size: 0.85rem;
    margin-top: 5px;
    display: block;
}

.no-conversation-selected {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
    color: #424242ff;
    padding: 40px;
    text-align: center;
}

.no-conversation-selected i {
    font-size: 5rem;
    margin-bottom: 20px;
    opacity: 0.3;
}

.no-conversation-selected h3 {
    margin: 0 0 10px 0;
    font-size: 1.5rem;
    color: #3f4040ff;
}

.no-conversation-selected p {
    margin: 0;
    font-size: 1rem;
    max-width: 400px;
}

/* Scrollbar personnalisée */
.chat-messages::-webkit-scrollbar {
    width: 8px;
}

.chat-messages::-webkit-scrollbar-track {
    background: #f1f1f1;
}

.chat-messages::-webkit-scrollbar-thumb {
    background: #bdc3c7;
    border-radius: 10px;
}

.chat-messages::-webkit-scrollbar-thumb:hover {
    background: #95a5a6;
}
</style>

<script>
    // Auto-scroll vers le bas
    document.addEventListener('livewire:initialized', () => {
        console.log('VendorChatBox: Livewire initialized');
        scrollToBottom();
        
        // Écouter l'événement d'envoi de message
        Livewire.on('vendor-message-sent', () => {
            console.log('VendorChatBox: Message sent event received');
            scrollToBottom();
            // Remettre le focus sur l'input
            const input = document.getElementById('vendorChatInput');
            if (input) {
                setTimeout(() => input.focus(), 100);
            }
        });
        
        // Déboguer les soumissions de formulaire
        const form = document.querySelector('.chat-input-form');
        if (form) {
            form.addEventListener('submit', (e) => {
                console.log('VendorChatBox: Form submitted', {
                    newMessage: document.getElementById('vendorChatInput').value
                });
            });
        }
    });

    // Scroll après chaque mise à jour
    document.addEventListener('livewire:update', () => {
        console.log('VendorChatBox: Livewire updated');
        scrollToBottom();
    });

    function scrollToBottom() {
        const chatMessages = document.getElementById('vendorChatMessages');
        if (chatMessages) {
            setTimeout(() => {
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }, 100);
        }
    }
</script>
</div>
