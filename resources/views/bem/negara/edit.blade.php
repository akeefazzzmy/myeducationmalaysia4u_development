@extends('layouts.bem.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Kemaskini Negara</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-flag"></i></div><a href="{{route('bem-negara:index')}}">Negara</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-edit"></i></div>Kemaskini Negara</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Kod') }} : {{$negara->kod_negara}}</div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label>Negara : {{$negara->keterangan}}</label>
                                        <label>Dikemaskini Pada : {{$negara->updated_at->format('d/m/Y')}}</label>
                                        <label>Dikemaskini Oleh : {{$negara->no_kp_kemaskini}}</label>
                                    </div>

                                    <div class="col-4">
                                        <input type="text" name="kod" class="form-control" value="{{$negara->kod_negara}}" hidden>
                                        <label>Negara</label>
                                        <input type="text" name="nama" class="form-control" value="{{$negara->keterangan}}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <a href="{{route('bem-negara:index')}}" class="btn btn-secondary">Kembali</a>
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