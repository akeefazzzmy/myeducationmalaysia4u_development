@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Papar Liputan Education Malaysia</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-globe"></i></div><a href="{{route('admin-liputanEm:index')}}">Senarai Liputan Education Malaysia</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div>Papar Liputan Education Malaysia</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Liputan Education Malaysia Show') }}</div>                

                    <div class="card-body">
                            <div class="form-group">
                                <label>Education Malaysia</label>
                                <input type="text" name="kod" class="form-control" value="{{$liputan->em->keterangan}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Negara</label>
                                <input type="text" name="nama" class="form-control" value="{{$liputan->negara->keterangan}}" readonly>
                            </div>
                            <div class="form-group">
                                <a href="{{route('admin-liputanEm:index')}}" class="btn btn-secondary">Kembali</a>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection