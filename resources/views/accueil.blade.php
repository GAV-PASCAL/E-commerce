@extends('layouts.app')

@section('title')
    Accueil Easyorder
@endsection

@section('content')

    <section id="accueil">

        <x-header />

        <div class="bienvenue"> 
            <div>
                <div class="accroche">
                    <h1>
                        Votre plateforme de vente en ligne mondiale
                    </h1>

                    <p>
                        Commandez connectez les grossistes et les clients 
                        du monde entier sur une plateforme sécurisée. 
                        Commandez vos produits en toute tranquillité 
                        et développez votre activité à l'échelle internationale.
                    </p>
                </div>
            </div>

            <div class="info_accueil">
                <div class="accueil_rapide">
                    <button class="btn_rapide">Découvrez les produits</button>
                    <button class="btn_rapide_change">Comment ça marche</button>
                </div>

                <div class="info">
                    <div id="info_navigation">
                        <div class="btn_details_plus">
                            <nav class="btn_details">
                                <ul class="info_details">
                                    <li id="info_details_section">Produits</li>
                                    <li id="info_details_section">Clients</li>
                                </ul>
                                
                            </nav>
                        </div>

                        <div>
                            <p id="info_message">Plus de 5OO produits publiés</p>
                        </div>
                    </div>  
                </div>
            </div>
        </div>                                                                      
    </section>

    <section>
        <div class="fonction">
            <h1>Pourquoi Nous ?</h1>
            <p>
                Une plateforme complète qui réunit
                tous les acteurs du commerce en ligne pour 
                des transactions sécurisées et efficaces
            </p>
        </div>

        <div class="fonction_grid_globale">
            <div id="fonction_grid">
                <div class="section_fonction">
                    <div class="fonction_details">
                        <i class="fa-solid fa-earth-africa"></i>

                        <h3>Boutique mondiale</h3>
                    </div>

                    <p class="fonction_description">
                        Accédez à des produits du monde entier et
                        vendez à une clientèle internationale sans 
                        frontières.
                    </p>
                </div>
                <div class="section_fonction">
                    <div class="fonction_details">
                        <i class="fa-solid fa-earth-africa"></i>

                        <h3>Boutique Abordable</h3>
                    </div>

                    <p class="fonction_description">
                        Tous nos grossistes sont vérifiés pour garantir la qualité et la fiabilité de vos achats.
                    </p>
                </div>
                <div class="section_fonction">
                    <div class="fonction_details">
                        <i class="fa-solid fa-earth-africa"></i>

                        <h3>Transactions sécurisée</h3>
                    </div>

                    <p class="fonction_description">
                        Système de paiement sécurisé et suivi complet de vos commandes pour une tranquillité totale.
                    </p>
                </div>
                <div class="section_fonction">
                    <div class="fonction_details">
                        <i class="fa-solid fa-earth-africa"></i>

                        <h3>Chat intégrer</h3>
                    </div>

                    <p class="fonction_description">
                        Discutez directement avec les vendeurs pour finaliser vos commandes et négocier les détails.
                    </p>
                </div>
                <div class="section_fonction">
                    <div class="fonction_details">
                        <i class="fa-solid fa-earth-africa"></i>

                        <h3>Prix compétitifs</h3>
                    </div>

                    <p class="fonction_description">
                        Bénéficiez de tarifs grossistes avantageux et de promotions exclusives régulières.
                    </p>
                </div>
                <div class="section_fonction">
                    <div class="fonction_details">
                        <i class="fa-solid fa-earth-africa"></i>

                        <h3>Livraison Rapide</h3>
                    </div>

                    <p class="fonction_description">
                        Suivi en temps réel de vos commandes avec des options de livraison flexibles et rapides.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="process_section">
        <div class="fonction">
            <h1>Comment ça marche</h1>

            <P>Un processus simple et efficace pour commander vos produits en toute tranquilité</P>
        </div>
        <div class="process">
            <div class="process_details">
                <i class="fa-solid fa-circle-user"></i>
                <h6 class="numb">01</h6>
                <h3>Créer votre compte</h3>
                <br>
                <p>Inscrivez-vous gratuitement en quelques 
                    minutes et accédez à notre catalogue de produits 
                    mondiaux.
                </p>
            </div>
            <div class="process_details">
                <i class="fa-solid fa-circle-user"></i>
                <h6 class="numb">02</h6>
                <h3>Explorez les produits</h3>
                <br>
                <p>
                    Parcourez notre large sélection de produits par catégorie, prix ou boutique selon vos besoins.
                </p>
            </div>
            <div class="process_details">
                <i class="fa-solid fa-circle-user"></i>
                <h6 class="numb">03</h6>
                <h3>Discutez avec les vendeurs</h3>
                <br>
                <p>
                    Communiquez directement avec les grossistes pour négocier les détails de votre commande.
                </p>
            </div>
            <div class="process_details">
                <i class="fa-solid fa-circle-user"></i>
                <h6 class="numb">04</h6>
                <h3>Passez commande</h3>
                <br>
                <p>
                    Finalisez votre achat en toute sécurité avec notre système de paiement protégé et suivez votre livraison.
                </p>
            </div>
        </div>

        <button class="btn_process">
            En Savoir Plus
        </button>
    </section>

    <section class="categorie_section">
        <div>
            <h2 class="voir">
                Les Différentes catégories
            </h2>
        </div><br><br>
        <div class="your-class">
            <div >
                <a href="" class="categorie">
                    <img src="https://i.pinimg.com/1200x/86/43/82/86438241819b19833e296654dc07c17d.jpg" alt="" class="dim_image" > <br>
                    <h4 class="voir">Electronique</h4>
                </a>
            </div>
            <div >
                <a href="" class="categorie">
                    <img src="https://i.pinimg.com/1200x/86/43/82/86438241819b19833e296654dc07c17d.jpg" alt="" class="dim_image" > <br>
                    <h4 class="voir">Electronique</h4>
                </a>
            </div>
            <div >
                <a href="" class="categorie">
                    <img src="https://i.pinimg.com/1200x/86/43/82/86438241819b19833e296654dc07c17d.jpg" alt="" class="dim_image" > <br>
                    <h4 class="voir">Electronique</h4>
                </a >
            </div>
            <div >
                <a href="" class="categorie">
                    <img src="https://i.pinimg.com/1200x/86/43/82/86438241819b19833e296654dc07c17d.jpg" alt="" class="dim_image" > <br>
                    <h4 class="voir">Electronique</h4>
                </a>
            </div>
            <div >
                <a href="" class="categorie">
                    <img src="https://i.pinimg.com/1200x/86/43/82/86438241819b19833e296654dc07c17d.jpg" alt="" class="dim_image" > <br>
                    <h4 class="voir">Electronique</h4>
                </a>
            </div>
        </div>
    </section>

    <x-footer/>

@endsection
