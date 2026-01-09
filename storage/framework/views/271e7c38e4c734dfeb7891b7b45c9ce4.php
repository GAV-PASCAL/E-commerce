

<?php $__env->startSection('title', 'Mes Conversations'); ?>

<?php $__env->startSection('header'); ?>

    <section>
        <div class="title_dash">
            <div>
                <h1>DASHBOARD</h1>
            </div>
            <div class="conversation-header-page">
                <a href="<?php echo e(url('./')); ?>" class="back-btn">
                    <i class='bx bx-arrow-back'></i>
                    Retour
                </a>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div id="page_structure">
        <?php if (isset($component)) { $__componentOriginal2ccf36a322409b76566b65fcab70ed9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ccf36a322409b76566b65fcab70ed9d = $attributes; } ?>
<?php $component = App\View\Components\Client::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('client'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Client::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2ccf36a322409b76566b65fcab70ed9d)): ?>
<?php $attributes = $__attributesOriginal2ccf36a322409b76566b65fcab70ed9d; ?>
<?php unset($__attributesOriginal2ccf36a322409b76566b65fcab70ed9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2ccf36a322409b76566b65fcab70ed9d)): ?>
<?php $component = $__componentOriginal2ccf36a322409b76566b65fcab70ed9d; ?>
<?php unset($__componentOriginal2ccf36a322409b76566b65fcab70ed9d); ?>
<?php endif; ?>

        <div class="section_dash">
            <?php if (isset($component)) { $__componentOriginal020f66f7c7b8c356eb995e6f46315839 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal020f66f7c7b8c356eb995e6f46315839 = $attributes; } ?>
