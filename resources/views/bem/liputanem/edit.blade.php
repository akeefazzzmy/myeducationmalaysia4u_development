@extends('layouts.bem.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Kemaskini Liputan Education Malaysia</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-globe"></i></div><a href="{{route('bem-liputanEm:index')}}">Senarai Liputan Education Malaysia</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-edit"></i></div>Kemaskini Liputan Education Malaysia</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Liputan EM Edit') }}</div>                

                    <div class="card-body">
                        <form method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Negara</label>
                                {{-- <input type="text" name="negara" class="form-control" value="{{$liputan->negara_id}}" hidden> --}}
                                {{-- <input class="form-control" value="{{$liputan->negara->keterangan}}" readonly> --}}
                            </div>
                            <div class="form-group">
                                <label>EM</label>
                                {{-- <input type="text" name="em" class="form-control" value="{{$liputan->em_id}}"> --}}
                                <select class="form-control" name="em">
                                    @foreach($senaraiEm as $em)
                                        <option value="{{$em->id}}">{{$em->kod_em}} : {{$em->keterangan}}</option>
                                    @endforeach
                                <select>
                            </div>

                            <div class="form-group">
                                <a href="{{route('bem-liputanEm:index')}}" class="btn btn-secondary">Kembali</a>
                            </div>
                            <div class="form-group">
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