<div class="chat-container">
    <div class="chat-header">
        <h3>Conversation</h3>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($conversation): ?>
            <p><?php echo e($conversation->user->prenom); ?> <?php echo e($conversation->user->nom); ?></p>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    <div class="chat-messages" id="chatMessages">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="message <?php echo e($message['sender_id'] == auth()->id() ? 'message-sent' : 'message-received'); ?>">
                <div class="message-content">
                    <p class="message-sender"><?php echo e($message['sender']['prenom']); ?> <?php echo e($message['sender']['nom']); ?></p>
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($message['produit']): ?>
                        <div class="message-produit">
                            <strong>Produit:</strong> <?php echo e($message['produit']['nom']); ?> - <?php echo e(number_format($message['produit']['prix'], 0, ',', ' ')); ?> FCFA - <?php echo e($message['produit']['qte_min']); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    
                    <p class="message-text"><?php echo e($message['message']); ?></p><br>
                    <span class="message-time"><?php echo e(\Carbon\Carbon::parse($message['created_at'])->format('H:i')); ?></span>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['newMessage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="error-message"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
            window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('newMessage', e.target.value, false);
        });

        // Vider l'input après l'envoi
        Livewire.on('message-sent', () => {
            input.value = '';
            input.focus();
        });

        // Réinitialiser l'input après le rendu Livewire
        document.addEventListener('livewire:update', function() {
            if (window.Livewire.find('<?php echo e($_instance->getId()); ?>').newMessage === '') {
                input.value = '';
            }
        });
    }
</script>
</div>

<?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/livewire/chat-box.blade.php ENDPATH**/ ?>