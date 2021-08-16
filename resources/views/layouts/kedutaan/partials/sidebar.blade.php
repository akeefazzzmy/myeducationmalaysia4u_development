<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion" style="background-color: #edeefd;">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="container">
                    <div class="row">
                      <div class="col">
                        <img src="{{ url('/storage/images/logoKPT.png') }}" style="padding-top:50%" width="100%" height="100%" title="KEMENTERIAN PENGAJIAN TINGGI">
                        {{-- <img src="{{ url('/storage/images/kpt.png') }}" width="100%" height="100%"> --}}
                      </div>
                      <div class="col">
                        <img src="{{ url('/storage/images/bem.png') }}" style="padding-top:50%" width="90%" height="90%" title="BAHAGIAN EDUCATION MALAYSIA">
                      </div>
                    </div>
                </div>
                
                @if(auth()->user()->image_file)
                    <center>
                        {{-- <img src="{{ asset('/storage/'.auth()->user()->image_file) }}" width="50" height="50"> --}}
                        <div class="sb-sidenav-menu-heading">
                            <a href="{{route('kedutaan-my-profile')}}">
                                <img src="{{ asset('/storage/'.auth()->user()->image_file) }}" style="width:100%; border-radius: 50%; object-fit: cover; border-radius: none; border: 2px solid black; padding: none; box-shadow: none">
                            </a>
                        </div>
                    </center>
                @else
                    <center>
                        <div class="sb-sidenav-menu-heading">
                            <a href="{{route('kedutaan-my-profile')}}">
                                <img src="{{ url('/storage/images/user_icon.png') }}" style="width:100%; border-radius: 50%; object-fit: cover; border-radius: none; border: 2px solid black; padding: none; box-shadow: none">
                            </a>
                        </div>
                    </center>
                @endif

                {{-- DASHBOARD --}}
                <a class="nav-link" href="{{ route('kedutaan-dashboard:dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                {{--  --}}

                {{-- PENGURUSAN PROFIL --}}
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengurusanProfil" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                        Pengurusan Profil
                    <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pengurusanProfil" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('kedutaan-my-profile') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-id-badge"></i></div>
                            Profil Saya
                        </a>
                        <a class="nav-link" href="{{ route('kedutaan-my-profile-password')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-key"></i></div>
                            Tukar Kata Laluan
                        </a>
                    </nav>
                </div>
                {{--  --}}

                {{-- PENGURUSAN PELAJAR --}}
                {{-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengurusanMaklumat" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                    Pengurusan Pelajar
                    <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pengurusanMaklumat" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('kedutaan-peribadipelajar:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-address-card" aria-hidden="true"></i></div>
                            Peribadi
                        </a>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fa fa-medkit" aria-hidden="true"></i></div>
                            Vaksinasi
                        </a>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                            Waris
                        </a>
                        <a class="nav-link" href="{{ route('kedutaan-pengajianpelajar:index') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-book-reader" aria-hidden="true"></i></div>
                            Pengajian
                        </a>
                    </nav>
                </div> --}}
                {{--  --}}

                {{-- PENGURUSAN PELAJAR--}}
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengurusanPelajar" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa fa-tasks"></i></div>
                        Pengurusan Pelajar
                    <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pengurusanPelajar" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cariPelajar" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa fa-search"></i></div>
                                Cari Pelajar
                            <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                        </a>
                    </nav>
                </div>
                <div class="collapse" id="cariPelajar" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        {{-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#daftarPelajar" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa fa-user-plus"></i></div>
                                Daftar Pelajar level 2sdasd
                            <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                        </a> --}}
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cariPelajar" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa fa-search"></i></div>
                                Cari Pelajar
                            <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <a class="nav-link" href="{{route('kedutaan-pengurusanpelajar:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-id-card"></i></div>
                            Nombor KP
                        </a>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fa fa-flag"></i></div>
                            Negara
                        </a>
                     </nav>
                </div>

                {{-- PENGURUSAN KOD --}}
                {{-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengurusanKod" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>
                    Pengurusan Kod
                    <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pengurusanKod" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav"> --}}

                        {{-- NEGARA --}}
                        {{-- <a class="nav-link" href="{{route('kedutaan-negara:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-flag"></i></div>
                            Negara
                        </a>

                        <a class="nav-link" href="{{route('admin-institusi:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-university"></i></div>
                            Senarai Institusi
                        </a>
                        <a class="nav-link" href="{{route('admin-programpengajian:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-certificate"></i></div>
                            Program Pengajian
                        </a>
                        
                        <a class="nav-link" href="{{route('admin-states:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-city"></i></div>
                            <i>States</i>
                        </a>
                    </nav>
                </div> --}}
                {{--  --}}
            </div>
        </div>

        <span class="border border-grey"></span>
        <div class="sb-sidenav-footer"  style="background-color: #edeefd;" >
            <div class="small">
                <p>
                    {{auth()->user()->no_kp}}<br>
                    {{auth()->user()->name}}<br>
                    ({{auth()->user()->capaian->keterangan}})            
                    {{-- {{ date('d-m-Y H:i:s') }} --}}
                </p>
            </div>
        </div>
        
        {{-- <span class="border border-dark"></span> --}}
        {{-- <div class="sb-sidenav-footer"  style="background-color: #edeefd;" >
            <div class="small">
                <label>{{ auth()->user()->Nama }}</label><br>
                <label>{{ auth()->user()->no_kp }}</label><br>
                <label>{{ auth()->user()->capaian['Keterangan'] }}</label>
            </div>
        </div> --}}
    </nav>
</div>
