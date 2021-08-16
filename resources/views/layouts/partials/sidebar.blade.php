<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion" style="background-color: #edeefd;">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Tarikh : {{ date('d-m-Y H:i:s') }}</div>
                <a class="nav-link" href="{{ route('dashboard') }}">
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
                        <a class="nav-link" href="{{ route('my-profile') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-id-badge"></i></div>
                            Profil
                        </a>
                        <a class="nav-link" href="{{ route('my-profile-password')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-key"></i></div>
                            Tukar Kata Laluan
                        </a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCode2" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa fa-clipboard" aria-hidden="true"></i></div>
                    Laporan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCode2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fa fa-list-ul"></i></div>
                            Laporan 1
                        </a>
                     </nav>
                </div>
                <div class="collapse" id="collapseCode2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fa fa-list-ul"></i></div>
                            Laporan 2
                        </a>
                     </nav>
                </div>
                <div class="collapse" id="collapseCode2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fa fa-list-ul"></i></div>
                            Laporan 3
                        </a>
                     </nav>
                </div>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Carian Pelajar
                </a>
            </div>
        </div>
        {{--  --}}

        {{-- <span class="border border-dark"></span> --}}
        {{-- <div class="sb-sidenav-footer"  style="background-color: #edeefd;" >
            <div class="small">
                <label>{{ auth()->user()->Nama }}</label><br>
                <label>{{ auth()->user()->no_kp }}</label><br>
                <label>{{ auth()->user()->capaian['Keterangan'] }}</label>
            </div>
        </div> --}}
    </nav>
