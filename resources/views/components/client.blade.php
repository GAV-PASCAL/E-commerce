<div class="client_sidebar_container">
    <div class="profile_section">
        <div class="profile_avatar">
            <h2 class="profile_initials">
                {{ strtoupper(mb_substr(Auth::user()->nom, 0, 1)) }}{{ strtoupper(mb_substr(Auth::user()->prenom, 0, 1)) }}
            </h2>
        </div>
        <p class="profile_name">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</p>
    </div>

    <div class="client_nav_wrapper">
        <div class="client_navigation" id="clientNavigation">
            <a href="{{ route('dashbord.client.information') }}" class="dash_nav_btn {{ request()->routeIs('dashbord.client.information') ? 'active' : '' }}">
                <i class="fa-solid fa-user"></i> Informations Personnelles
            </a>

            <a href="{{ route('favoris.index') }}" class="dash_nav_btn {{ request()->routeIs('favoris.index') ? 'active' : '' }}">
                <i class="fa-solid fa-heart"></i> Favoris
            </a>

            <a href="{{ route('client.commandes') }}" class="dash_nav_btn {{ request()->routeIs('client.commandes') ? 'active' : '' }}">
                <i class="fa-solid fa-box"></i> Commandes
            </a> 

            <a href="{{ route('conversations.index') }}" class="dash_nav_btn {{ request()->routeIs('conversations.index') ? 'active' : '' }}" style="position: relative;">
                <i class="fa-solid fa-envelope"></i> Messagerie
                @livewire('message-notification-indicator')
            </a>
        </div>
        <div class="scroll_indicator" onclick="scrollNavigation()">
            <i class="fa-solid fa-chevron-right"></i>
        </div>
    </div>

    <div class="client_logout">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
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
</script>