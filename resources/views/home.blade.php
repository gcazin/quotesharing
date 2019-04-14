<?php
?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>QuoteSharing</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/cover/">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<div class="cover-container d-flex w-100 h-100 p-1 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">
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
                            <a href="quotes" class="nav-link text-black-50">Les citations</a>
                        </li>
                        @if(Auth::check())
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    {{ __(Auth::user()->username) }}
                                </button>
                                <div class="dropdown-menu">
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
        </div>
    </header>

    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="mb-4">Première plateforme collaborative de partage de citations!</h2>
                <p class="lead">Inscris-toi sans plus attendre pour montrer ton talent d'écriture!</p>
                <form method="post" action="home.blade.php" class="form-inline">
                    <input type="email" class="form-control w-50" placeholder="Adresse e-mail" required>
                    <button type="submit" class="btn btn-primary ml-2">Commencer</button>
                </form>
            </div>
            <div class="col-lg-6 text-center">
                <img width="70%" src="img/quote.svg">
            </div>
        </div>
    </div>

    <footer class="mastfoot mt-auto text-center">
        <div class="inner">
            <a style="font-size: 50px;" href="#"><i class="fas fa-angle-down"></i></a>
        </div>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
