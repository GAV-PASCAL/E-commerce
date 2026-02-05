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

        <div class="section_formulaire_one">
            <div>
                <h1>Inscription sur Easyorder</h1>
            </div>
            <div>
                <img src="<?php echo e(asset('assets/img/logo_o.png')); ?>" alt="" width="250px" height="250px">
            </div>
            <div>
                <p>
                    Bienvenue sur notre plateforme de commande en ligne. <br>
                    Inscrivez-vous et profitez de nos offres et produits. <br>
                    Commande plus rapidement et surement 
                </p>
            </div>
        </div>

        <div class="section_formulaire_two">
            <form class="inscription" method="POST" action="<?php echo e(route('register.post')); ?>">
                <?php echo csrf_field(); ?>   
                <div class="information">
                    <div>
                        <label for="nom">Nom</label><br>
                        <input 
                            id="nom" 
                            type="text" 
                            name="nom" 
                            value="<?php echo e(old('nom')); ?>" 
                            class="formulaire_input" 
                            pattern="[a-zA-ZÀ-ÿ\s\-']+"
                            title="Le nom ne peut contenir que des lettres, espaces, tirets et apostrophes"
                            maxlength="255"
                            required>
                    </div>

                    <div>
                        <label for="prenom">Prénom</label><br>
                        <input 
                            id="prenom" 
                            type="text" 
                            name="prenom" 
                            value="<?php echo e(old('prenom')); ?>" 
                            class="formulaire_input" 
                            pattern="[a-zA-ZÀ-ÿ\s\-']+"
                            title="Le prénom ne peut contenir que des lettres, espaces, tirets et apostrophes"
                            maxlength="255"
                            required>
                    </div>
                </div>

                <div>
                    <label for="email">Email</label><br>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        value="<?php echo e(old('email')); ?>" 
                        class="formulaire_input" 
                        maxlength="255"
                        required>
                </div>

                <div>
                    <label for="password">Mot de passe</label><br>
                    <div class="password-box">
                        <input 
                            id="password" 
                            type="password" 
                            name="password" 
                            class="formulaire_input" 
                            minlength="8"
                            pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}"
                            title="Le mot de passe doit contenir au moins 8 caractères, une minuscule, une majuscule et un chiffre"
                            required>
                        <i class="fa-solid fa-eye toggle-password" onclick="togglePassword('password')"></i>
                    </div>
                    <small style="color: #424242ff; font-size: 0.6em;">
                        Minimum 8 caractères, (1 minuscule, 1 majuscule et 1 chiffre)
                    </small>
                </div>

                <div>
                    <label for="password_confirmation">Confirmer le mot de passe</label><br>
                    <div class="password-box">
                        <input 
                            id="password_confirmation" 
                            type="password" 
                            name="password_confirmation" 
                            class="formulaire_input" 
                            minlength="8"
                            required>
                        <i class="fa-solid fa-eye toggle-password" onclick="togglePassword('password_confirmation')"></i>
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

                <div style="margin: 2px 0; display: flex; align-items: flex-start; gap: 5px;">
                    <input 
                        type="checkbox" 
                        name="politique_confidentialite" 
                        id="politique_confidentialite" 
                        required 
                        style="margin-top: 5px; cursor: pointer;">
                    <label for="politique_confidentialite" style="font-size: 0.9rem; color: #4b5563; cursor: pointer;">
                        J'ai lu et j'accepte la <a href="<?php echo e(route('politique.confidentialite')); ?>" target="_blank" style="color: var(--primary-color); font-weight: 600;">politique de confidentialité</a> d'EasyOrder.
                    </label>
                </div>

                <div>
                    <button type="submit" id="btn-formulaire">S'inscrire</button>
                </div>

                <p>
                    Déjà un compte ? <a href="<?php echo e(route('login')); ?>" style="color: var(--primary-color); font-weight: 600;">Se connecter</a>

                    <a href="<?php echo e(url('./')); ?>" style="color: var(--primary-color); font-weight: 600;">Retour à l'accueil</a>
                </p>
                
            </form>
        </div>

        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/auth/register.blade.php ENDPATH**/ ?>