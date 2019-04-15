@extends('layouts.base', ['mb' => true])

@section('title', 'Connexion')

@section('content')
    <div class="row align-items-center h-100 w-100 my-2">
        @foreach($quotes = \App\Post::all() as $quote)
            <div class="col-md-12 bg-white my-2 py-3 shadow-sm mt-2 mx-auto" style="max-width:80%">
                <p>{{ $quote->quote }}</p>
                <div class="text-right">
                    <small class="text-info">
                        Publié le {{ \Carbon\Carbon::parse($quote->created_at)->format('d/m/Y') }}
                        à {{ \Carbon\Carbon::parse($quote->created_at)->timezone('Europe/Paris')->format('H:i:s') }}
                    </small>
                    <small>- Publié par {{ \App\User::find($quote->idUser)->retrieveUser->username }}</small>
                </div>
            </div>
        @endforeach
    </div>
@endsection
