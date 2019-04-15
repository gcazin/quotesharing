@extends('layouts.base', ['mb' => true])

@section('title', 'Connexion')

@section('content')
    <div class="row align-items-center h-100 w-100">
        <div class="col-md-6 col-sm-1 bg-light d-flex justify-content-center align-items-center w-100">
            <img width="70%" src="img/login.svg">
        </div>
        <div class="col-md-6 col-sm-8 border-left h-100 d-flex flex-column justify-content-center px-4 bg-white">
            <h2 class="mb-4 mt-auto">Connexion</h2>
            <form action="{{ route('login') }}" method="post" class="mb-auto">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Pseudo / Adresse mail</label>
                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input id="password" type="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                           required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="remember" name="remember" checked>
                        <label class="custom-control-label" for="remember">Se souvenir de moi</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Connexion</button>
            </form>
            <p class="position-absolute" style="bottom: 5px">Pas encore inscrit? <a href="{{route('inscription')}}">inscrivez-vous</a>
            </p>
        </div>
    </div>
@endsection
