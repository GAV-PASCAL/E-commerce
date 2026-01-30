<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/styles.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/chat.css')); ?>">
    
    <script src="https://kit.fontawesome.com/79705818be.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
    <!-- Livewire Styles -->
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    
    <!-- Vite -->

    <?php echo $__env->yieldContent('vite'); ?>
    
</head>
<body>

    <?php echo $__env->yieldContent('header'); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
    
    <!-- Livewire Scripts -->
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>


</body><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/layouts/app.blade.php ENDPATH**/ ?>