    <div class="av">
        <div>
            <div class="av_guide">
                <h2>Prêt à découvert nos excellents produits?</h2>

                <p>
                    Décovrez des milliers de produits et clients qui font confiance à EasyOrder pour leurs transactions commerciales internationales
                </p>
            </div>
             
            <div>
                <button class="button_connection" onClick="window.location.href = '/boutique'" >Explorer les produits</button>
            </div>
        </div>

        <div>
            <img src="https://i.pinimg.com/736x/5f/be/9e/5fbe9eab02aeb84178124457d287ff63.jpg" alt="" class="av_img">
        </div>
    </div>

    <div class="footer">
        <div class="footer_logo">
            <div>
                <img src=" <?php echo e(asset('assets/img/logo.png')); ?> " alt="" width="120px" height="75px">

                <p>La plateforme de commerce en ligne qui connecte les clients aux produits à bas prix.</p>
            </div>
                <!-- lien resaux sociaux -->
            <div>

            </div>
        </div>

        <div class="footer_lien">
            <h4>Liens Rapide</h4>
            <a href=" <?php echo e(url('/')); ?> " id="a">Accueil</a>
            <a href=" <?php echo e(url('/savoir')); ?> " id="a">Comment ça marche</a>
            <a href=" <?php echo e(url('/boutique')); ?> " id="a">Produits</a>
            <a href=" <?php echo e(url('/conversations')); ?> " id="a">Message</a>
            <a href=" <?php echo e(url('/favoris')); ?> " id="a">Favoris</a>
        </div>

        <div class="footer_lien">
            <h4>Condiction</h4>
            <a href=" <?php echo e(url('/aide')); ?> " id="a">Centre d'aide</a>
            <a href=" <?php echo e(url('/condiction')); ?> " id="a">Condiction d'usage</a>
            <a href=" <?php echo e(url('/confidentialite')); ?> " id="a">Politique de confidentialité</a>
            <a href=" <?php echo e(url('/contact')); ?> " id="a">Nous Contacter</a>
            <a href=" <?php echo e(url('/faq')); ?> " id="a">FAQ</a>
        </div>

        <div class="footer_lien">
            <h4>Newsletters</h4>
            <p>Restez informer de nos dernières produits, offres et promotions</p>

            <div>
                <form action="" class="letters">
                    <input type="email" placeholder="Votre email" class="letters_mail">
                    <input type="submit" value="S'abonner" class="button_connection">
                </form>
            </div>
        </div>
    </div><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/components/footer.blade.php ENDPATH**/ ?>