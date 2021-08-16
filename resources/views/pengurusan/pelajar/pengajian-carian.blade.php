@extends('admin.layouts.main')

@section('body')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" /> --}}
{{-- <link href="{{ asset('themes/css/styles.css') }}" rel="stylesheet" /> --}}
{{-- <div class="container"> --}}
{{-- Design https://www.bootdey.com/snippets/view/about-me-profile --}}
<h1 class="mt-4">Carian Pelajar</h1>
<nav aria-label="breadcrumb" class="main-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{Route('pelajar.cari')}}">Carian</a></li>
        <li class="breadcrumb-item"><a href="{{Route('pelajar.getlist', $kp)}}">Senarai Carian</a></li>
        <li class="breadcrumb-item active" aria-current="page">Maklumat Pengajian Pelajar</li>
    </ol>
</nav>
<div class="row">
    <div class="col-lg-4 col-xl-4">
        <div class="card-box text-center">
            {{-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image"> --}}
            {{-- <img src="{{ asset('/storage/'.auth()->user()->ImageFile) }}" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image"> --}}

            {{-- <h4 class="mb-0">{{$waris->Nama_Waris}}</h4> --}}
            <p class="text-muted">apa2 berkaitan</p>

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

    <div class="col-lg-8 col-xl-8">
        <div class="card-box">
            <ul class="nav nav-pills navtab-bg">
                <li class="nav-item">
                    <a href="#about-me" data-toggle="tab" aria-expanded="true" class="nav-link ml-0 active">
                        <i class="mdi mdi-face-profile mr-1"></i>Maklumat Pengajian Pelajar
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
                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i>Maklumat Pengajian Pelajar</h5>

                    <ul class="list-unstyled timeline-sm">
                        <li class="timeline-sm-item">
                            <p class="text-muted mb-2 font-13"><strong>Peringkat</strong><span class="ml-2">{{$peringkatPengajian->NamaPeringkat}}</span></p>
                            <p class="text-muted mb-2 font-13"><strong>Program</strong><span class="ml-2">{{$programPengajian->NamaProgram}}</span></p>
                            <p class="text-muted mb-2 font-13"><strong>Bidang</strong><span class="ml-2">{{$bidangPengajian->NamaBidang}}</span></p>
                            <p class="text-muted mb-2 font-13"><strong>Institusi</strong><span class="ml-2">{{$institusiPengajian->NamaInstitusi}}</span></p>
                            <p class="text-muted mb-2 font-13"><strong>Tarikh Mula</strong><span class="ml-2">{{$pengajian->TarikhMula}}</span></p>
                            <p class="text-muted mb-2 font-13"><strong>Tarikh Tamat</strong><span class="ml-2">{{$pengajian->TarikhTamat}}</span></p>
                            <p class="text-muted mb-2 font-13"><strong><i>State</i></strong><span class="ml-2">{{$statePengajian->NamaState}}</span></p>
                            <p class="text-muted mb-2 font-13"><strong>Negara</strong><span class="ml-2">{{$negaraPengajian->Keterangan}}</span></p>
                            <p class="text-muted mb-2 font-13"><strong>Penaja</strong><span class="ml-2">{{$penajaPengajian->NamaPenaja}}</span></p>
                            <p class="text-muted mb-2 font-13"><strong>Status Pengajian</strong><span class="ml-2">{{$statusPengajian->Keterangan}}</span></p>
                        </li>
                    </ul>
                    <ul class="list-unstyled timeline-sm center">
                        <li class="timeline-sm-item">
                            <a href="{{Route('pelajar.getlist', $kp)}}" class="btn btn-secondary">Kembali</a>
                        </li>
                    </ul>
                </div>
                <!-- end timeline content-->

                <div class="tab-pane" id="settings">
                    <form method="POST" action="#" enctype="multipart/form-data">
                    @csrf
                        {{-- <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i>Maklumat Diri</h5> --}}
                        <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i>Kemaskini Maklumat Pengajian Pelajar</h5>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Peringkat</label>
                                    {{-- <input type="text" class="form-control" name="poskod" placeholder="Masukkan poskod alamat surat menyurat..."> --}}
                                    <select class="form-control">
                                            <option selected></option>
                                        @foreach($dropdownPeringkat as $peringkat)
                                            <option>{{$peringkat->NamaPeringkat}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Program</label>
                                    {{-- <input type="text" class="form-control" name="bandar" placeholder="Masukkan bandar alamat surat menyurat..."> --}}
                                    <select class="form-control">
                                        <option></option>
                                    </select>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bidang</label>
                                    {{-- <input type="text" class="form-control" name="poskod" placeholder="Masukkan poskod alamat surat menyurat..."> --}}
                                    <select class="form-control">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Institusi</label>
                                    {{-- <input type="text" class="form-control" name="bandar" placeholder="Masukkan bandar alamat surat menyurat..."> --}}
                                    <select class="form-control">
                                            <option selected></option>
                                        @foreach($dropdownInstitusi as $institusi)
                                            <option>{{$institusi->NamaInstitusi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Negeri</label>
                                    <select class="form-control negeri" name="negeri">
                                            <option selected></option>
                                        @foreach($dropdownNegeri as $negeri)
                                            <option value="{{$negeri->Kod_Negeri}}">{{$negeri->NamaNegeri}}</option>   
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Negara</label>
                                    {{-- <input type="text" class="form-control" name="negara" placeholder="Masukkan negara alamat surat menyurat..."> --}}
                                    <select class="form-control negara" name="negara">
                                        <option selected></option>
                                        <option>Sila Pilih Negeri</option>
                                    </select>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-8">
                                <a href="{{Route('pelajar.getlist', $kp)}}" class="btn btn-secondary waves-effect waves-light mt-2">Kembali</a>
                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end settings content-->

            </div> <!-- end tab-content -->
        </div> <!-- end card-box-->

    </div> <!-- end col -->
</div>
{{-- </div> --}}

<script>
    $('.negeri').on('change', function()
    {
        $('.negara').empty();

        var negeri = $('.negeri').val();
        // console.log(negeri);
        if(negeri == 00 || negeri == 98 || negeri == 99)
        {
            // console.log('bukan Malaysia');
            $.get( '{{Route("pengajianPelajar.populateKodNegara")}}', {'kodNegeri':negeri}, function(list)
            {
                // console.log(list.kodNegara);
                $.each(list.kodNegara, function()
                {
                    var kod = this.Kod_Negara;
                    var namaNegara = this.Keterangan;

                    var option = '<option value="'+kod+'">'+namaNegara+'</option>';
                    $('.negara').append(option);
                });
            });
        }
        else
        {
            // console.log('Malaysia');
            var option = '<option value="MYS">MALAYSIA</option>';
            $('.negara').append(option);
        }
    });
</script>

@endsection