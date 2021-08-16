@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Kemaskini Institusi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-university"></i></div><a href="{{route('admin-institusi:index')}}">Senarai Institusi</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-edit"></i></div>Kemaskini Institusi</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Institusi Edit') }}</div>                

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-2">
                                        <label>Kod Institusi</label>
                                    <input type="text" name="kod" class="form-control" value="{{$institusi->kod_institusi}}" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label>Nama Institusi</label>
                                        <input type="text" name="nama" class="form-control" value="{{$institusi->keterangan}}">
                                    </div>
                                </div>                              
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">                                      
                                        <a href="{{route('admin-institusi:index')}}" class="btn btn-secondary">Kembali</a>
                                        <button type="submit" class="btn btn-success">Kemaskini</button>                                      
                                    </div>
                                  </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection