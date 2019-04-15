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
        <div class="row bg-white align-items-center justify-content-center shadow-sm rounded-sm py-3">
            <div class="col-lg-2 text-center">
                <img
                    src="{{ asset('/storage/avatars/'.$user->avatar.'') }}"
                    alt="avatar"
                    class="rounded-circle"
                    style="height:100px;width:100px;">
            </div>
            <div class="col-lg-6 border-right">
                <h3>{{ $user->last_name}} {{$user->first_name}}</h3>
                <p>Mail : {{ $user->email }}</p>
                <a class="btn btn-success" href="mailto:{{ $user->email }}">Contact</a>
            </div>
            <div class="col-lg-4">fds</div>
        </div>
    </div>
@endsection
