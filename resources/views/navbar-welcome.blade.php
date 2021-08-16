<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #ed7a00;">
    <div class="container">
        {{-- <a class="navbar-brand" href="#">Sistem Maklumat Pelajar Luar Negara</a> --}}
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
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
    </div>
</nav>