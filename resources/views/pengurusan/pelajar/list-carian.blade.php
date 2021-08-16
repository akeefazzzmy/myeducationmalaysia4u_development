@extends('admin.layouts.main')

@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Carian Pelajar</h1>
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{Route('pelajar.cari')}}">Carian</a></li>
            <li class="breadcrumb-item">Senarai Carian</li>
        </ol>
    </nav>
    <div class="row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            <div class="card">
                <div class="card-header">{{ __('Maklumat Pelajar') }}</div>

                <div class="card-body">

                    <div class="card-header">{{ __('Maklumat Peribadi Pelajar') }}</div>

                    <div class="table-responsive">
                        <table class="table table-hover" id="detail_pelajar">
                            <thead>
                                <tr align="center">
                                    <th>Bil</th>
                                    <th>No Kad Pengenalan</th>
                                    <th>Nama</th>
                                    <th>No Telefon</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            
                            @if($detail_pelajar->no_kp == "")
                                <tr align="center">
                                      <td colspan="6"><b>Tiada Maklumat Pelajar</b></td>
                                </tr>
                            @else
                                <tr align="center">
                                    <td>1</td>
                                    <td>{{ $detail_pelajar->no_kp }}</td>
                                    <td>{{ $detail_pelajar->Nama }}</td>
                                    <td>{{ $detail_pelajar->NoTel }}</td>
                                    <td>
                                        {{-- <a href="{{Route('peribadiPelajar.lihat', $detail_pelajar->no_kp)}}" class="btn btn-primary">Lihat 1</a> coding asal--}}
                                        {{-- <a href="{{ route('peribadiPelajar.lihat', ['kp'=>$detail_pelajar->no_kp]) }}" title="Lihat Maklumat Peribadi Pelajar"><i class="fas fa-eye fa-lg"></i></a> --}}
                                        {{-- <a href="{{ route('state.lihat', $state)}}" class="btn btn-primary">Lihat</a> --}}
                                        <form action="{{Route('peribadiPelajar.lihat')}}" method="POST">@csrf
                                            <input name="kp" value="{{$detail_pelajar->no_kp}}" hidden>
                                            <button title="Lihat Maklumat Peribadi Pelajar" type="submit">
                                                <i class="fas fa-eye fa-lg" style="color:blue"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                     </table>
                    </div>
<br/>

<div class="card-header">{{ __('Maklumat Waris Pelajar') }}</div>

                    <div class="table-responsive">
                        <table class="table table-hover" id="waris_pelajar">
                            <tr>
                                <th>Bil</th>
                                <th>Nama Waris</th>
                                <th>No Kad Pengenalan Waris</th>
                                <th>Hubungan</th>
                                {{-- <th>No Telefon</th> --}}
                                <th>Tindakan</th>
                            </tr>
                         @if($waris_pelajar == "")
                                <tr align="center">
                                      <td colspan="5"><b>Tiada Maklumat Waris</b></td>
                                </tr>
                            @else
                             @foreach($waris_pelajar as $key=>$waris)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $waris->Nama_Waris }}</td>
                                    <td>{{ $waris->no_kp_Waris }}</td>
                                    <td>{{ $waris->hubungan->Keterangan }}</td>
                                    {{-- <td>{{ $waris->NoTel_Waris }}</td> --}}
                                    <td>
                                        {{-- <a href="{{Route('warisPelajar.lihat', ['kpWaris'=>$waris->no_kp_Waris, 'kp'=>$waris->no_kp])}}" class="btn btn-primary">Lihat 2</a> --}}
                                        {{-- <a href="{{Route('warisPelajar.lihat', ['kpWaris'=>$waris->no_kp_Waris, 'kp'=>$waris->no_kp])}}" title="Lihat Maklumat Waris Pelajar"><i class="fas fa-eye fa-lg"></i></a> --}}
                                        <form action="{{Route('warisPelajar.lihat')}}" method="POST">@csrf
                                            <input name="kpWaris" value="{{$waris->no_kp_Waris}}" hidden>
                                            <input name="kp" value="{{$waris->no_kp}}" hidden>
                                            <button title="Lihat Maklumat Waris Pelajar" type="submit">
                                                <i class="fas fa-eye fa-lg" style="color:blue"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                    @endforeach
                    @endif
                     </table>
                </div>

                <br/>

                <div class="card-header">{{ __('Maklumat Pengajian Pelajar') }}</div>

                <div class="table-responsive">
                    <table class="table table-hover" id="pengajian_pelajar">
                        <thead>
                        {{-- <tr align="center">
                            <th colspan="4">Maklumat Pengajian</th>
                            <th rowspan="2">Status</th>
                            <th rowspan="2">Tindakan</th>
                        </tr> --}}
                        <tr>
                            <th>Bil</th>
                            <th>Peringkat</th>
                            <th>Bidang</th>
                            <th>Program</th>
                            <th>Negara</th>
                            <th>Status</th>
                            <th>Tindakan</th>
                        </tr>
                        </thead>

                        @if($pengajian_pelajar == "")
                       <tr align="center">
                                  <td colspan="6"><b>Tiada Maklumat Pengajian</b></td>
                            </tr>
                        @else
                        @foreach($pengajian_pelajar as $key=>$pengajian)
                             <tr>
                                 <td>{{$key+1}}</td>
                                <td>{{ $pengajian->peringkat->NamaPeringkat }}</td>
                                <td>{{ $pengajian->bidang->NamaBidang }}</td>
                                <td>{{ $pengajian->program->NamaProgram }}</td>
                                <td>{{ $pengajian->negara->Keterangan }}</td>
                                <td>{{ $pengajian->statuspengajian->Keterangan }}</td>
                                <td>
                                    {{-- <a href="{{Route('pengajianPelajar.lihat', ['id'=>$pengajian->Id, 'kp'=>$pengajian->no_kp])}}" title="Lihat Maklumat Pengajian Pelajar"><i class="fas fa-eye fa-lg"></i></a> --}}
                                    <form action="{{Route('pengajianPelajar.lihat')}}" method="POST">@csrf
                                        <input name="id" value="{{$pengajian->Id}}" hidden>
                                        <input name="kp" value="{{$pengajian->no_kp}}" hidden>
                                        <button type="submit" title="Lihat Maklumat Pengajian Pelajar">
                                            <i class="fas fa-eye fa-lg" style="color:blue"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                       @endforeach
@endif

                 </table>

                </div>
            </div>
        </div>
    </div>
    @endsection
