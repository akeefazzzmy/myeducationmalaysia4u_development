@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Kemaskini Agama</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-praying-hands"></i></div><a href="{{route('admin-agama:index')}}">Agama</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-edit"></i></div>Kemaskini Agama</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Agama Edit') }}</div>                

                    <div class="card-body">
                        <form method="POST">@csrf
                            <div class="form-group">
                                <label>Kod</label>
                                <input type="text" name="kod" class="form-control" value="{{$agama->kod_agama}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Agama</label>
                                <input type="text" name="nama" class="form-control" value="{{$agama->keterangan}}">
                            </div>

                            <div class="form-group">
                                <a href="{{route('admin-agama:index')}}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-success">Kemaskini</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection