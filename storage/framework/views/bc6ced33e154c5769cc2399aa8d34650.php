<div class="client_sidebar_container">
    <div class="profile_section">
        <div class="profile_avatar">
            <h2 class="profile_initials">
                <?php echo e(strtoupper(mb_substr(Auth::user()->nom, 0, 1))); ?><?php echo e(strtoupper(mb_substr(Auth::user()->prenom, 0, 1))); ?>

            </h2>
        </div>
        <p class="profile_name"><?php echo e(Auth::user()->prenom); ?> <?php echo e(Auth::user()->nom); ?></p>
    </div>

    <div class="client_nav_wrapper">
        <div class="client_navigation" id="clientNavigation">
            <a href="<?php echo e(route('dashbord.client.information')); ?>" class="dash_nav_btn <?php echo e(request()->routeIs('dashbord.client.information') ? 'active' : ''); ?>">
                <i class="fa-solid fa-user"></i> Informations Personnelles
            </a>

            <a href="<?php echo e(route('favoris.index')); ?>" class="dash_nav_btn <?php echo e(request()->routeIs('favoris.index') ? 'active' : ''); ?>">
                <i class="fa-solid fa-heart"></i> Favoris
            </a>

            <a href="<?php echo e(route('client.commandes')); ?>" class="dash_nav_btn <?php echo e(request()->routeIs('client.commandes') ? 'active' : ''); ?>">
                <i class="fa-solid fa-box"></i> Commandes
            </a> 

            <a href="<?php echo e(route('conversations.index')); ?>" class="dash_nav_btn <?php echo e(request()->routeIs('conversations.index') ? 'active' : ''); ?>" style="position: relative;">
                <i class="fa-solid fa-envelope"></i> Messagerie
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('message-notification-indicator');

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1050288742-0', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </a>
        </div>
        <div class="scroll_indicator" onclick="scrollNavigation()">
            <i class="fa-solid fa-chevron-right"></i>
        </div>
    </div>

    <div class="client_logout">
        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit" class="dash_logout_btn">
                <i class="fa-solid fa-arrow-right-from-bracket"></i> Se déconnecter
            </button>
        </form>
    </div>
</div>

<script>
function scrollNavigation() {
    const nav = document.getElementById('clientNavigation');
    if (nav) {
        // Scroll by 200px to the right
        nav.scrollBy({
            left: 200,
            behavior: 'smooth'
        });
    }
}
</script><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/components/client.blade.php ENDPATH**/ ?>