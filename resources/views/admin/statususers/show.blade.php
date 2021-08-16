@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Papar Status Pengguna</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-info-circle"></i></div><a href="{{route('admin-statusUsers:index')}}">Status Pengguna</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div>Papar Status Pengguna</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Status Pengguna Show') }}</div>                

                    <div class="card-body">
                            <div class="form-group">
                                <label>Kod</label>
                                <input type="text" name="kod" class="form-control" value="{{$status->kod_status}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" name="nama" class="form-control" value="{{$status->keterangan}}" readonly>
                            </div>
                            {{-- <div class="form-group">
                                <label>Tarikh Dicipta</label>
                                <input type="text" name="created_at" class="form-control" value="{{$status->created_at}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tarikh Kemaskini</label>
                                <input type="text" name="updated_at" class="form-control" value="{{$status->updated_at}}" readonly>
                            </div> --}}
                            <div class="form-group">
                                <a href="{{route('admin-statusUsers:index')}}" class="btn btn-secondary">Kembali</a>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection