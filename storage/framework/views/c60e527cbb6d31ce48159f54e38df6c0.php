

<?php $__env->startSection('title', 'Politique de Confidentialité Complète - EasyOrder'); ?>

<?php $__env->startSection('header'); ?>
    <section>
        <div class="accueil_info" style="background-color: #fff; border-bottom: 2px solid #000;">
            <?php if (isset($component)) { $__componentOriginal2a2e454b2e62574a80c8110e5f128b60 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2a2e454b2e62574a80c8110e5f128b60 = $attributes; } ?>
<?php $component = App\View\Components\Header::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Header::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2a2e454b2e62574a80c8110e5f128b60)): ?>
<?php $attributes = $__attributesOriginal2a2e454b2e62574a80c8110e5f128b60; ?>
<?php unset($__attributesOriginal2a2e454b2e62574a80c8110e5f128b60); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2a2e454b2e62574a80c8110e5f128b60)): ?>
<?php $component = $__componentOriginal2a2e454b2e62574a80c8110e5f128b60; ?>
<?php unset($__componentOriginal2a2e454b2e62574a80c8110e5f128b60); ?>
<?php endif; ?>

            <div class="exp_dim" id="info">
                <h3 class="titre_page">Politique de Confidentialité & Conditions Générales de Données</h3>
                <div class="breadcrumb">
                    <a href="<?php echo e(url('/')); ?>">Accueil</a> 
                    <i class="fa-solid fa-chevron-right"></i> 
                    <span> CHARTE DE PROTECTION DES DONNÉES (20 ARTICLES) </span>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="privacy-policy-view" style="padding: 100px 0; background-color: #fff; color: #000; font-family: 'Inter', system-ui, -apple-system, sans-serif;">
    <div class="container" style="max-width: 1000px; margin: 0 auto; padding: 0 30px;">
        
        <div class="intro-section" style="margin-bottom: 80px; border-left: 10px solid #000; padding: 20px 40px; background: #f9f9f9;">
            <p style="font-size: 1.3rem; font-weight: 600; text-align: justify; line-height: 1.8; margin: 0;">
                EasyOrder s'engage à protéger la vie privée de ses utilisateurs au Togo et à l'international. Cette charte de 20 articles détaille nos engagements absolus en matière de transparence, de sécurité et de respect de vos droits fondamentaux.
            </p>
        </div>

        <div class="table-of-contents" style="margin-bottom: 100px; padding: 50px; border: 3px solid #000; background: #fff; position: relative;">
            <h2 style="font-size: 2rem; text-transform: uppercase; margin-bottom: 40px; font-weight: 900; border-bottom: 5px solid #000; display: inline-block;">Sommaire des 20 Articles</h2>
            <nav>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <ul style="list-style: none; padding: 0; font-weight: 700; line-height: 2;">
                        <li><a href="#art1" style="color: #000; text-decoration: none;">01. Définitions & Champ</a></li>
                        <li><a href="#art2" style="color: #000; text-decoration: none;">02. Responsable du Traitement</a></li>
                        <li><a href="#art3" style="color: #000; text-decoration: none;">03. Nature des Données</a></li>
                        <li><a href="#art4" style="color: #000; text-decoration: none;">04. Finalités du Traitement</a></li>
                        <li><a href="#art5" style="color: #000; text-decoration: none;">05. Base Légale (Loi Togo)</a></li>
                        <li><a href="#art6" style="color: #000; text-decoration: none;">06. Durée de Conservation</a></li>
                        <li><a href="#art7" style="color: #000; text-decoration: none;">07. Destinataires des Données</a></li>
                        <li><a href="#art8" style="color: #000; text-decoration: none;">08. Transferts Internationaux</a></li>
                        <li><a href="#art9" style="color: #000; text-decoration: none;">09. Sécurité & Intégrité</a></li>
                        <li><a href="#art10" style="color: #000; text-decoration: none;">10. Gestion des Cookies</a></li>
                    </ul>
                    <ul style="list-style: none; padding: 0; font-weight: 700; line-height: 2;">
                        <li><a href="#art11" style="color: #000; text-decoration: none;">11. Droits de l'Utilisateur</a></li>
                        <li><a href="#art12" style="color: #000; text-decoration: none;">12. Modifications de la Charte</a></li>
                        <li><a href="#art13" style="color: #000; text-decoration: none;">13. Propriété Intellectuelle</a></li>
                        <li><a href="#art14" style="color: #000; text-decoration: none;">14. Résiliation du Compte</a></li>
                        <li><a href="#art15" style="color: #000; text-decoration: none;">15. Litiges & Médiation</a></li>
                        <li><a href="#art16" style="color: #000; text-decoration: none;">16. Publicité & Partenariats</a></li>
                        <li><a href="#art17" style="color: #000; text-decoration: none;">17. Données des Mineurs</a></li>
                        <li><a href="#art18" style="color: #000; text-decoration: none;">18. Violations de Données</a></li>
                        <li><a href="#art19" style="color: #000; text-decoration: none;">19. Garantie de Service</a></li>
                        <li><a href="#art20" style="color: #000; text-decoration: none;">20. Droit & Juridiction</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="policy-body" style="font-size: 1.1rem; line-height: 1.8;">
            
            <section id="art1" style="margin-bottom: 80px;">
                <h2 style="font-size: 2rem; font-weight: 900; border-bottom: 4px solid #000; padding-bottom: 10px; margin-bottom: 30px; text-transform: uppercase;">Article 1 : Définitions & Champ</h2>
                <p><strong>Données Personnelles :</strong> Toute information identifiant directement ou indirectement une personne physique. <strong>Utilisateur :</strong> Toute personne accédant à EasyOrder. <strong>Traitement :</strong> Toute opération appliquée aux données (collecte, stockage, etc.).</p>
            </section>

            <section id="art2" style="margin-bottom: 80px;">
                <h2 style="font-size: 2rem; font-weight: 900; border-bottom: 4px solid #000; padding-bottom: 10px; margin-bottom: 30px; text-transform: uppercase;">Article 2 : Responsable du Traitement</h2>
                <p>Le responsable est <strong>EasyOrder SARL-U</strong>, immatriculée au RCCM du Togo. Nous garantissons que chaque octet de donnée est traité avec la plus grande rigueur éthique et légale.</p>
            </section>

            <section id="art3" style="margin-bottom: 80px;">
                <h2 style="font-size: 2rem; font-weight: 900; border-bottom: 4px solid #000; padding-bottom: 10px; margin-bottom: 30px; text-transform: uppercase;">Article 3 : Nature des Données</h2>
                <p>Nous collectons : Identité (Nom, Email, Tel), Données techniques (IP, Cookies), Données de transaction (Achats, Négociations) et Profil Vendeur (Boutique, Localisation).</p>
            </section>

            <section id="art4" style="margin-bottom: 80px;">
                <h2 style="font-size: 2rem; font-weight: 900; border-bottom: 4px solid #000; padding-bottom: 10px; margin-bottom: 30px; text-transform: uppercase;">Article 4 : Finalités du Traitement</h2>
                <p>Les données servent à : Exécuter vos commandes, sécuriser les paiements, permettre la messagerie entre acheteurs/vendeurs, et améliorer l'expérience utilisateur globale.</p>
            </section>

            <section id="art5" style="margin-bottom: 80px;">
                <h2 style="font-size: 2rem; font-weight: 900; border-bottom: 4px solid #000; padding-bottom: 10px; margin-bottom: 30px; text-transform: uppercase;">Article 5 : Base Légale (Loi Togo)</h2>
                <p>Le traitement repose sur la <strong>Loi n° 2019-014 du Togo</strong>. En utilisant EasyOrder, vous consentez explicitement au traitement de vos données pour les finalités décrites ci-dessus.</p>
            </section>

            <section id="art6" style="margin-bottom: 80px;">
                <h2 style="font-size: 2rem; font-weight: 900; border-bottom: 4px solid #000; padding-bottom: 10px; margin-bottom: 30px; text-transform: uppercase;">Article 6 : Durée de Conservation</h2>
                <p>Données de compte : Durée de vie du compte + 3 ans. Données fiscales : 10 ans (obligation légale). Logs techniques : 13 mois.</p>
            </section>

            <section id="art7" style="margin-bottom: 80px;">
                <h2 style="font-size: 2rem; font-weight: 900; border-bottom: 4px solid #000; padding-bottom: 10px; margin-bottom: 30px; text-transform: uppercase;">Article 7 : Destinataires des Données</h2>
                <p>Vos données ne sont jamais vendues. Elles sont partagées uniquement avec : Les vendeurs (pour livraison), les prestataires de paiement, et les autorités judiciaires si requis.</p>
            </section>

            <section id="art8" style="margin-bottom: 80px;">
                <h2 style="font-size: 2rem; font-weight: 900; border-bottom: 4px solid #000; padding-bottom: 10px; margin-bottom: 30px; text-transform: uppercase;">Article 8 : Transferts Internationaux</h2>
                <p>Pour le cloud, vos données peuvent passer par des serveurs sécurisés hors Togo (AWS/Google Cloud) garantissant un niveau de protection équivalent au RGPD.</p>
            </section>

            <section id="art9" style="margin-bottom: 80px;">
                <h2 style="font-size: 2rem; font-weight: 900; border-bottom: 4px solid #000; padding-bottom: 10px; margin-bottom: 30px; text-transform: uppercase;">Article 9 : Sécurité & Intégrité</h2>
                <p>Cryptage SSL/TLS, isolation des serveurs, et hachage Bcrypt. Nous appliquons les standards de cybersécurité les plus récents pour prévenir toute intrusion.</p>
            </section>

            <section id="art10" style="margin-bottom: 80px;">
                <h2 style="font-size: 2rem; font-weight: 900; border-bottom: 4px solid #000; padding-bottom: 10px; margin-bottom: 30px; text-transform: uppercase;">Article 10 : Gestion des Cookies</h2>
                <p>Nous utilisons des cookies essentiels (séance) et analytiques. Vous pouvez les gérer depuis les réglages de votre navigateur sans restreindre l'accès de base.</p>
            </section>

            <section id="art11" style="margin-bottom: 80px;">
                <h2 style="font-size: 2rem; font-weight: 900; border-bottom: 4px solid #000; padding-bottom: 10px; margin-bottom: 30px; text-transform: uppercase;">Article 11 : Droits de l'Utilisateur</h2>
                <p>Droit d'accès, de rectification, d'effacement, d'opposition et de portabilité. Contactez <strong>privacy@easyorder.com</strong> pour toute demande.</p>
            </section>

            <section id="art12" style="margin-bottom: 80px;">
                <h2 style="font-size: 2rem; font-weight: 900; border-bottom: 4px solid #000; padding-bottom: 10px; margin-bottom: 30px; text-transform: uppercase;">Article 12 : Modifications de la Charte</h2>
                <p>EasyOrder se réserve le droit de modifier cette charte. Toute mise à jour majeure vous sera notifiée via messagerie interne ou email.</p>
            </section>

            <section id="art13" style="margin-bottom: 80px;">
                <h2 style="font-size: 2rem; font-weight: 900; border-bottom: 4px solid #000; padding-bottom: 10px; margin-bottom: 30px; text-transform: uppercase;">Article 13 : Propriété Intellectuelle</h2>
                <p>Tout contenu (textes, logos, base de données) est la propriété exclusive d'EasyOrder. Toute reproduction sans accord écrit est strictement interdite.</p>
            </section>

            <section id="art14" style="margin-bottom: 80px;">
                <h2 style="font-size: 2rem; font-weight: 900; border-bottom: 4px solid #000; padding-bottom: 10px; margin-bottom: 30px; text-transform: uppercase;">Article 14 : Résiliation du Compte</h2>
                <p>Vous pouvez demander la suppression de votre compte à tout moment. EasyOrder anonymisera vos données personnelles dans un délai de 30 jours.</p>
            </section>

            <section id="art15" style="margin-bottom: 80px;">
                <h2 style="font-size: 2rem; font-weight: 900; border-bottom: 4px solid #000; padding-bottom: 10px; margin-bottom: 30px; text-transform: uppercase;">Article 15 : Litiges & Médiation</h2>
                <p>En cas de conflit, une phase de médiation à l'amiable est obligatoire avant toute action judiciaire. EasyOrder s'engage à répondre sous 15 jours.</p>
            </section>

            <section id="art16" style="margin-bottom: 80px;">
                <h2 style="font-size: 2rem; font-weight: 900; border-bottom: 4px solid #000; padding-bottom: 10px; margin-bottom: 30px; text-transform: uppercase;">Article 16 : Publicité & Partenariats</h2>
                <p>Nous pouvons afficher des publicités ciblées basées sur vos intérêts. Vous pouvez vous désinscrire de ces ciblage à tout moment dans votre profil.</p>
            </section>

            <section id="art17" style="margin-bottom: 80px;">
                <h2 style="font-size: 2rem; font-weight: 900; border-bottom: 4px solid #000; padding-bottom: 10px; margin-bottom: 30px; text-transform: uppercase;">Article 17 : Données des Mineurs</h2>
                <p>EasyOrder n'est pas destiné aux moins de 18 ans. Toute donnée de mineur collectée par erreur sera immédiatement supprimée dès signalement.</p>
            </section>

            <section id="art18" style="margin-bottom: 80px;">
                <h2 style="font-size: 2rem; font-weight: 900; border-bottom: 4px solid #000; padding-bottom: 10px; margin-bottom: 30px; text-transform: uppercase;">Article 18 : Violations de Données</h2>
                <p>En cas de faille de sécurité majeure, EasyOrder s'engage à informer l'Agence de Protection des Données et les utilisateurs concernés sous 72 heures.</p>
            </section>

            <section id="art19" style="margin-bottom: 80px;">
                <h2 style="font-size: 2rem; font-weight: 900; border-bottom: 4px solid #000; padding-bottom: 10px; margin-bottom: 30px; text-transform: uppercase;">Article 19 : Garantie de Service</h2>
                <p>EasyOrder met tout en œuvre pour assurer une disponibilité de 99.9%. Cependant, nous ne sommes pas responsables des pertes de données dues à votre connexion.</p>
            </section>

            <section id="art20" style="margin-bottom: 80px;">
                <h2 style="font-size: 2rem; font-weight: 900; border-bottom: 4px solid #000; padding-bottom: 10px; margin-bottom: 30px; text-transform: uppercase;">Article 20 : Droit & Juridiction</h2>
                <p>Cette charte est régie par le droit togolais. Tout litige persistant sera porté devant le tribunal de commerce de <strong>Lomé, Togo</strong>.</p>
            </section>

            <div class="footer-note" style="margin-top: 100px; padding: 60px; border: 10px solid #000; text-align: center; background: #fff;">
                <p style="font-weight: 900; font-size: 1.8rem; text-transform: uppercase; margin-bottom: 10px;">CHARTE DE CONFORMITÉ ABSOLUE</p>
                <p style="font-weight: 600;">EasyOrder SARL-U - Version Togo 2.0</p>
                <p style="margin-top: 20px; opacity: 0.7;">Dernière édition : <?php echo e(date('d/m/Y')); ?></p>
                <div style="margin-top: 50px;">
                    <a href="<?php echo e(route('register')); ?>" style="display: inline-block; padding: 25px 50px; background: #000; color: #fff; text-decoration: none; font-weight: 900; border: 2px solid #000; font-size: 1.2rem; transition: 0.3s; letter-spacing: 2px;">J'ACCEPTE LES 20 ARTICLES - RETOUR</a>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    html {
        scroll-behavior: smooth;
    }
    body {
        margin: 0;
        padding: 0;
        background-color: #fff;
    }
    .table-of-contents a:hover {
        text-decoration: underline;
    }
    .policy-body strong {
        text-decoration: underline;
    }
    /* Mobile optimization */
    @media (max-width: 768px) {
        .titre_page {
            font-size: 1.8rem !important;
        }
        .table-of-contents {
            padding: 20px !important;
        }
        .table-of-contents div {
            grid-template-columns: 1fr !important;
        }
        h2 {
            font-size: 1.5rem !important;
        }
        .intro-section {
            padding: 15px !important;
            border-left: 5px solid #000 !important;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/politique-confidentialite.blade.php ENDPATH**/ ?>