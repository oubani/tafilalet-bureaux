<div class=" text-light" style="background: #333">
    <div class="container py-1">   
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
        <span class="mt-1" style="padding-top:50px " >tafilalet.bureaux@yahoo.fr</span>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand text-warning h1" href="/">Tafilalet Bureaux</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse  " id="navbarSupportedContent">
            <form class="navbar-nav   m-auto">
            <input class="form-control" width="120px" type="search" placeholder="rechercher  " aria-label="Search">
            </form>
            <ul class="navbar-nav  center  ">
                <li class="nav-item {{ '/'==request()->path() ? 'active' : '' }}">
                    <a class="nav-link" href="/">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ 'produits'==request()->path() ? 'active' : '' }} ">
                    <a class="nav-link" href="/produits">Produits</a>
                </li>
                <li class="nav-item {{ 'materials'==request()->path() ? 'active' : '' }} ">
                    <a class="nav-link" href="/materials">Material Infomatique</a>
                </li>
                <li class="nav-item {{ 'catalogues'==request()->path() ? 'active' : '' }} ">
                    <a class="nav-link" href="/Catalgues">Catalogues</a>
                </li>
                @if (Auth::guest())
                    <li class="nav-item active ">
                        <a class="nav-link btn rounded btn-outline-warning " href="/login">Connection</a>
                    </li>
                @else
                {{-- a --}}
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @if (Auth::user()->role==1)
                            <a class="dropdown-item" href="/admin" > {{__('messages.dashboard')}} </a>
                        @else
                            <a class="dropdown-item" href="/user" > {{__('messages.dashboard')}} </a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endif
                
            </ul>
        </div>
    </div>
</nav>