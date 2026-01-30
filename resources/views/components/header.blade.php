<div id="tete_navigation">
    <header class="tete">
        <div>
            <img src=" {{ asset('assets/img/logo.png') }} " alt="Logo du site" width="100px" height="50px">
        </div>
        
        <!-- Desktop Navigation -->
        <div class="desktop_menu">
            <nav>
                <ul class="navigation">
                    <div><li><a href="{{ url('/') }}" id="option_navigation">Accueil</a></li></div>
                    <div><li><a href="{{ url('/savoir') }}" id="option_navigation">Comment ça marche</a></li></div>
                    <div><li><a href="{{ url('/boutique') }}" id="option_navigation">Produits</a></li></div>
                </ul>
            </nav>
        </div>

        <!-- Desktop Auth Buttons -->
        <div class="desktop_menu">
            <nav class="navigation">
                @guest
                    <a href="{{ route('login') }}">
                        <button class="button_connection">Se connecter</button>
                    </a>
                @endguest

                @auth
                    @if(auth()->user()->role && auth()->user()->role->name === 'admin')
                        <a href="{{ route('dashbord.vendeur.information') }}" class="btn_rapide_change" id="option_navigation">Dashboard vendeur</a>
                    @else
                        <a href="{{ route('dashbord.client.information') }}" class="btn_rapide_change" id="option_navigation">Dashboard client</a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="button_connection">Se déconnecter</button>
                    </form>
                @endauth
            </nav>
        </div>

        <!-- Mobile Menu Toggle -->
        <div class="menu_toggle">
            <i class="fa-solid fa-bars" onclick="toggleMenu()"></i>
        </div>
    </header>
</div>

<!-- Mobile Menu Overlay -->
<div id="mobile_menu_overlay" class="mobile_menu_overlay">
    <div class="mobile_menu_header">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="80px">
        <i class="fa-solid fa-xmark close_menu_btn" onclick="toggleMenu()"></i>
    </div>
    <ul class="mobile_menu_links">
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li><a href="{{ url('/savoir') }}">Comment ça marche</a></li>
        <li><a href="{{ url('/boutique') }}">Produits</a></li>
        
        @guest
            <li><a href="{{ route('login') }}" class="mobile_btn_login">Se connecter</a></li>
        @endguest

        @auth
            @if(auth()->user()->role && auth()->user()->role->name === 'admin')
                <li><a href="{{ route('dashbord.vendeur.information') }}">Dashboard vendeur</a></li>
            @else
                <li><a href="{{ route('dashbord.client.information') }}">Dashboard client</a></li>
            @endif
            <li>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="mobile_btn_logout">Se déconnecter</button>
                </form>
            </li>
        @endauth
    </ul>
</div>

<script>
    function toggleMenu() {
        const overlay = document.getElementById('mobile_menu_overlay');
        overlay.classList.toggle('active');
        
        // Prevent body scrolling when menu is open
        if (overlay.classList.contains('active')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = 'auto';
        }
    }
</script>