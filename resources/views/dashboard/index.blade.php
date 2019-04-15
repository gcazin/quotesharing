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
    <div class="container" style="max-width: 80%">
        <div class="row bg-white align-items-center justify-content-center shadow-sm rounded-sm py-3">
            <div class="col-lg-2 text-center">
                <img
                    src="{{ asset('/storage/avatars/'.$user->avatar.'') }}"
                    alt="avatar"
                    class="rounded-circle shadow-sm border"
                    style="height:100px;width:100px">
            </div>
            <div class="col-lg-6 border-right">
                <h3>{{ $user->last_name}} {{$user->first_name}}
                    <small>({{ $user->username }})</small>
                </h3>
                <p>{{ $user->email }}</p>
            </div>
            <div class="col-lg-4">
                <div class="text-right">
                    <a class="btn btn-primary" href="{{ route('update') }}">Modifier le profil</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="max-width: 80%">
        <div class="row mt-4">
            <div class="col-md-3 pl-0">
                <div class="col-md-12 bg-white shadow-sm">
                    test
                </div>
            </div>
            <div class="col-md-9 px-0">
                <div class="col-md-12 bg-white py-3 shadow-sm">
                    <form action="{{ route('post.publish') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-1">
                                <img
                                    src="storage/avatars/{{ $user->avatar }}"
                                    class="rounded-circle shadow-sm mt-1"
                                    alt="avatar"
                                    style="height: 50px; width: 50px;">
                            </div>
                            <div class="col-md-11">
                                <textarea name="quote" cols="10" rows="2"
                                          class="form-control{{ $errors->has('quote') ? ' is-invalid' : '' }} mb-2 shadow-sm"
                                          onresize="false"></textarea>
                                @if ($errors->has('quote'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('quote') }}</strong>
                                    </span>
                                @endif
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">
                                        Publier
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @if(\App\Post::all()->where('idUser', \Illuminate\Support\Facades\Auth::user()->id)->count() > 0)
                    @foreach($quotes = \App\Post::all()->where('idUser', \Illuminate\Support\Facades\Auth::user()->id) as $quote)
                        <div class="col-md-12 bg-white py-3 shadow-sm mt-2">
                            <p>{{ $quote->quote }}</p>
                            <div class="text-right">
                                <small class="text-info">
                                    Publié le {{ \Carbon\Carbon::parse($quote->created_at)->format('d/m/Y') }}
                                    à {{ \Carbon\Carbon::parse($quote->created_at)->timezone('Europe/Paris')->format('H:i:s') }}
                                </small>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12 bg-white py-3 shadow-sm mt-2">
                        <p>Salut</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
