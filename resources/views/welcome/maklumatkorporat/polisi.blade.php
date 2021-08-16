<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">

    <title>{{ config('app.name') }}</title>

    <link href="{{ asset('themes/css/styles.css') }}" rel="stylesheet" />

    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<header>
    @include('layouts.welcome.navbar')
</header>

<body>

    @include('layouts.welcome.navbar-body')
    @include('layouts.welcome.maklumatkorporat.polisi')
    {{-- @include('layouts.welcome.container3')    --}}
    {{-- @include('layouts.welcome.container4') --}}
    {{-- @include('layouts.welcome.container2')  --}}
    @include('layouts.welcome.container6')
</body>

<footer>
    {{-- @include('layouts.partials.footer') --}}
    @include('layouts.welcome.container5')
    {{-- @include('layouts.welcome.footer') --}}
</footer>
</html>