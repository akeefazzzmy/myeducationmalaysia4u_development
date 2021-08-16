@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Papar Program Pengajian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-certificate"></i></div><a href="{{route('admin-programpengajian:index')}}">Senarai Program Pengajian</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div>Papar Program Pengajian</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Program Pengajian Show') }}</div>                

                    <div class="card-body">
                            <div class="form-group">
                                <label>Kod</label>
                                <input type="text" name="kod" class="form-control" value="{{$programpengajian->kod_program_pengajian}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Program Pengajian</label>
                                <input type="text" name="nama" class="form-control" value="{{$programpengajian->keterangan}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tahap Pengajian</label>
                                <input type="text" name="tahapPengajian" class="form-control" value="{{$programpengajian->tahap_pengajian->keterangan}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Institusi</label>
                                <input type="text" name="institusi" class="form-control" value="{{$programpengajian->institusi->keterangan}}" readonly>
                            </div>
                            <div class="form-group">
                                <a href="{{route('admin-programpengajian:index')}}" class="btn btn-secondary">Kembali</a>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection