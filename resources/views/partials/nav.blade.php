<nav class="navbar navbar-expand-lg navbar-light px-0">
    <a class="navbar-brand" href="{{ route('home') }}">
        <h4><span class="text-primary font-weight-bold">Quote</span>
            <span class="text-black-50">Sharing</span>
            <i class="fas fa-pen-fancy ml-1 text-primary"></i>
        </h4>
    </a>
    <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item" style="font-size: 16px;">
                <a href="{{ route('citations') }}" class="nav-link text-primary">Les citations</a>
            </li>
            @if(Auth::check())
                <li class="nav-item active" style="font-size: 16px;">
                    <a class="nav-link text-black-50" href="{{ route('profil', \Illuminate\Support\Facades\Auth::user()->id) }}">Tableau de bord</a>
                </li>
                <li class="nav-item active" style="font-size: 16px;">
                    <a class="nav-link text-black-50" href="{{ route('update') }}">Modifier vos informations</a>
                </li>
                <li class="nav-item active" style="font-size: 16px;">
                    <a class="nav-link text-danger" href="{{ route('logout') }}">Déconnexion</a>
                </li>
                <li class="nav-item active" style="font-size: 16px;">
                    <a class="nav-link text-black-50" href="{{ route('profil', \Illuminate\Support\Facades\Auth::user()->id) }}">
                        <img style="height:30px; width:30px" class="rounded-circle mr-2"
                             src="/storage/avatars/{{ Auth::user()->avatar }}"
                             alt="avatar">{{ __(Auth::user()->username) }}
                    </a>
                </li>
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
