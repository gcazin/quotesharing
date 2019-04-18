@extends('layouts.base', ['mb' => false])

@section('title', 'Tableau de bord')

@section('content')
    <div class="row mr-0">
        <div class="col-md-12 bg-primary text-white shadow-sm">
            <div class="row py-3 mx-auto" style="max-width:80%">
                <div class="col-md-6 col-sm-6">
                    <h3>Modifier votre profil</h3>
                </div>
                <div class="col-md-6 col-sm-6 text-right pr-0">
                    <a class="btn btn-light" href="{{ route('profil', \Illuminate\Support\Facades\Auth::user()->id) }}">Retour au profil</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3" style="max-width: 80%">
        <div class="row mx-auto bg-white py-3 rounded-lg shadow-sm">
            <div class="col-lg">
                <form method="post" action="{{ route('update.avatar') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-2 col-sm-6 align-items-center justify-content-center d-flex border-right">
                                <img
                                    src="storage/avatars/{{ $user->avatar }}"
                                    class="rounded-circle shadow-sm"
                                    alt="avatar"
                                    style="height: 120px; width: 120px;">
                            </div>
                            <div class="col-md-10 col-sm-6">
                                <div class="card-header">
                                    <h5>Photo de profil</h5>
                                </div>
                                <div class="card-body">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="avatar" name="avatar">
                                        <label class="custom-file-label d-block" for="avatar" data-browse="Parcourir"></label>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">
                                            Mettre à jour
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="{{ route('update.info') }}" method="post">
                    @csrf
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <h4>Informations personnelles</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="username" class="col-sm-4 col-form-label">Pseudo</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="last_name" class="col-sm-4 col-form-label">Nom de famille</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="first_name" class="col-sm-4 col-form-label">Prénom</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="emal" class="col-sm-4 col-form-label">Adresse email</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="last_name" name="email" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">
                                            Mettre à jour
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

