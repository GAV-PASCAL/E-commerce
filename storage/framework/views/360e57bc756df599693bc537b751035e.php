<div>
    <div class="messages-layout">
        <div class="conversations-sidebar">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('vendor-conversations');

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2077653592-0', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
        
        <div class="chat-main">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedConversationId): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('vendor-chat-box', ['conversationId' => $selectedConversationId]);

$key = 'chat-'.$selectedConversationId;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2077653592-1', 'chat-'.$selectedConversationId);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            <?php else: ?>
                <div class="no-selection">
                    <i class='bx bx-message-square-detail' style="color: #B45309;"></i>
                    <h3>Sélectionnez une conversation</h3>
                    <p>Choisissez une conversation dans la liste pour commencer à discuter</p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

    <style>
    .messages-layout {
        display: grid;
        grid-template-columns: 400px 1fr;
        gap: 20px;
        height: calc(100vh - 250px);
        min-height: 600px;
    }

    .conversations-sidebar {
        height: 100%;
        overflow: hidden;
    }

    .chat-main {
        height: 100%;
        overflow: hidden;
    }

    .no-selection {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 40px;
        text-align: center;
    }

    .no-selection i {
        font-size: 6rem;
        color: #ecf0f1;
        margin-bottom: 20px;
    }

    .no-selection h3 {
        font-size: 2rem;
        color: #000000ff;
        margin: 0 0 10px 0;
    }

    .no-selection p {
        font-size: 1.1rem;
        color: #4c4b4bff;
        margin: 0;
    }

    @media (max-width: 1200px) {
        .messages-layout {
            grid-template-columns: 350px 1fr;
        }
    }

    @media (max-width: 992px) {
        .messages-layout {
            grid-template-columns: 1fr;
            height: auto;
        }
        
        .conversations-sidebar {
            height: 400px;
        }
        
        .chat-main {
            height: 600px;
        }
    }

    @media (max-width: 768px) {
        .messages-layout {
            gap: 15px;
        }
    }
    </style>
</div>
<?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/livewire/vendor-messages-manager.blade.php ENDPATH**/ ?>