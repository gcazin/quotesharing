@extends('templates.base')

@section('title', 'Connexion')

@section('content')
    <div class="row align-items-center h-100 w-100">
        <div class="col-lg-6 bg-light border-right h-100 d-flex justify-content-center align-items-center">
            <img width="70%" src="img/login.svg">
        </div>
        <div class="col-lg-6 h-100 d-flex flex-column justify-content-center px-4 bg-white">
            <h2 class="mb-4">Connexion</h2>
            <form action="{{ route('login') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Mot de passe</label>
                    <input type="password" class="form-control" id="inputEmail4" name="password" placeholder="Mot de passe">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="remember" name="remember" checked>
                        <label class="custom-control-label" for="remember">Se souvenir de moi</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Connexion</button>
                <p class="position-absolute" style="bottom: 5px">Pas encore inscrit? <a href="{{route('inscription')}}">inscrivez-vous</a>
                </p>
            </form>
        </div>
    </div>
@endsection
