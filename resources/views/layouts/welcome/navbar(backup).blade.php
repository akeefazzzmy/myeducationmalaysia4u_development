<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Sistem Maklumat Pelajar Luar Negara') }}</title> --}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    
    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        {{-- @include('layouts.partials.navbar') --}}
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #ed7a00">
            {{-- <div class="container"> --}}
                <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
                
                <ul class="navbar-nav">                
                    <li class="nav-item dropdown">
                         <a class="nav-link navbarBody" style="color:rgb(255, 255, 255)" href="#" data-bs-toggle="dropdown">  MAKLUMAT KORPORAT  </a>
                         <div class="dropdown-menu" style="box-shadow: 0 20px 20px 0 rgba(0,0,0,.2)">
                             <a class="dropdown-item" href="{{route('welcome-pengenalan:index')}}">Pengenalan</a>
                             <a class="dropdown-item" href="{{route('welcome-sejarah:index')}}">Sejarah</a>
                             <a class="dropdown-item" href="{{route('welcome-cartaorganisasi:index')}}">Carta Organisasi</a>
                             {{-- <a class="dropdown-item" href="{{route('welcome-polisi:index')}}">Polisi</a> --}}
                         </div>
                     </li>
         
                    <li class="nav-item dropdown">
                       <a class="nav-link navbarBody" style="color:rgb(255, 255, 255)" href="#" data-bs-toggle="dropdown">  HUBUNGI KAMI  </a>
                        <div class="dropdown-menu" style="box-shadow: 0 20px 20px 0 rgba(0,0,0,.2)">                         
                         <a class="dropdown-item" href="{{route('welcome-direktoriEm:index')}}">Direktori Education Malaysia (EM)</a>
                         <a class="dropdown-item" href="{{route('welcome-direktoriBem:index')}}">Direktori Bahagian Education Malaysia (BEM)</a>
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item" href="#">Soalan Lazim</a>
                         <a class="dropdown-item" href="#">Saluran Aduan Integriti</a>
                       </div>
                    </li>
                </ul>
                   
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
                    <a class="nav-link" href="{{ route('register') }}">Daftar Baru</a>
                    </li>
                @endif
                @endif
                    </ul>
                    </div>
                @endif
            {{-- </div> --}}
        </nav>
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    {{-- @include('layouts.partials.footer') --}}
</body>


</html>