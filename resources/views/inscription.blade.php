@extends('templates.base')

@section('title', 'Inscription')
@section('content')
    <div class="row align-items-center h-100 w-100">
        <div class="col-lg-6 bg-light border-right h-100 d-flex justify-content-center align-items-center">
            <img width="70%" src="img/authentication.svg">
        </div>
        <div class="col-lg-6 h-100 d-flex flex-column justify-content-center px-4 bg-white">
            <h2 class="mb-4">Bienvenue sur QuoteSharing</h2>
            <p class="lead">Inscris-toi sans plus attendre pour montrer ton talent d'écriture!</p>
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="last_name">Nom</label>
                        <input type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" id="last_name" name="last_name" placeholder="Nom" value="{{ old('last_name') }}">
                        @if ($errors->has('last_name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="first_name">Prénom</label>
                        <input type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" id="first_name" name="first_name" placeholder="Prénom" value="{{ old('first_name') }}">
                        @if ($errors->has('first_name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="username">Pseudo</label>
                    <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" id="username" name="username" placeholder="Pseudo" value="{{ old('username') }}">
                    @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Mot de passe" value="{{ old('password') }}">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password_confirmation">Confirmation de mot de passe</label>
                        <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" id="password_confirmation" name="password_confirmation" placeholder="Confirmation de mot de passe" value="{{ old('password_confirmation') }}">
                        @if ($errors->has('password_confirmation'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">S'inscrire</button>
                <p class="position-absolute" style="bottom: 5px">Déjà un compte? <a href="{{route('connexion')}}">connectez-vous</a>
                </p>
            </form>
        </div>
    </div>
@endsection
