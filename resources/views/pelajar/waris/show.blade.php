@extends('layouts.pelajar.main')
@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Papar Waris</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Maklumat</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-users" aria-hidden="true"></i></div><a href="{{route('pelajar-waris:index')}}">Butiran Waris</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div>Papar Waris</li>
    </ol>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Papar Waris') }}</div>                

                <div class="card-body">
                        <div class="form-group">
                            <label>Hubungan</label>
                            <input type="text" name="hubungan" class="form-control" value="{{$waris->hubungan->keterangan}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nombor Kad Pengenalan</label>
                            <input type="text" name="no_kp" class="form-control" value="{{$waris->no_kp}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{$waris->nama}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Alamat Rumah</label>
                            <input type="text" name="alamat" class="form-control" value="{{$waris->alamat}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Bandar</label>
                            <input type="text" name="bandar" class="form-control" value="{{$waris->bandar}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Poskod</label>
                            <input type="text" name="poskod" class="form-control" value="{{$waris->poskod}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nombor Telefon</label>
                            <input type="text" name="no_tel" class="form-control" value="{{$waris->no_tel}}" readonly>
                        </div>
                        <div class="form-group">
                            <a href="{{route('pelajar-waris:index')}}" class="btn btn-secondary">Kembali</a>
                        </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection