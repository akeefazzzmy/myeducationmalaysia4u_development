@extends('layouts.bem.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Papar Hubungan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-child"></i></div><a href="{{route('bem-hubungan:index')}}">Hubungan</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div>Papar Hubungan</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Hubungan Show') }}</div>                

                    <div class="card-body">
                            <div class="form-group">
                                <label>Kod</label>
                                <input type="text" name="kod" class="form-control" value="{{$hubungan->kod_hubungan}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Hubungan</label>
                                <input type="text" name="nama" class="form-control" value="{{$hubungan->keterangan}}" readonly>
                            </div>
                            <div class="form-group">
                                <a href="{{route('bem-hubungan:index')}}" class="btn btn-secondary">Kembali</a>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection