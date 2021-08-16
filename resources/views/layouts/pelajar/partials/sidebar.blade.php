<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion" style="background-color: #edeefd;">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="container">
                    <div class="row">
                      <div class="col">
                        <img src="{{ url('/storage/images/logoKPT.png') }}" style="padding-top:50%" width="100%" height="100%" title="KEMENTERIAN PENGAJIAN TINGGI">
                      </div>
                      <div class="col">
                        <img src="{{ url('/storage/images/bem.png') }}" style="padding-top:50%" width="90%" height="90%" title="BAHAGIAN EDUCATION MALAYSIA">
                      </div>
                    </div>
                </div>
               
                {{-- PROFILE PICTURE view --}}
                @if(auth()->user()->image_file)
                    <center>
                        {{-- <img src="{{ asset('/storage/'.auth()->user()->image_file) }}" width="50" height="50"> --}}
                        <div class="sb-sidenav-menu-heading">
                            <a href="{{route('pelajar-profil:index')}}">
                                <img src="{{ asset('/storage/'.auth()->user()->image_file) }}" style="width:100%; border-radius: 50%; object-fit: cover; border-radius: none; border: 2px solid black; padding: none; box-shadow: none">
                            </a>
                        </div>
                    </center>
                @else
                    <center>
                        <div class="sb-sidenav-menu-heading">
                            <a href="{{route('pelajar-profil:index')}}">
                                <img src="{{ url('/storage/images/user_icon.png') }}" style="width:100%; border-radius: 50%; object-fit: cover; border-radius: none; border: 2px solid black; padding: none; box-shadow: none">
                            </a>
                        </div>
                    </center>
                @endif
                {{--  --}}

                {{-- <div class="sb-sidenav-menu-heading">Tarikh : {{ date('d-m-Y H:i:s') }}</div> --}}
                {{-- DASHBOARD --}}
                {{-- <a class="nav-link" href="{{ route('pelajar-dashboard:dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a> --}}
                {{--  --}}

                {{-- PENGURUSAN PROFIL --}}
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="far fa-user"></i></div>
                    Pengurusan Profil
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('pelajar-profil:index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-id-badge"></i></div>
                            Profil
                        </a>
                        <a class="nav-link" href="{{route('pelajar-password:index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-key"></i></div>
                            Tukar Kata Laluan
                        </a>
                    </nav>
                </div>
                {{--  --}}

                {{-- PENGURURSAN MAKLUMAT --}}
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa fa-user-circle"></i></div>
                    Pengurusan Maklumat
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('pelajar-peribadi:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-address-card" aria-hidden="true"></i></div>
                            {{-- Butiran Peribadi --}}
                            Peribadi
                        </a>
                        <a class="nav-link" href="{{route('pelajar-vaksinasi:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-medkit" aria-hidden="true"></i></div>
                            {{-- Butiran Pengajian --}}
                            Vaksinasi
                        </a>
                        <a class="nav-link" href="{{route('pelajar-waris:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                            {{-- Butiran Waris --}}
                            Waris
                        </a>
                        <a class="nav-link" href="{{route('pelajar-pengajianpelajar:index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-book-reader" aria-hidden="true"></i></div>
                            {{-- Butiran Pengajian --}}
                            Pengajian
                        </a>
                    </nav>
                </div>
                {{--  --}}

            </div>
        </div>

        {{-- <span class="border border-grey"></span>
        <div class="sb-sidenav-footer"  style="background-color: #edeefd;" >
            <div class="small">
                <p>
                    {{auth()->user()->capaian->keterangan}}<br><br>
                    {{auth()->user()->no_kp}}<br>
                    {{auth()->user()->name}}<br><br>                    
                    {{ date('d-m-Y H:i:s') }}
                </p>
            </div>
        </div> --}}
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
