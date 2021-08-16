@extends('std.layouts.main')

@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Maklumat Waris Saya</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Maklumat</li>
        <li class="breadcrumb-item active">Butiran Waris</li>
    </ol>
    <div class="row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                   {{--  @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        @if (session('warning'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('warning') }}
                        </div>
                    @endif
            <div class="card">
                <div class="card-header">
                    {{ __('Maklumat Waris Saya') }}
                    <div class="float-right">
                        {{-- <a href="{{ route('admin.create') }}" class="btn btn-info"> + Tambah Pengguna Baru</a> --}}
                        <a href="{{route('std-waris-show2')}}" title="Tambah Waris"><i class="fas fa-plus-circle fa-lg" style="color:blue"></i></a>
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
                {{-- <div class="col text-center">

                        <a href="{{ route('std-waris-show')}}" class="btn btn-primary"> Isi Maklumat Waris </a>

                </div> --}}

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Bil</th>
                            <th>Nama Waris</th>
                            <th>No Kad Pengenalan Waris</th>
                            <th>Hubungan</th>
                            <th>No Telefon</th>
                            <th>Tindakan</th>
                        </tr>
                  @foreach($senaraiwaris as $key=>$waris)
                        @if($waris->no_kp_Waris == "")
                            <tr align="center">
                                  <td colspan="5"><b>Tiada Maklumat Waris</b></td>
                            </tr>
                           {{--  <tr align="center">
                                <td colspan="5"><a href="{{ route('std-waris-show')}}" class="btn btn-primary"> Isi Maklumat Waris </a>
                                </td>
                          </tr> --}}
                        @else
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $waris->Nama_Waris }}</td>
                                <td>{{ $waris->no_kp_Waris }}</td>
                                <td>{{ $waris->hubungan->Keterangan }}</td>
                                <td>{{ $waris->NoTel_Waris }}</td>
                                <td>
                                    {{-- <a href="{{ route('std-waris-show3',$waris->Id)}}" class="btn btn-primary">Lihat</a> coding asal--}}
                                    
                                    <a href="{{ route('std-waris-show3',$waris->Id) }}" title="Lihat Maklumat Pengguna"><i class="fas fa-eye fa-lg"></i></a>
                                    {{-- <i class="fas fa-pencil fa-lg" style="color:red"></i> --}}
                                    <i class="fas fa-pencil-alt fa-lg" style="color:grey"></i>
                                    <i class="fas fa-trash fa-lg" style="color:red"></i>
                                    </td>
                            </tr>

                          @endif

                @endforeach
                 </table>
                {{-- @foreach($senaraiwaris as $waris) --}}
                @if($waris->no_kp_Waris <> "")
                <center>
                     <a href="{{ route('std-waris-show2')}}" class="btn btn-primary"> Tambah Maklumat Waris </a>
                </center>
              @else
              <center>
                   <a href="{{ route('std-waris-show')}}" class="btn btn-primary"> Isi Maklumat Waris </a>
                </center>
            @endif
        {{-- @endforeach --}}
                </div>
            </div>
        </div>



    </div>
    @endsection
