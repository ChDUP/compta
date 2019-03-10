<div class="column is-3 ">
    <aside class="menu is-hidden-mobile">
        <p class="menu-label">
            <a href="/home">Tableau de bord</a>
        </p>
        <p class="menu-label">
            Mon compte
        </p>
        <ul class="menu-list">
            <li>
               <a href="/users/modify/{{ Auth::user()->id }}">Voir mon compte</a>
               <a href="/logout">Me déconnecter</a>
            </li>
        </ul>
        <p class="menu-label">
            Mes factures
        </p>
        <ul class="menu-list">
            <li>
                <a href="/invoices">Toutes les factures</a>
                <ul>
                    <li><a href="/invoices#invoices-2019">2019</a></li>
                    <li><a href="/invoices#invoices-2018">2018</a></li>
                </ul>
            </li>
            <li>
                <a href="/invoices/create">Ajouter une facture</a>
        </ul>
        @if (Auth::user()->isAdmin())
        <p class="menu-label">
                Utilisateurs
            </p>
            <ul class="menu-list">
                <li><a class="is-active" href="/users">Utilisateurs</a></li>
                <li><a href="/roles">Rôles</a></li>
                <li><a href="/invoices">Factures</a></li>
            </ul>
        <p class="menu-label">
                Rôles
            </p>
            <ul class="menu-list">
                <li>
                    <a href="/roles">Tous les roles</a>
                    <ul>
                        <li><a href="/roles/1">Administrateur</a></li>
                        <li><a href="/roles/2">Comptable</a></li>
                        <li><a href="/roles/3">Utilisateur</a></li>
                    </ul>
                </li>
            </ul>
        <p class="menu-label">
            Exemples
        </p>
        <ul class="menu-list">
            <li>
                <a href="/models">Voir les exemples</a>
            </li>
        </ul>
        @endif
    </aside>
</div>
