@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Daftar Hubungan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-child"></i></div><a href="{{route('admin-hubungan:index')}}">Hubungan</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-plus-circle"></i></div>Daftar Hubungan</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Hubungan') }}</div>                

                    <div class="card-body">
                        <form action="{{route('admin-hubungan:store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">                        
                                <label>Kod</label>
                                <input type="text" name="kod" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Hubungan</label>
                                <input type="text" name="nama" class="form-control">
                            </div>                        
                            <div class="form-group">
                                <a href="{{route('admin-hubungan:index')}}" class="btn btn-secondary">Kembali</a>
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