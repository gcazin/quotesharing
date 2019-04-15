<nav class="navbar navbar-expand-lg navbar-light px-0">
    <a class="navbar-brand" href="{{ route('home') }}">
        <h4><span class="text-primary font-weight-bold">Quote</span>
            <span class="text-black-50">Sharing</span>
            <i class="fas fa-pen-fancy ml-1 text-primary"></i>
        </h4>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active" style="font-size: 16px;">
                <a href="{{ route('citations') }}" class="nav-link text-black-50">Les citations</a>
            </li>
            @if(Auth::check())
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <img style="height:30px; width:30px" class="rounded-circle mr-2"
                             src="/storage/avatars/{{ Auth::user()->avatar }}"
                             alt="avatar">{{ __(Auth::user()->username) }}
                    </button>
                    <div class="dropdown-menu">
                        @if(\Illuminate\Support\Facades\Auth::user()->role == 2)
                            <a class="dropdown-item" href="{{ route('admin') }}">Administration</a>
                        @endif
                        <a class="dropdown-item" href="{{ route('dashboard') }}">Tableau de bord</a>
                        <hr class="dropdown-divider">
                        <a class="dropdown-item" href="{{ route('update') }}">Modifier vos informations</a>
                        <a class="dropdown-item" href="{{ route('logout') }}">Déconnexion</a>
                    </div>
                </div>
            @else
                <li class="nav-item">
                    <a href="{{ route('connexion') }}" class="nav-link">Connexion</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('inscription') }}" class="btn btn-primary">Inscription</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
