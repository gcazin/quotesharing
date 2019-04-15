@extends('layouts.base', ['mb' => false])

@section('title', 'Tableau de bord')

@section('content')
    <style>
        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }
    </style>
    <div class="container">
        <div class="row mx-auto bg-white p-3 rounded-sm shadow-sm">
            <div class="col-lg">
                <form method="post" action="{{ route('update.avatar') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-2 align-items-center justify-content-center d-flex border-right">
                                <img
                                    src="storage/avatars/{{ $user->avatar }}"
                                    class="rounded-circle shadow-sm"
                                    alt="avatar"
                                    style="height: 120px; width: 120px;">
                            </div>
                            <div class="col-md-10">
                                <div class="card-header">
                                    <h5>Photo de profil</h5>
                                </div>
                                <div class="card-body">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input invisible" id="avatar" name="avatar">
                                        <label class="custom-file-label d-block" for="avatar" data-browse="Parcourir">Image</label>
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
                                        <label for="last_name" class="col-sm-2 col-form-label">Nom de famille</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="first_name" class="col-sm-2 col-form-label">Prénom</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="emal" class="col-sm-2 col-form-label">Adresse email</label>
                                        <div class="col-sm-10">
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

