<?php $__env->startSection('content'); ?>
<div class="container">

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="register_div">

        <div class="section_formulaire_two" >
            <form id="connexion" method="POST" action="<?php echo e(route('login.post')); ?>">
                <?php echo csrf_field(); ?>
                <div>
                    <label for="email">Email</label><br>
                    <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" class="formulaire_input" required autofocus>
                </div>

                <div>
                    <label for="password">Mot de passe</label><br>
                    <div class="password-box">
                        <input id="password" type="password" name="password" class="formulaire_input" required>
                        <i class="fa-solid fa-eye toggle-password" onclick="togglePassword('password')"></i>
                    </div>
                </div>

                <script>
                    function togglePassword(inputId) {
                        const passwordInput = document.getElementById(inputId);
                        const icon = passwordInput.nextElementSibling;
                        
                        if (passwordInput.type === 'password') {
                            passwordInput.type = 'text';
                            icon.classList.remove('fa-eye');
                            icon.classList.add('fa-eye-slash');
                        } else {
                            passwordInput.type = 'password';
                            icon.classList.remove('fa-eye-slash');
                            icon.classList.add('fa-eye');
                        }
                    }
                </script>

                <div>
                    <label>
                        <input type="checkbox" name="remember"> Se souvenir de moi
                    </label>
                </div>

                <div>
                    <button type="submit" id="btn-formulaire">Se connecter</button>
                </div>

                <p>
                    Déjà un compte ? <a href="<?php echo e(route('register')); ?>" style="color: var(--primary-color); font-weight: 600;">S'inscrire</a>

                    <a href="<?php echo e(url('./')); ?>" style="color: var(--primary-color); font-weight: 600;">Retour à l'accueil</a>
                </p>
            </form>
        </div>


        <div class="section_formulaire_one">
            <div>
                <h1>Connexion sur Easyorder</h1>
            </div>
            <div>
                <img src="<?php echo e(asset('assets/img/logo_o.png')); ?>" alt="" width="250px" height="250px">
            </div>
            <div>
                <p>
                    Bienvenue sur notre plateforme de commande en ligne. <br>
                    Connectez-vous et profitez de nos nouvelles offres et produits. <br>
                    Commande plus rapidement et surement 
                </p>
            </div>
        </div>
        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/auth/login.blade.php ENDPATH**/ ?>