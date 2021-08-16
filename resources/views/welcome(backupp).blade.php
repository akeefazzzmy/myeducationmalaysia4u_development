<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- <meta charset="utf-8"> --}}
        {{-- <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no"> --}}

        <title>{{ config('app.name') }}</title>

        <link href="{{ asset('themes/css/styles.css') }}" rel="stylesheet" />
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        {{-- <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" /> --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script> --}}
        {{-- <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script> --}}
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
        
        {{-- baru tambah --}}
        {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> --}}

        {{--menjadi--}}
        {{-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> --}}
    </head>

<body>
  {{-- @include('layouts.welcome.navbar') --}}
  @include('layouts.partials.navbar')
  @include('layouts.welcome.container1')
  @include('layouts.welcome.container2')
  @include('layouts.welcome.container3')
</body>

<footer>
  @include('layouts.partials.footer')
</footer>
</html>
