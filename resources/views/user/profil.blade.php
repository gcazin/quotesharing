@php
use App\Quote;
use App\Category;
@endphp

@extends('layouts.base', ['mb' => false])

@section('title', 'Tableau de bord')

@section('content')
    <div class="row mr-0">
        <div class="col-md-12 bg-primary text-white shadow-sm px-0 rounded-lg">
            <div class="row py-3 mx-auto" style="max-width:80%">
                <div class="col-md-6 col-sm-6">
                    @if(\Illuminate\Support\Facades\Auth::user()->id == $user->id)
                        <h3>Tableau de bord</h3>
                    @else
                        <h3>Profil de <span class="font-weight-bold">{{$user->username}}</span></h3>
                    @endif
                </div>
                <div class="col-md-6 col-sm-6 text-right">
                    @if(\Illuminate\Support\Facades\Auth::user()->id == $user->id)
                        <a class="btn btn-light" href="{{ route('update') }}">Modifier le profil</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3" style="max-width: 80%">
        <div class="row bg-white align-items-center justify-content-center shadow-sm rounded-lg py-3">
            <div class="col-lg-2 col-sm-3 col-md-3 text-center">
                <img
                    src="{{ asset('/storage/avatars/'.$user->avatar.'') }}"
                    alt="avatar"
                    class="rounded-circle shadow-sm border h-100"
                    style="width:100px">
            </div>
            <div class="col-lg-6 col-sm-5 col-md-5 border-right">
                <h3>{{ $user->last_name}} {{$user->first_name}}
                    <small>({{ $user->username }})</small>
                </h3>
                <p>{{ $user->email }}</p>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4">
                <div class="text-right">

                </div>
            </div>
        </div>
    </div>
    <div class="container" style="max-width: 80%">
        <div class="row mt-3">
            <div class="col-md-3 pl-0">
                <div class="col-md-12 bg-white shadow-sm py-2 rounded-lg">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ \App\Quote::all()->where('user_id', $user->id)->count() }}
                            citations postés
                        </li>
                        <li class="list-group-item">

                            @if($user->role == 1)
                                <span class="badge badge-secondary">{{ __('Membre') }}</span>
                            @else
                                <span class="badge badge-success text-white">{{ __('Administreur') }}</span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 px-0">
                @if(\Illuminate\Support\Facades\Auth::user()->id == $user->id)
                    <div class="col-md-12 bg-white py-3 shadow-sm mb-3 rounded-lg">
                        <form action="{{ route('post.publish') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <textarea name="quote"
                                              cols="10"
                                              rows="2"
                                              class="form-control{{ $errors->has('quote') ? ' is-invalid' : '' }} mb-2"
                                              onresize="false"
                                              placeholder="Publier une citation"
                                              autofocus></textarea>
                                        @if ($errors->has('quote'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('quote') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <select name="category" id="category" class="form-control">
                                            @foreach($categories = \App\Category::all() as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary">Publier</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
                @if(\App\Quote::all()->where('user_id', $user->id)->count() > 0)
                    @foreach($quotes = \App\Quote::all()->where('user_id', $user->id) as $quote)
                        <div class="col-md-12 bg-white py-3 shadow-sm mb-3 rounded-lg">
                            <blockquote class="blockquote">
                                <p class="mb-0">{{ $quote->quote }}</p>
                                <footer class="blockquote-footer mt-2">
                                    Publié le {{ \Carbon\Carbon::parse($quote->created_at)->formatLocalized('%d %B') }}
                                    dans la catégorie
                                    <span class="badge badge-primary">{{ Category::find($quote->category_id)->title }}</span>
                                </footer>
                            </blockquote>
                            <hr>
                            <div class="text-right pb-2">
                                <form action="{{ route('destroy', $quote->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12 bg-white pt-3 pb-1 mb-0 shadow-sm rounded-lg">
                        <div class="alert alert-warning">
                            Aucune citation postée
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
