@extends('layouts.em.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Papar Negara</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-flag"></i></div><a href="{{route('em-negara:index')}}">Negara</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div>Papar Negara</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Kod') }} : {{$negara->kod_negara}}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                {{-- <div class="col-2">
                                    <label>Kod</label>
                                    <input type="text" name="kod" class="form-control" value="{{$negara->kod_negara}}" readonly>
                                </div> --}}
                                <div class="col-4">
                                    <label>Negara</label>
                                    <input type="text" name="nama" class="form-control" value="{{$negara->keterangan}}" readonly>
                                </div>
                                <div class="col-2">
                                    <label>Tarikh Diwujudkan</label>
                                    <input class="form-control" value="{{$negara->created_at->format('d/m/Y')}}" readonly>
                                </div>
                                <div class="col-2">
                                    <label>Tarikh Dikemaskini</label>
                                    <input class="form-control" value="{{$negara->updated_at->format('d/m/Y')}}" readonly>
                                </div>
                                <div class="col-2">
                                    <label>Diwujudkan Oleh</label>
                                    <input class="form-control" value="{{$negara->no_kp_wujud}}" readonly>
                                </div>
                                <div class="col-2">
                                    <label>Dikemaskini Oleh</label>
                                    <input class="form-control" value="{{$negara->no_kp_kemaskini}}" readonly>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <a href="{{route('em-negara:index')}}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection