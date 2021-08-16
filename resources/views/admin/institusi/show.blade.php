@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Papar Institusi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-university"></i></div><a href="{{route('admin-institusi:index')}}">Senarai Institusi</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div>Papar Institusi</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Institusi Show') }}</div>                

                    <div class="card-body">
                            <div class="form-group">
                                <label>Kod</label>
                                <input type="text" name="kod" class="form-control" value="{{$institusi->kod_institusi}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Institusi</label>
                                <input type="text" name="nama" class="form-control" value="{{$institusi->keterangan}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>States</label>
                                <input type="text" name="kodNegaraEM" class="form-control" value="{{$institusi->states->keterangan}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tarikh Dicipta</label>
                                <input type="text" name="created_at" class="form-control" value="{{$institusi->created_at}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tarikh Kemaskini</label>
                                <input type="text" name="updated_at" class="form-control" value="{{$institusi->updated_at}}" readonly>
                            </div>
                            <div class="form-group">
                                <a href="{{route('admin-institusi:index')}}" class="btn btn-secondary">Kembali</a>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection