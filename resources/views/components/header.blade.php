<div id="tete_navigation">
    <header class="tete">
        <div class="logo_container">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="100px">
            </a>
        </div>
        
        <!-- Desktop Navigation -->
        <div class="desktop_menu">
            <nav>
                <ul class="navigation">
                    <li><a href="{{ url('/') }}" id="option_navigation" class="{{ Request::is('/') ? 'active' : '' }}">Accueil</a></li>
                    <li><a href="{{ url('/savoir') }}" id="option_navigation" class="{{ Request::is('savoir') ? 'active' : '' }}">Comment ça marche</a></li>
                    <li><a href="{{ url('/produits') }}" id="option_navigation" class="{{ Request::is('produits') ? 'active' : '' }}">Produits</a></li>
                </ul>
            </nav>
        </div>

        <!-- Desktop Auth Buttons -->
        <div class="desktop_menu">
            <div class="auth_buttons">
                @guest
                    <a href="{{ route('login') }}">
                        <button class="button_connection">Se connecter</button>
                    </a>
                @endguest

                @auth
                    @if(auth()->user()->role && auth()->user()->role->name === 'admin')
                        <a href="{{ route('dashbord.vendeur.information') }}" class="dash_link">Dashboard vendeur</a>
                    @else
                        <a href="{{ route('dashbord.client.information') }}" class="dash_link">Dashboard client</a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="button_connection" >Déconnexion</button>
                    </form>
                @endauth
            </div>
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
        <li><a href="{{ url('/produits') }}">Produits</a></li>
        
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
                        <button type="submit" class="dash_logout_btn">Se déconnecter</button>
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