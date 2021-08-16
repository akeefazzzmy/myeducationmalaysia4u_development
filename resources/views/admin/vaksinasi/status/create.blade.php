@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Daftar Status Vaksinasi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-syringe"></i></div><a href="{{route('admin-vaksinasi:index')}}">Vaksinasi</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-plus-circle"></i></div>Daftar Status Vaksinasi</li>
    </ol>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Status Vaksinasi') }}</div>
                    <div class="card-body">
                        <form action="{{route('admin-vaksinasi-status:store')}}" method="POST" enctype="multipart/form-data">@csrf
                            {{-- <div class="form-group">
                                <label>Kod em</label>
                                <input type="text" name="kod_em" class="form-control">
                            </div> --}}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label>Status Vaksin</label>
                                        <input type="text" name="statusVaksin" class="form-control">
                                    </div>
                                    <div class="col-2">
                                        <label>KP Pewujud</label>
                                        <input name="kpPewujud" value="{{auth()->user()->no_kp}}" class="form-control" readonly>
                                    </div>
                                    <div class="col-4">
                                        <label>Nama Pewujud</label>
                                        <input value="{{auth()->user()->name}} ({{auth()->user()->capaian->keterangan}})" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <label>Negara</label>
                                <input type="text" name="nama" class="form-control">
                            </div> --}}
                            <div class="form-group">
                                <a href="{{route('admin-vaksinasi:index')}}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Daftar</button><br>
                                {{-- <label>{{date('d/m/Y H:i:s')}}</label> --}}
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