@extends('std.layouts.main')

@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Maklumat Pengajian Saya</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Maklumat</li>
        <li class="breadcrumb-item active">Butiran Pengajian</li>
    </ol>
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
                <div class="card-header">
                    {{ __('Maklumat Pengajian Saya') }}
                    <div class="float-right">
                        <a href="{{ route('std-edu-show2')}}" title="Tambah Maklumat Pengajian"><i class="fas fa-plus-circle fa-lg" style="color:blue"></i></a>
                    </div>
                </div>

                <div class="card-body">

                <div class="form-group row">
                    <label for="no_kp" class="col-sm-1 col-form-label">NO KP</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="no_kp" placeholder="No Kad Pengenalan" value="{{ $user->no_kp }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Nama" class="col-sm-1 col-form-label">NAMA</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="Nama" placeholder="Nama" value="{{ $user->Nama }}" readonly>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover" id="id">
                        <thead>
                        {{-- <tr align="center">
                            <th colspan="4">Maklumat Pengajian</th>
                            <th rowspan="2">Status</th>
                            <th rowspan="2">Tindakan</th>
                        </tr> --}}
                        <tr class="form-control-xl">
                            <th>Bil</th>
                            <th>Peringkat</th>
                            <th>Bidang</th>
                            <th>Program</th>
                            <th>Negara</th>
                            <th>Status</th>
                            <th>Tarikh Mula</th>
                            <th>Tarikh Tamat</th>
                            <th>Tindakan</th>
                        </tr>
                        </thead>
                        @foreach($senaraipengajian as $key=>$edu)
                        @if($edu->Kod_Negara == "")
                            {{-- <tr align="center">
                                  <td colspan="12"><b>Tiada Maklumat Pengajian</b></td>
                            </tr> --}}
                           {{--  <tr align="center">
                                <td colspan="5"><a href="{{ route('std-waris-show')}}" class="btn btn-primary"> Isi Maklumat Waris </a>
                                </td>
                          </tr> --}}
                         @else
                            <tr class="form-control-sm">
                                <td>{{$key+1}}</td>
                                <td>{{ $edu->peringkat->NamaPeringkat }}</td>
                                <td>{{ $edu->bidang->NamaBidang }}</td>
                                <td>{{ $edu->program->NamaProgram }}</td>
                                <td>{{ $edu->negara->Keterangan }}</td>
                                <td>{{ $edu->statuspengajian->Keterangan }}</td>
                                <td>{{ $edu->TarikhMula }}</td>
                                <td>{{ $edu->TarikhTamat }}</td>
                                <td>
                                    {{-- <a href="{{ route('std-edu-show3',$edu->Id)}}" class="btn btn-primary">Lihat</a> Coding asal--}}
                                    <a href="{{ route('std-edu-show3',$edu->Id) }}" title="Lihat Maklumat Pengajian"><i class="fas fa-eye fa-lg"></i></a>
                                    {{-- <i class="fas fa-pencil fa-lg" style="color:red"></i> --}}
                                    <i class="fas fa-pencil-alt fa-lg" style="color:grey"></i>
                                    <i class="fas fa-trash fa-lg" style="color:red"></i>
                                </td>                                
                            </tr>

                          @endif
                          @endforeach
                 </table>

        {{--  @foreach($senaraipengajian as $edu) --}}
               @if($edu->Kod_Negara <> "")
                <center>
                     <a href="{{ route('std-edu-show2')}}" class="btn btn-primary"> Tambah Maklumat Pengajian </a>
                </center>
              @else
              <center>
                   <a href="{{ route('std-edu-show')}}" class="btn btn-primary"> Tambah Maklumat Pengajian </a>
                </center>
            @endif
     {{--     @endforeach --}}
                </div>
            </div>
        </div>
    </div>
    @endsection
