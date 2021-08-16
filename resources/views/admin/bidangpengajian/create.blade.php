@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Daftar Bidang Pengajian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-book"></i></div><a href="{{route('admin-bidangpengajian:index')}}">Bidang Pengajian</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-plus-circle"></i></div>Daftar Bidang Pengajian</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Bidang Pengajian') }}</div>                

                    <div class="card-body">
                        <form action="{{route('admin-bidangpengajian:store')}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-2">
                                        <label>Kod Bidang</label>
                                        <input type="text" name="kod" class="form-control">
                                    </div>
                                    <div class="col-10">
                                        <label>Nama Bidang</label>
                                        <input type="text" name="nama" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Broad Field</label>
                                        <input type="text" name="broad" class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label>Narrow Field</label>
                                        <input type="text" name="narrow" class="form-control">
                                    </div>
                                </div>
                            </div>                       
                            <div class="form-group">
                                <a href="{{route('admin-bidangpengajian:index')}}" class="btn btn-secondary">Kembali</a>
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