<?php $component = App\View\Components\Dashnav::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dashnav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Dashnav::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal020f66f7c7b8c356eb995e6f46315839)): ?>
<?php $attributes = $__attributesOriginal020f66f7c7b8c356eb995e6f46315839; ?>
<?php unset($__attributesOriginal020f66f7c7b8c356eb995e6f46315839); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal020f66f7c7b8c356eb995e6f46315839)): ?>
<?php $component = $__componentOriginal020f66f7c7b8c356eb995e6f46315839; ?>
<?php unset($__componentOriginal020f66f7c7b8c356eb995e6f46315839); ?>
<?php endif; ?> <br><br><br>

            <div class="back_formulaire">
                
                <div class="conversations-page">
                    <div class="page-header">
                        <h1><i class='bx bx-chat'></i> Mes Conversations</h1>
                        <p>Discutez avec le vendeur à propos de vos produits</p>
                    </div>

                    <div class="conversations-container">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $conversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conversation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <a href="<?php echo e(route('conversations.show', $conversation->id)); ?>" class="conversation-card">
                                <div class="conversation-icon">
                                    <i class='bx bx-store'></i>
                                </div>
                                
                                <div class="conversation-details">
                                    <div class="conversation-header">
                                        <h3>Conversation avec le Vendeur</h3>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($conversation->last_message_at): ?>
                                            <span class="conversation-date">
                                                <?php echo e($conversation->last_message_at->diffForHumans()); ?>

                                            </span>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                    
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($conversation->lastMessage): ?>
                                        <p class="last-message">
                                            <i class='bx bx-message-detail'></i>
                                            <?php echo e(Str::limit($conversation->lastMessage->message, 100)); ?>

                                        </p>
                                    <?php else: ?>
                                        <p class="last-message no-message">
                                            <i class='bx bx-message-x'></i>
                                            Aucun message
                                        </p>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                                
                                <div class="conversation-arrow">
                                    <i class='bx bx-chevron-right'></i>
                                </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="no-conversations">
                                <i class='bx bx-message-square-x'></i>
                                <h3>Aucune conversation</h3>
                                <p>Vous n'avez pas encore de conversation avec le vendeur.</p>
                                <p>Commencez une conversation depuis la page d'un produit !</p>
                                <a href="<?php echo e(route('produits.liste')); ?>" class="btn-primary">
                                    <i class='bx bx-shopping-bag'></i>
                                    Voir les produits
                                </a>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>

                <style>
                .conversations-page {
                    max-width: 1200px;
                    margin: 0 auto;
                    padding: 40px 20px;
                }

                .page-header {
                    text-align: center;
                    margin-bottom: 40px;
                }

                .page-header h1 {
                    font-size: 2.5rem;
                    color: #2c3e50;
                    margin: 0 0 10px 0;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: 15px;
                }

                .page-header h1 i {
                    font-size: 3rem;
                    color: #92400E;
                }

                .page-header p {
                    font-size: 1.1rem;
                    color: #7f8c8d;
                    margin: 0;
                }

                .conversations-container {
                    display: flex;
                    flex-direction: column;
                    gap: 20px;
                }

                .conversation-card {
                    background: white;
                    border-radius: 15px;
                    padding: 25px;
                    display: flex;
                    align-items: center;
                    gap: 20px;
                    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
                    transition: all 0.3s ease;
                    text-decoration: none;
                    color: inherit;
                    border: 2px solid transparent;
                }

                .conversation-card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 8px 25px rgba(52, 152, 219, 0.2);
                    border-color: #B45309;
                }

                .conversation-icon {
                    background: linear-gradient(135deg, #92400E 0%, #B45309 100%);
                    width: 70px;
                    height: 70px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-shrink: 0;
                }

                .conversation-icon i {
                    font-size: 2.5rem;
                    color: white;
                }

                .conversation-details {
                    flex: 1;
                    min-width: 0;
                }

                .conversation-header {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-bottom: 10px;
                }

                .conversation-header h3 {
                    margin: 0;
                    font-size: 1.3rem;
                    color: #B45309;
                    font-weight: 600;
                }

                .conversation-date {
                    font-size: 0.9rem;
                    color: #95a5a6;
                    white-space: nowrap;
                }

                .last-message {
                    margin: 0;
                    font-size: 1rem;
                    color: #7f8c8d;
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    white-space: nowrap;
                }

                .last-message i {
                    font-size: 1.2rem;
                    flex-shrink: 0;
                }

                .last-message.no-message {
                    color: #bdc3c7;
                    font-style: italic;
                }

                .conversation-arrow {
                    flex-shrink: 0;
                }

                .conversation-arrow i {
                    font-size: 2rem;
                    color: #9d9fa0ff;
                    transition: all 0.3s ease;
                }

                .conversation-card:hover .conversation-arrow i {
                    color: #B45309;
                    transform: translateX(5px);
                }

                .no-conversations {
                    background: white;
                    border-radius: 15px;
                    padding: 60px 40px;
                    text-align: center;
                    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
                }

                .no-conversations i {
                    font-size: 5rem;
                    color: #ecf0f1;
                    margin-bottom: 20px;
                }

                .no-conversations h3 {
                    font-size: 1.8rem;
                    color: #2c3e50;
                    margin: 0 0 15px 0;
                }

                .no-conversations p {
                    font-size: 1.1rem;
                    color: #7f8c8d;
                    margin: 0 0 10px 0;
                }

                .btn-primary {
                    display: inline-flex;
                    align-items: center;
                    gap: 10px;
                    background: linear-gradient(135deg, #92400E 0%, #B45309 100%);
                    color: white;
                    padding: 15px 30px;
                    border-radius: 25px;
                    text-decoration: none;
                    font-weight: 600;
                    font-size: 1.1rem;
                    margin-top: 20px;
                    transition: all 0.3s ease;
                }

                .btn-primary:hover {
                    transform: translateY(-3px);
                    box-shadow: 0 8px 20px #92410e8e;
                }

                .btn-primary i {
                    font-size: 1.3rem;
                }

                @media (max-width: 768px) {
                    .page-header h1 {
                        font-size: 2rem;
                    }
                    
                    .conversation-card {
                        padding: 20px;
                    }
                    
                    .conversation-icon {
                        width: 60px;
                        height: 60px;
                    }
                    
                    .conversation-icon i {
                        font-size: 2rem;
                    }
                    
                    .conversation-header {
                        flex-direction: column;
                        align-items: flex-start;
                        gap: 5px;
                    }
                }
                </style>
            </div>

        </div>
    </div>
</div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/conversations/index.blade.php ENDPATH**/ ?>