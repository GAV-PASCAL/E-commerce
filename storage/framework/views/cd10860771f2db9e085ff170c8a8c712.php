

<?php $__env->startSection('title', 'Messages Clients'); ?>

<?php $__env->startSection('header'); ?>

    <section class="title_dash">
        <div>
            <h1>DASHBOARD</h1>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div id="page_structure">
        <?php if (isset($component)) { $__componentOriginal7198df49fa33acdb115e04e2e99942a4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7198df49fa33acdb115e04e2e99942a4 = $attributes; } ?>
<?php $component = App\View\Components\Dashheader::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dashheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Dashheader::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7198df49fa33acdb115e04e2e99942a4)): ?>
<?php $attributes = $__attributesOriginal7198df49fa33acdb115e04e2e99942a4; ?>
<?php unset($__attributesOriginal7198df49fa33acdb115e04e2e99942a4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7198df49fa33acdb115e04e2e99942a4)): ?>
<?php $component = $__componentOriginal7198df49fa33acdb115e04e2e99942a4; ?>
<?php unset($__componentOriginal7198df49fa33acdb115e04e2e99942a4); ?>
<?php endif; ?>

        <div class="section_dash">

            <div class="vendor-messages-page">

                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('vendor-messages-manager');

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-94495926-0', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>

            <style>
            .vendor-messages-page {
                max-width: 1600px;
                margin: 0 auto;
                padding: 30px 20px;
                border: 2px solid #B45309;
                border-radius: 20px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                min-height: calc(100vh - 100px);
            }

            .page-header {
                text-align: center;
                margin-bottom: 20px;
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
                background: linear-gradient(135deg, #B45309 0%, #92400E 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .page-header p {
                font-size: 1.1rem;
                color: #898989b3;
                margin: 0;
            }

            .messages-layout {
                display: grid;
                grid-template-columns: 400px 1fr;
                gap: 20px;
                height: calc(100vh - 250px);
                min-height: 470px;
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
                color: #919799ff;
                margin-bottom: 20px;
            }

            .no-selection h3 {
                font-size: 1.4rem;
                color: #2c3e50;
                margin: 0 0 10px 0;
            }

            .no-selection p {
                font-size: 1.1rem;
                color: #7f8c8d;
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
                .page-header h1 {
                    font-size: 2rem;
                    flex-direction: column;
                    gap: 10px;
                }
                
                .vendor-messages-page {
                    padding: 20px 10px;
                }
            }
            </style>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/dashbord/vendeur/messages/index.blade.php ENDPATH**/ ?>