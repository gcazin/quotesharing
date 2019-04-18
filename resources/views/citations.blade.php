<?php

use App\Quote;
use App\User;
use App\Category;

?>

@extends('layouts.base', ['mb' => false])

@section('title', 'Citations')

@section('content')
    <style>
        input::-webkit-input-placeholder {color: var(--light) !important;}  input:-moz-placeholder { /* Firefox 18- */color: var(--light) !important;}  input::-moz-placeholder {  /* Firefox 19+ */color: var(--light) !important;}  input:-ms-input-placeholder {color: var(--light) !important;}
    </style>
    <div class="row mr-0">
        <div class="col-md-12 bg-primary text-white shadow-sm rounded-lg">
            <div class="row py-3 mx-auto" style="max-width:80%">
                <div class="col-md-6 col-sm-6">
                    <h3>Citations</h3>
                </div>
                <div class="col-md-6 col-sm-6 pr-0">
                    <form action="#" method="post">
                        <div class="col-md-6 float-right">
                            <input type="text" placeholder="Rechercher" class="form-control bg-transparent text-light border-white">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row w-100 my-4 mx-auto pl-3" style="max-width:80%">
        <div class="col-md-9">
            <div class="row">
                @if(\Illuminate\Support\Facades\Auth::check())
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
            </div>
            @foreach($quotes = Quote::all() as $quote)
                <div class="row mb-3 mt-0">
                    <div class="col-md-12 pt-3 pb-1 bg-white shadow-sm rounded-lg">
                        <blockquote class="blockquote">
                            <p class="mb-0">{{ $quote->quote }}</p>
                            <footer class="blockquote-footer mt-2">
                                Publié par
                                <a
                                    href="/profil/{{ User::find($quote->user_id)->id }}">
                                    {{ User::find($quote->user_id)->username }}</a>
                                    le {{ \Carbon\Carbon::parse($quote->created_at)->formatLocalized('%d %B') }}
                                    dans la catégorie
                                    <span class="badge badge-primary">{{ Category::find($quote->category_id)->title }}</span>
                            </footer>
                        </blockquote>
                        @if(Auth::user()->role == 2 or User::find($quote->user_id)->id == Auth::user()->id)
                            <hr>
                            <div class="text-right pb-2">
                                <form action="{{ route('destroy', $quote->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-3">
            <div class="col-md-12">
                <p class="text-uppercase h5 font-weight-light">Catégories</p>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">Toutes les catégories</a>
                    @foreach($categories = Category::all() as $category)
                        <a href="{{ route('citations') }}" class="list-group-item list-group-item-action">{{ $category->title }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
