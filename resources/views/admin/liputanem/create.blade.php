@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Daftar Liputan Education Malaysia</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-globe"></i></div><a href="{{route('admin-liputanEm:index')}}">Senarai Liputan Education Malaysia</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-plus-circle"></i></div>Daftar Liputan Education Malaysia</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Liputan EM') }}</div>                

                    <div class="card-body">
                        <form action="{{route('admin-liputanEm:store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- <div class="form-group">
                                <label>Kod em</label>
                                <input type="text" name="kod_em" class="form-control">
                            </div> --}}
                            <div class="form-group">
                                <label>EM</label>
                                {{-- <input type="text" name="em" class="form-control"> --}}
                                <select class="form-control" name="em">
                                    @foreach($senaraiEm as $em)
                                        <option value="{{$em->id}}">{{$em->kod_em}} : {{$em->keterangan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Negara</label>
                                {{-- <input type="text" name="negara" class="form-control"> --}}
                                <select class="form-control" name="negara">
                                    @foreach($senaraiNegara as $negara)
                                        <option value="{{$negara->id}}">{{$negara->kod_negara}} : {{$negara->keterangan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <a href="{{route('admin-liputanEm:index')}}" class="btn btn-secondary">Kembali</a>
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