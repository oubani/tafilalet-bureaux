<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Tafilalet Bureaux</h3>
            <p> <a href="/"> <div class="fa fa-arrow-circle-left"></div> retour à l'accueil </a> </p>
        </div>

        <ul class="list-unstyled components">
            <li class="{{ 'admin'==request()->path() ? 'active' : '' }}" >
                <a href="/admin">Dashboard</a>
            </li>
            <li class="{{ 'admins'==request()->path() || 'clients'==request()->path() ? 'active' : '' }}" >
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Utilisateurs</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li class="{{ 'admins'==request()->path() ? 'active' : '' }}" >
                        <a href="admins">Admins</a>
                    </li>
                    <li class="{{ 'clients'==request()->path() ? 'active' : '' }}" >
                        <a href="clients">Clients</a>
                    </li>
                </ul>
            </li>
            <li class="{{ 'slide'==request()->path() ? 'active' : '' }}">
                <a href="/slide">Slides</a>
            </li>
            <li class="{{ 'category'==request()->path() ? 'active' : '' }}">
                <a href="/category">Categories</a>
            </li>
            <li class="{{ 'ProductsGenerate'==request()->path() ? 'active' : '' }}">
                <a href="/ProductsGenerate">Produits</a>    
            </li>
            <li class="{{ 'materialInformatiqueGenerate'==request()->path() ? 'active' : '' }}">
                <a href="/materialInformatiqueGenerate">Matériels Informatique</a>    
            </li>
            <li class="{{ 'catalogue'==request()->path() ? 'active' : '' }}">
                <a href="/catalogue">Catalogue</a>    
            </li>
            <li class="{{ 'partenaire'==request()->path() ? 'active' : '' }}">
                <a href="/partenaire">Partenaires</a>    
            </li>
            <li class="{{ 'services'==request()->path() ? 'active' : '' }}">
                <a href="/services">Notre Services</a>    
            </li>
            {{-- <li class="{{ 'produits'==request()->path() ? 'active' : '' }}">
                <a href="/produits">Produits</a>
            </li> --}}
            <li>
                <a href="/contacts">Contact</a>
            </li>
        </ul>
    </nav>
</div>