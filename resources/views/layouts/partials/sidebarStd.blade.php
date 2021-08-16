<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion" style="background-color: #edeefd;">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <img src="{{ url('/storage/images/logo1.png') }}" width="90%" height="90%">
                @if(auth()->user()->ImageFile)
                <center>
                <img src="{{ asset('/storage/'.auth()->user()->ImageFile) }}" width="90" height="90">
                </center>
                @endif
                <div class="sb-sidenav-menu-heading">Tarikh : {{ date('d-m-Y H:i:s') }}</div>
                <a class="nav-link" href="{{ route('home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="far fa-user"></i></div>
                    Pengurusan Profil
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('std-profile') }}">
                            {{-- <a class="nav-link" href="#"> --}}
                            <div class="sb-nav-link-icon"><i class="fas fa-id-badge"></i></div>
                            Profil
                        </a>
                        {{-- <a class="nav-link" href="{{ route('std-profile-password')}}"> --}}
                            <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-key"></i></div>
                            Tukar Kata Laluan
                        </a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fa fa-user-circle"></i></div>
                Pengurusan Maklumat
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        {{-- <a class="nav-link" href="{{ route('std-detail') }}"> --}}
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fa fa-address-card" aria-hidden="true"></i></div>
                            Butiran Peribadi
                        </a>
                        {{-- <a class="nav-link" href="{{ route('std-waris') }}"> --}}
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                            Butiran Waris
                        </a>
                        {{-- <a class="nav-link" href="{{ route('std-edu-list') }}"> --}}
                            <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fa fa-university" aria-hidden="true"></i></div>
                            Butiran Pengajian
                        </a>
                    </nav>
                </div>
            </div>

        </div>
        <div class="sb-sidenav-footer"  style="background-color: #edeefd;" >
            <div class="small">Logged in as: {{ auth()->user()->Nama }}</div>
            <div class="small">Logged as: {{ auth()->user()->no_kp }}</div>
        </div>
    </nav>
