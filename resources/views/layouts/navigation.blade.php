<nav class="navbar">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item brand-text" href="../">Faktur</a>
            @if (Auth::user()->isAdmin())
            <div class="navbar-burger burger" data-target="navMenu">
                    <span><a class="navbar-item" href="/users">Utilisateurs</a></span>
                    <span><a class="navbar-item" href="/roles">Rôles</a></span>
                    <span><a class="navbar-item" href="/invoices">Factures</a></span>
            </div>
            @endif
        </div>
        @if (Auth::user()->isAdmin())
        <div id="navMenu" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="/users">Utilisateurs</a>
                <a class="navbar-item" href="/roles">Rôles</a>
                <a class="navbar-item" href="/invoices">Factures</a>
            </div>
        </div>
        @endif
    </div>
</nav>
