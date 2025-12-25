<div class="chat-container">
    <div class="chat-header">
        <h3>Conversation</h3>
        @if($conversation)
            <p>{{ $conversation->user->prenom }} {{ $conversation->user->nom }}</p>
        @endif
    </div>

    <div class="chat-messages" id="chatMessages">
        @foreach($messages as $message)
            <div class="message {{ $message['sender_id'] == auth()->id() ? 'message-sent' : 'message-received' }}">
                <div class="message-content">
                    <p class="message-sender">{{ $message['sender']['prenom'] }} {{ $message['sender']['nom'] }}</p>
                    
                    @if($message['produit'])
                        <div class="message-produit">
                            <strong>Produit:</strong> {{ $message['produit']['nom'] }} - {{ number_format($message['produit']['prix'], 0, ',', ' ') }} FCFA
                        </div>
                    @endif
                    
                    <p class="message-text">{{ $message['message'] }}</p>
                    <span class="message-time">{{ \Carbon\Carbon::parse($message['created_at'])->format('H:i') }}</span>
                </div>
            </div>
        @endforeach
    </div>

    <form wire:submit.prevent="sendMessage" class="chat-input-form">
        <div class="input-wrapper" wire:ignore>
            <input 
                type="text" 
                wire:model.defer="newMessage" 
                placeholder="Écrivez votre message..." 
                class="chat-input"
                autocomplete="off"
                id="chatInput"
            >
            <button type="submit" class="chat-send-btn" wire:loading.attr="disabled">
                <span wire:loading.remove>
                    <i class='bx bx-send'></i>
                </span>
                <span wire:loading>
                    <i class='bx bx-loader-alt bx-spin'></i>
                </span>
            </button>
        </div>
        @error('newMessage')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </form>

<script>
    // Auto-scroll vers le bas au chargement
    document.addEventListener('DOMContentLoaded', function() {
        scrollToBottom();
        setupChatInput();
    });

    // Auto-scroll après chaque mise à jour Livewire
    document.addEventListener('livewire:update', function() {
        scrollToBottom();
    });

    // Fonction pour scroller vers le bas
    function scrollToBottom() {
        const chatMessages = document.getElementById('chatMessages');
        if (chatMessages) {
            setTimeout(() => {
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }, 100);
        }
    }

    // Gérer l'input manuellement pour préserver le focus
    function setupChatInput() {
        const input = document.getElementById('chatInput');
        if (!input) return;

        // Synchroniser l'input avec Livewire
        input.addEventListener('input', function(e) {
            @this.set('newMessage', e.target.value, false);
        });

        // Vider l'input après l'envoi
        Livewire.on('message-sent', () => {
            input.value = '';
            input.focus();
        });

        // Réinitialiser l'input après le rendu Livewire
        document.addEventListener('livewire:update', function() {
            if (@this.newMessage === '') {
                input.value = '';
            }
        });
    }
</script>
</div>

