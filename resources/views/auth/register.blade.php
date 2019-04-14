@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="last_name">Nom</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Nom">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="first_name">Prénom</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Prénom">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username">Pseudo</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Pseudo">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" id="password" placeholder="Mot de passe">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password_confirmation">Confirmation de mot de passe</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmation de mot de passe">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">S'inscrire</button>
                        <p class="position-absolute" style="bottom: 5px">Déjà un compte? <a href="{{route('connexion')}}">connectez-vous</a>
                        </p>
                        @if($errors->any())
                            <div class="row collapse">
                                <ul class="alert-box warning radius">
                                    @foreach($errors->all() as $error)
                                        <li> {{ $error }} </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
