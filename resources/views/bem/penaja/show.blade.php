@extends('layouts.bem.main')
@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Papar Penaja</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-donate"></i></div><a href="{{route('bem-penaja:index')}}">Senarai Penaja</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div>Papar Penaja</li>
    </ol>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Papar Penaja') }}</div>                

                <div class="card-body">
                        <div class="form-group">
                            <label>Kod Penaja</label>
                            <input type="text" name="kod" class="form-control" value="{{$penaja->kod_penaja}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Singkatan Penaja</label>
                            <input type="text" name="singkatan" class="form-control" value="{{$penaja->singkatan}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Penuh Penaja</label>
                            <input type="text" name="nama" class="form-control" value="{{$penaja->keterangan}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tarikh Dicipta</label>
                            <input type="text" name="created_at" class="form-control" value="{{$penaja->created_at}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tarikh Kemaskini</label>
                            <input type="text" name="updated_at" class="form-control" value="{{$penaja->updated_at}}" readonly>
                        </div>
                        <div class="form-group">
                            <a href="{{route('bem-penaja:index')}}" class="btn btn-secondary">Kembali</a>
                        </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection