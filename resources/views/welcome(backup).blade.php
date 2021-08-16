<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">

        <title>Sistem Maklumat Pelajar Luar Negara</title>

        <link href="{{ asset('themes/css/styles.css') }}" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        {{-- baru tambah --}}
        {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> --}}
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>{{--menjadi--}}
    </head>

<body>

 <!-- Navigation -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #ed7a00;">

    <div class="container">
      {{-- <a class="navbar-brand" href="#">Sistem Maklumat Pelajar Luar Negara</a> --}}
      <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      {{--  --}}
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
{{--  --}}

    </div>
  </nav>

  <div class="container">
    <div class="row">
        {{-- <img src="{{ route('image.displayImage','jata.jpeg') }}" alt="" title=""> --}}
        <img src="{{url('/storage/images/jata.jpeg')}}" width="30%" height="30%" class="rounded mx-auto d-block" alt="...">
        <img src="{{ url('/storage/images/bem.png') }}" style="padding-top:6%" width="15%" height="15%" class="rounded mx-auto d-block" alt="...">
      {{-- <img src="{{ asset('/storage/'.auth()->user()->ImageFile) }}" width="15%" height="10%" class="rounded float-right"> --}}
    </div>
  </div>

  @include('layouts.partials.container')

  {{-- @include('layouts.welcome.crossfading') --}}
  @include('layouts.partials.footer')


</body>

</html>
