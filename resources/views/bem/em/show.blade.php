@extends('layouts.bem.main')
@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Education Malaysia Show</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-map-marker"></i></div><a href="{{route('bem-em:index')}}">Education Malaysia</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div>Papar Education Malaysia</li>
    </ol>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Education Malaysia Show') }}</div>                

                <div class="card-body">
                        <div class="form-group">
                            <label>Kod</label>
                            <input type="text" name="kod" class="form-control" value="{{$em->kod_em}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{$em->keterangan}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Kod Negara Education Malaysia</label>
                            <input type="text" name="kodNegaraEM" class="form-control" value="{{$em->kod_negara_em}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tarikh Dicipta</label>
                            <input type="text" name="created_at" class="form-control" value="{{$em->created_at}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tarikh Kemaskini</label>
                            <input type="text" name="updated_at" class="form-control" value="{{$em->updated_at}}" readonly>
                        </div>
                        <div class="form-group">
                            <a href="{{route('bem-em:index')}}" class="btn btn-secondary">Kembali</a>
                        </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection