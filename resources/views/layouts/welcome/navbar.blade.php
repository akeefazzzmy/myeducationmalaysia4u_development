<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        {{-- @include('layouts.partials.navbar') --}}
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #ed7a00">
                <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
                <div class="btn-group">
                    {{-- <button type="button" class="btn btn-danger">Action</button> --}}
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('welcome-pengenalan:index')}}">Pengenalan</a>
                        <a class="dropdown-item" href="{{route('welcome-sejarah:index')}}">Sejarah</a>
                        <a class="dropdown-item" href="{{route('welcome-cartaorganisasi:index')}}">Carta Organisasi</a>
                        {{-- <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a> --}}
                    </div>
                </div>
                   
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                @if (Route::has('login'))
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/home') }}">Utama
                    <span class="sr-only">(current)</span>
                    </a>
                    </li>
                @else
                    <li class="nav-item">
                    {{-- <a class="nav-link" href="{{ route('new-login:ui') }}">Log Masuk</a> --}}
                    <a class="nav-link" href="{{ route('login') }}">Log Masuk</a>
                    </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Pendaftaran Baru</a>
                    </li>
                @endif
                @endif
                    </ul>
                    </div>
                @endif
        </nav>
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    {{-- @include('layouts.partials.footer') --}}
</body>


</html>