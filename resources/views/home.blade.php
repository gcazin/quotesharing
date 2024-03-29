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
        @include('partials.nav')
    </header>

    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h2 class="mb-4">Première plateforme collaborative de partage de citations!</h2>
                @if(!\Illuminate\Support\Facades\Auth::check())
                <p class="lead">Inscris-toi sans plus attendre pour montrer ton talent d'écriture!</p>
                <form method="post" action="home.blade.php" class="form-inline">
                    <input type="email" class="form-control w-50" placeholder="Adresse e-mail" required>
                    <button type="submit" class="btn btn-primary ml-2">Commencer</button>
                </form>
                @else
                    <p class="lead">Connecté en tant que <span class="font-weight-bolder">{{\Illuminate\Support\Facades\Auth::user()->username}}</span></p>
                    <a href="{{ route('profil', \Illuminate\Support\Facades\Auth::user()->id) }}" class="btn btn-primary">Accéder au tableau de bord</a>
                @endif
            </div>
            <div class="col-sm-6 text-center">
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
