{{-- <a class="navbar-brand" href="">Sistem Maklumat Pelajar Luar Negara</a> coding asal--}}
<button class="btn btn-link btn-sm" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
<a class="navbar-brand" style="color:#ffffff" href="{{ route('admin-dashboard:dashboard') }}"><b>{{ config('app.name') }}</b></a>
{{-- <button class="btn btn-link btn-sm order-1 order-lg-5" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button> button asal--}}
<!-- Navbar Search-->
<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    <div class="input-group">
        {{-- BUTTON SEARCH --}}
        {{-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" /> --}}
        {{-- <div class="input-group-append">
            <button class="btn btn-danger" type="button"><i class="fas fa-search"></i></button>
        </div> --}}
    </div>
</form>
<!-- Navbar-->
<ul class="navbar-nav ml-auto ml-md-0">
    <a class="dropdown-item" title="Log Keluar" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i style="color:rgb(128, 0, 0)" class="fas fa-power-off fa-2x"></i></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf
            </form>
</ul>