@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Papar Waris</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><a href="{{route('admin-penggunaPelajar:cariPelajarKp-get', $no_kp)}}">Waris</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div>Papar Waris</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Maklumat Penuh Waris') }}</div>                

                    <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-2">
                                        <label>No Kad Pengenalan</label>
                                        <input type="text" class="form-control" value="{{$waris->no_kp}}" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" value="{{$waris->nama}}" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label>No Telefon</label>
                                        <input type="text" class="form-control" value="{{$waris->no_tel}}" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label>Hubungan</label>
                                        <input type="text" class="form-control" value="{{$waris->hubungan->keterangan}}" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label>Alamat</label>
                                        <textarea class="form-control" readonly>{{$waris->alamat}}</textarea>                                      
                                    </div>
                                    <div class="col-2">
                                        <label>Bandar</label>
                                        <input class="form-control" value="{{$waris->bandar}}" readonly>                                     
                                    </div>
                                    <div class="col-2">
                                        <label>Poskod</label>
                                        <input class="form-control" value="{{$waris->poskod}}  " readonly>                                   
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="{{route('admin-penggunaPelajar:cariPelajarKp-get', $no_kp)}}" class="btn btn-secondary">Kembali</a>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection