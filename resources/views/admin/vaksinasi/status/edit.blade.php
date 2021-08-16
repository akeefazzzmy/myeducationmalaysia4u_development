@extends('layouts.admin.main')

@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Kemaskini Status Vaksinasi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-syringe"></i></div><a href="{{route('admin-vaksinasi:index')}}">Vaksinasi</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-edit"></i></div>Kemaskini Status Vaksinasi</li>
    </ol>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Status Vaksinasi') }} : {{$statusVaksinasi->keterangan}}</div> --}}

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label>Status Vaksinasi</label>
                                        <input class="form-control" value="{{$statusVaksinasi->keterangan}}" readonly>
                                    </div>

                                    <div class="col-4">
                                        <label>Status Vaksinasi</label>
                                        <input type="text" name="status" class="form-control" value="{{$statusVaksinasi->keterangan}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <a href="{{route('admin-vaksinasi:index')}}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-success">Kemaskini</button><br>
                                <label>Tarikh : {{date('d/m/Y')}}</label>
                            </div>                        
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection