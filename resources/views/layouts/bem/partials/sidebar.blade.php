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
                {{-- <div class="sb-sidenav-menu-heading"><img src="{{url('/storage/images/8.jpg')}}" style="width:100%"></div> --}}
                {{-- <div class="sb-sidenav-menu-heading"><img src="{{url('/storage/images/7.jpg')}}" style="width:100%; border-radius: 50%; object-fit: cover; border-radius: none; border: 2px solid black; padding: none; box-shadow: none"></div> --}}
                @if(auth()->user()->image_file)
                    <center>
                        {{-- <img src="{{ asset('/storage/'.auth()->user()->image_file) }}" width="50" height="50"> --}}
                        <div class="sb-sidenav-menu-heading">
                            <a href="{{route('bem-my-profile')}}">
                                <img src="{{ asset('/storage/'.auth()->user()->image_file) }}" style="width:100%; border-radius: 50%; object-fit: cover; border-radius: none; border: 2px solid black; padding: none; box-shadow: none">
                            </a>
                        </div>
                    </center>
                @else
                    <center>
                        <div class="sb-sidenav-menu-heading">
                            <a href="{{route('bem-my-profile')}}">
                                <img src="{{ url('/storage/images/user_icon.png') }}" style="width:100%; border-radius: 50%; object-fit: cover; border-radius: none; border: 2px solid black; padding: none; box-shadow: none">
                            </a>
                        </div>
                    </center>
                @endif
                {{-- <div class="sb-sidenav-menu-heading">Tarikh : {{ date('d-m-Y H:i:s') }}</div> --}}
                {{-- DASHBOARD --}}
                <a class="nav-link" href="{{ route('bem-dashboard:dashboard') }}">
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
                        <a class="nav-link" href="{{ route('bem-my-profile') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-id-badge"></i></div>
                            Profil Saya
                        </a>
                        <a class="nav-link" href="{{ route('bem-my-profile-password')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-key"></i></div>
                            Tukar Kata Laluan
                        </a>
                    </nav>
                </div>
                {{--  --}}

                {{-- CARIAN PELAJAR--}}
                {{-- <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                    Carian Pelajar
                </a> --}}
                {{--  --}}

                {{-- CARIAN PELAJAR --}}
                {{-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#carianPelajar" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa fa-search"></i></div>
                        Carian Pelajar
                    <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="carianPelajar" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fa fa-id-card"></i></div>
                            Nombor KP
                        </a>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fa fa-globe"></i></div>
                            Negara
                        </a>
                     </nav>
                </div> --}}
                {{--  --}}

                {{-- LAPORAN --}}
                {{-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa fa-file"></i></div>
                    Laporan
                    <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="laporan" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fa fa-file"></i></div>
                            Laporan 1
                        </a>
                     </nav>
                </div> --}}
                {{--  --}}
                
                {{-- PENGURUSAN KOD--}}
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengurusanKod" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>
                    Pengurusan Kod
                    <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pengurusanKod" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        {{-- NEGARA --}}
                        <a class="nav-link" href="{{route('bem-negara:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-flag"></i></div>
                            Negara
                        </a>
                        {{--  --}}
                        {{-- STATES --}}
                        <a class="nav-link" href="{{route('bem-states:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-city"></i></div>
                            <i>States</i>
                        </a>
                        {{--  --}}
                        {{-- NEGERI --}}
                        <a class="nav-link" href="{{route('bem-negeri:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-flag"></i></div>
                            Negeri
                        </a>
                        {{--  --}}
                        {{-- <a class="nav-link" href="{{ route('admin.senarai') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                            Senarai Pengguna
                        </a> --}}
                        {{-- <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fa fa-flag"></i></div>
                            Senarai Wilayah / State
                        </a> --}}
                        {{-- <a class="nav-link" href="{{route('admin-institusi:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-university"></i></div>
                            Senarai Institusi
                        </a> --}}
                        {{-- <a class="nav-link" href="{{route('admin-tahappengajian:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-graduation-cap"></i></div>
                            Tahap Pengajian
                        </a> --}}
                        {{-- <a class="nav-link" href="{{route('bem-programpengajian:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-certificate"></i></div>
                            Program Pengajian
                        </a> --}}
                        {{-- <a class="nav-link" href="{{route('admin-statuspengajian:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-info-circle"></i></div>
                            Status Pengajian
                        </a> --}}
                        <a class="nav-link" href="{{route('bem-penaja:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-donate"></i></div>
                            Senarai Penaja
                        </a>
                        <a class="nav-link" href="{{route('bem-em:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-map-marker"></i></div>
                            Education Malaysia
                        </a>
                        <a class="nav-link" href="{{route('bem-liputanEm:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-globe"></i></div>
                            Liputan Education Malaysia
                        </a>
                        
                        <a class="nav-link" href="{{route('bem-hubungan:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-child"></i></div>
                            Hubungan
                        </a>
                        <a class="nav-link" href="{{route('bem-agama:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-praying-hands"></i></div>
                            Agama
                        </a>
                        <a class="nav-link" href="{{route('bem-bangsa:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-flag-checkered"></i></div>
                            Bangsa
                        </a>
                     </nav>
                </div>
                {{--  --}}

                {{-- PENGGUNA SISTEM --}}
                {{-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengguna" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                    Pengguna Sistem
                    <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                </a> --}}
                {{-- <div class="collapse" id="pengguna" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav"> --}}
                        {{-- <a class="nav-link" href="{{ route('my-profile') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-id-badge"></i></div>
                            Profil
                        </a>
                        <a class="nav-link" href="{{ route('my-profile-password')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-key"></i></div>
                            Tukar Kata Laluan
                        </a> --}}
                        {{-- <a class="nav-link" href="{{route('admin-penggunaAdmin:index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Admin
                        </a>
                        <a class="nav-link" href="{{route('admin-penggunaBem:index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Bahagian Education Malaysia
                        </a>
                        <a class="nav-link" href="{{route('admin-penggunaEm:index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Education Malaysia
                        </a>
                        <a class="nav-link" href="{{route('admin-penggunaKedutaan:index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Kedutaan
                        </a>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Pelajar
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
        {{-- <div class="sb-sidenav-menu-heading">
            <p>{{auth()->user()->name}}</p>
            <p>{{auth()->user()->keterangan}}</p>
            <p>{{ date('d-m-Y H:i:s') }}</p>
        </div> --}}
    </nav>
</div>
