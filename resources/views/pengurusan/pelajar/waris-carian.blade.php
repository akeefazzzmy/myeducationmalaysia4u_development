@extends('admin.layouts.main')

@section('body')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" /> --}}
{{-- <link href="{{ asset('themes/css/styles.css') }}" rel="stylesheet" /> --}}
{{-- <div class="container"> --}}
{{-- Design https://www.bootdey.com/snippets/view/about-me-profile --}}
<h1 class="mt-4">Carian Waris Pelajar</h1>
<nav aria-label="breadcrumb" class="main-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{Route('pelajar.cari')}}">Carian</a></li>
        {{-- <li class="breadcrumb-item"><a href="{{Route('pelajar.getlist', $kpPelajar)}}">Senarai Carian</a></li> --}}
        <li class="breadcrumb-item active" aria-current="page">Maklumat Waris</li>
    </ol>
</nav>
<div class="row">
    <div class="col-lg-8 col-xl-8">
        <div class="card-box text-center">
            {{-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image"> --}}
            {{-- <img src="{{ asset('/storage/'.auth()->user()->ImageFile) }}" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image"> --}}

            {{-- <h4 class="mb-0">{{$waris->Nama_Waris}}</h4>
            <p class="text-muted">apa2 berkaitan</p> --}}

            {{-- <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button> --}}
            {{-- <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button> --}}

            {{-- <div class="text-left mt-3">
                <h4 class="font-13 text-uppercase">Tentang Saya</h4>
                <p class="text-muted font-13 mb-3">
                    Apa2 berkaitan
                </p> --}}
                {{-- <p class="text-muted mb-2 font-13"><strong>Nama</strong> <span class="ml-2">{{$nama->Nama}}</span></p> --}}

                {{-- <p class="text-muted mb-2 font-13"><strong>Kad Pengenalan</strong> <span class="ml-2 ">{{$pelajar->no_kp}}</span></p>
                <p class="text-muted mb-1 font-13"><strong>Passport</strong> <span class="ml-2">{{$pelajar->NoPassport}}</span></p> --}}
            {{-- </div> --}}

            {{-- <ul class="social-list list-inline mt-3 mb-0">
                <li class="list-inline-item">
                    <a href="javascript: void(0);" class="social-list-item border-purple text-purple"><i class="fab fa-facebook"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="fab fa-git"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="fab fa-github"></i></a>
                </li>
            </ul> --}}
            <div class="col-lg-8 col-xl-8">
                <div class="card-box">
                    <ul class="nav nav-pills navtab-bg">
                        <li class="nav-item">
                            <a href="#about-me" data-toggle="tab" aria-expanded="true" class="nav-link ml-0 active">
                                <i class="mdi mdi-face-profile mr-1"></i>Maklumat Waris
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="mdi mdi-settings-outline mr-1"></i>Kemaskini
                            </a>
                        </li>
                    </ul>
        
                    <div class="tab-content">
                        <div class="tab-pane show active" id="about-me">
                            {{-- <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i>Maklumat Waris</h5> --}}
                            <h5 class="mb-3 text-uppercase bg-light p-1"><i class="mdi mdi-account-circle mr-1"></i>Maklumat Waris</h5>
        
                            <ul class="list-unstyled timeline-sm">
                                <li class="timeline-sm-item">
                                    <p class="text-muted mb-2 font-13" style="text-align:left"><strong>Nombor Kad Pengenalan</strong> <span class="ml-2">{{$waris->no_kp_Waris}}</span></p>
                                    <p class="text-muted mb-2 font-13" style="text-align:left"><strong>Alamat</strong> <span class="ml-2">{{$waris->Alamat_Waris}}</span></p>
                                    <p class="text-muted mb-2 font-13" style="text-align:left"><strong>Bandar</strong> <span class="ml-2">{{$waris->Bandar_Waris}}</span></p>
                                    <p class="text-muted mb-2 font-13" style="text-align:left"><strong>Negeri</strong> <span class="ml-2">{{$negeriWaris->NamaNegeri}}</span></p>
                                    <p class="text-muted mb-2 font-13" style="text-align:left"><strong>Poskod</strong> <span class="ml-2">{{$waris->Poskod_Waris}}</span></p>
                                    <p class="text-muted mb-2 font-13" style="text-align:left"><strong>Negara</strong> <span class="ml-2">{{$negara->Keterangan}}</span></p>
                                    <p class="text-muted mb-2 font-13" style="text-align:left"><strong>Nombor Tel Waris</strong> <span class="ml-2">{{$waris->NoTel_Waris}}</span></p>
                                    <p class="text-muted mb-2 font-13" style="text-align:left"><strong>Hubungan</strong> <span class="ml-2">{{$hubungan->Keterangan}}</span></p>
                                    <p class="text-muted mb-2 font-13" style="text-align:left"><strong>Status</strong> <span class="ml-2">{{$waris->Status}}</span></p>
                                </li>
                            </ul>
                            <ul class="list-unstyled timeline-sm center">
                                <li class="timeline-sm-item">
                                    <a href="{{Route('pelajar.getlist', $kpPelajar)}}" class="btn btn-secondary">Kembali</a>
                                </li>
                            </ul>
                        </div>
                        <!-- end timeline content-->
        
                        <div class="tab-pane" id="settings">
                            <form method="POST" action="{{Route('warisPelajar.kemaskini', ['id'=>$tableWaris->Id, 'kp'=>$kpPelajar, 'kpWaris'=>$waris->no_kp_Waris])}}" enctype="multipart/form-data">
                            @csrf
                                {{-- <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i>Maklumat Diri</h5> --}}
                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i>Kemaskini Maklumat Waris Pelajar</h5>
        
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            {{-- <label for="userbio">Alamat</label> --}}
                                            <p class="text-muted mb-2 font-13" style="text-align:left"><strong>Alamat</strong></p>
                                            {{-- <textarea class="form-control" name="alamat" rows="4" placeholder="Masukkan alamat surat menyurat..."></textarea> --}}
                                            <textarea class="form-control" name="alamat" placeholder="Sila masukkan alamat surat menyurat..."></textarea>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
        
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {{-- <label for="useremail">Poskod</label> --}}
                                            <p class="text-muted mb-2 font-13" style="text-align:left"><strong>Poskod</strong></p>
                                            <input type="text" class="form-control" name="poskod" placeholder="Masukkan poskod alamat surat menyurat...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {{-- <label for="userpassword">Bandar</label> --}}
                                            <p class="text-muted mb-2 font-13" style="text-align:left"><strong>Bandar</strong></p>
                                            <input type="text" class="form-control" name="bandar" placeholder="Masukkan bandar alamat surat menyurat...">
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
        
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {{-- <label>Negeri</label> --}}
                                            <p class="text-muted mb-2 font-13" style="text-align:left"><strong>Negeri</strong></p>
                                            {{-- <input type="text" class="form-control" name="negeri" placeholder="Masukkan negeri alamat surat menyurat..."> --}}
                                            <select class="form-control negeri" name="negeri">
                                                    <option selected></option>
                                                @foreach($negeriDropdown as $negeriDropdown)
                                                    <option value="{{$negeriDropdown->Kod_Negeri}}">{{$negeriDropdown->NamaNegeri}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {{-- <label>Negara</label> --}}
                                            <p class="text-muted mb-2 font-13" style="text-align:left"><strong>Negara</strong></p>
                                            {{-- <input type="text" class="form-control" name="negara" placeholder="Masukkan negara alamat surat menyurat..."> --}}
                                            <select class="form-control negara" name="negara">
                                                <option disabled>Sila Pilih Negeri</option>
                                            </select>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
        
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {{-- <label>Hubungan</label> --}}
                                            <p class="text-muted mb-2 font-13" style="text-align:left"><strong>Hubungan</strong></p>
                                            <select class="form-control" name="hubungan">
                                                <option></option>
                                                @foreach($hubunganWarisDropdown as $hubungan)
                                                    <option value="{{$hubungan->Kod_Hubungan}}">{{$hubungan->Keterangan}}</option>
                                                @endforeach
                                            </select>
                                            {{-- <input type="text" class="form-control" name="hubungan" placeholder="Masukkan hubungan waris..."> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {{-- <label>Nombor Telefon</label> --}}
                                            <p class="text-muted mb-2 font-13" style="text-align:left"><strong>Nombor Telefon</strong></p>
                                            <input type="text" class="form-control" name="telefon" placeholder="Masukkan nombor telefon waris...">
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                <div class="row">
                                    <div class="col-8">
                                        <a href="{{Route('pelajar.getlist', $kpPelajar)}}" class="btn btn-secondary waves-effect waves-light mt-2">Kembali</a>
                                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end settings content-->
        
                    </div> <!-- end tab-content -->
                </div> <!-- end card-box-->
        
            </div> <!-- end col -->
        </div> <!-- end card-box -->

        {{-- <div class="card-box">
            <h4 class="header-title">Skills</h4>
            <p class="mb-3">Everyone realizes why a new common language would be desirable</p>

            <div class="pt-1">
                <h6 class="text-uppercase mt-0">HTML5 <span class="float-right">90%</span></h6>
                <div class="progress progress-sm m-0">
                    <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                        <span class="sr-only">90% Complete</span>
                    </div>
                </div>
            </div>

            <div class="mt-2 pt-1">
                <h6 class="text-uppercase">PHP <span class="float-right">67%</span></h6>
                <div class="progress progress-sm m-0">
                    <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="width: 67%">
                        <span class="sr-only">67% Complete</span>
                    </div>
                </div>
            </div>

            <div class="mt-2 pt-1">
                <h6 class="text-uppercase">WordPress <span class="float-right">48%</span></h6>
                <div class="progress progress-sm m-0">
                    <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: 48%">
                        <span class="sr-only">48% Complete</span>
                    </div>
                </div>
            </div>

            <div class="mt-2 pt-1">
                <h6 class="text-uppercase">Laravel <span class="float-right">95%</span></h6>
                <div class="progress progress-sm m-0">
                    <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                        <span class="sr-only">95% Complete</span>
                    </div>
                </div>
            </div>

            <div class="mt-2 pt-1">
                <h6 class="text-uppercase">ReactJs <span class="float-right">72%</span></h6>
                <div class="progress progress-sm m-0">
                    <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%">
                        <span class="sr-only">72% Complete</span>
                    </div>
                </div>
            </div>

        </div> <!-- end card-box--> --}}

    </div> <!-- end col-->

    
</div>
{{-- </div> --}}

<script>
    $('.negeri').on('change', function()
    {
        var kodNegeri = $('.negeri').val();
        // console.log(kodNegeri);
        $('.negara').empty();
        if(kodNegeri == 00 || kodNegeri == 98 || kodNegeri == 99)
        {
            $.get('{{Route("peribadiPelajar.populateKodNegara")}}', {'kodNegeri':kodNegeri}, function(list)
            {
                $.each(list.kodNegara, function()
                {
                    var kod=this.Kod_Negara;
                    var negara=this.Keterangan;
                    var option = '<option value="'+kod+'">'+negara+'</option>';
                    $('.negara').append(option);
                });
            });
        }
        else
        {
            var option = '<option value="MYS">MALAYSIA</option>';
            $('.negara').append(option);
        }
    });
</script>

@endsection