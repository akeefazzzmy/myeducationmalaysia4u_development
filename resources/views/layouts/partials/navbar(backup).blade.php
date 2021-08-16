{{-- <a class="navbar-brand" href="">Sistem Maklumat Pelajar Luar Negara</a> coding asal--}}
<a class="navbar-brand" href="">{{ config('app.name') }}</a>
{{-- <button class="btn btn-link btn-sm order-1 order-lg-5" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button> button asal--}}
<!-- Navbar Search-->
<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    <div class="input-group">
        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
        <div class="input-group-append">
            <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>
<!-- Navbar-->
<ul class="navbar-nav ml-auto ml-md-0">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="img-thumbnail" src="{{ asset('/storage/'.auth()->user()->ImageFile) }}" width="40" height="40">
        </a>
        
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            {{-- <img src="{{ asset('/storage/'.auth()->user()->ImageFile) }}" width="90" height="90"> --}}
            <a class="dropdown-item" href="#">Tetapan</a>
            <a class="dropdown-item" href="#">Log Aktiviti</a>
            {{-- <a class="dropdown-item" href="#"><i style="color:grey" class="fas fa-cogs fa-2x"></i></a>
            <a class="dropdown-item" href="#"><i style="color:grey" class="fas fa-history fa-2x"></i></a> --}}
            <div class="dropdown-divider"></div>            
            {{-- <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Keluar</a> --}}
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i style="color:grey" class="fas fa-power-off fa-2x"></i></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf
            </form>
        </div>
    </li>
    <button class="btn btn-link btn-sm" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
</ul>
