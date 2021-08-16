@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Papar Bangsa</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-flag-checkered"></i></div><a href="{{route('admin-bangsa:index')}}">Bangsa</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div>Papar Bangsa</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Bangsa Show') }}</div>                

                    <div class="card-body">
                            <div class="form-group">
                                <label>Kod</label>
                                <input type="text" name="kod" class="form-control" value="{{$bangsa->kod_bangsa}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Bangsa</label>
                                <input type="text" name="nama" class="form-control" value="{{$bangsa->keterangan}}" readonly>
                            </div>
                            <div class="form-group">
                                <a href="{{route('admin-bangsa:index')}}" class="btn btn-secondary">Kembali</a>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection