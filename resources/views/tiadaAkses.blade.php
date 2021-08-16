<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">

        <title>Sistem Maklumat Pelajar Luar Negara</title>

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    </head>

<body>

 <!-- Navigation -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #1d1b7e;">

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
                <a class="nav-link" href="{{ route('new-login:ui') }}">Log Masuk</a>
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
  <div class="text-center">
    {{-- <img src="{{ route('image.displayImage','jata.jpeg') }}" alt="" title=""> --}}
    <img src="{{url('/storage/images/jata.jpeg')}}" width="30%" height="30%" class="rounded mx-auto d-block" alt="...">
  </div>

  {{-- @include('layouts.partials.container') --}}
  <div class="container">
      <div class="row text-center">
          <div class="col-lg-12 col-md-12 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h1 class="card-title">Ralat 404</h1>
                {{-- <p class="card-text">Maklumat berkaitan Sistem</p> --}}
              </div>
              <!-- Button trigger modal -->
              <div class="card-footer">
                <button type="button" class="btn btn-primary">
                    Kembali
                </button>
                {{-- <a href="#" class="btn btn-primary">Butiran Lanjut</a> --}}
              </div>
            </div>
          </div>
      </div>
  </div>

  @include('layouts.partials.footer')
</body>

</html>
