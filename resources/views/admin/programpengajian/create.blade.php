@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Daftar Institusi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-certificate"></i></div><a href="{{route('admin-programpengajian:index')}}">Program Pengajian</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-plus-circle"></i></div>Daftar Program Pengajian</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Program Pengajian') }}</div>                

                    <div class="card-body">
                        <form action="{{route('admin-programpengajian:store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Kod</label>
                                <input type="text" name="kod" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama Program</label>
                                <input type="text" name="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Bidang</label>
                                <select name="bidang" class="form-control">
                                    @foreach($senaraiBidang as $key => $bidang)
                                    <option value="{{$bidang->id}}">{{$bidang->nama_bidang}} || {{$bidang->broad_field}} || {{$bidang->narrow_field}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tahap Pengajian</label>
                                <select name="tahapPengajian" class="form-control">
                                    @foreach($tahapPengajian as $tahap)
                                    <option value="{{$tahap->id}}">{{$tahap->keterangan}}</option>
                                    @endforeach
                                </select>
                            </div>      
                            <div class="form-group">
                                <label>Institusi</label>
                                <select name="institusi" class="form-control">
                                    @foreach($senaraiInstitusi as $institusi)
                                    <option value="{{$institusi->id}}">{{$institusi->keterangan}}</option>
                                    @endforeach
                                </select>
                            </div>                   
                            <div class="form-group">
                                <a href="{{route('admin-programpengajian:index')}}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection