

<?php $__env->startSection('title', 'Conversation'); ?>

<?php $__env->startSection('content'); ?>
<div class="conversation-page">
    <div class="conversation-wrapper">
        <div class="conversation-header-page">
            <a href="<?php echo e(route('conversations.index')); ?>" class="back-btn">
                <i class='bx bx-arrow-back'></i>
                Retour
            </a>
            <h1><i class='bx bx-chat'></i> Conversation avec le Vendeur</h1>
        </div>

        <div class="chat-wrapper">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('chat-box', ['conversationId' => $conversation->id]);

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-4268286787-0', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
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
    height: calc(115vh - 140px);
    display: flex;
    flex-direction: column;
}

.conversation-header-page {
    background: linear-gradient(135deg, #92400E 0%, #B45309 100%);
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
    background: rgba(202, 201, 201, 0.3);
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
    flex: 2;
    overflow: hidden;
    border: 2px solid #B45309;
    border-radius: 0 0 20px 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/conversations/show.blade.php ENDPATH**/ ?>