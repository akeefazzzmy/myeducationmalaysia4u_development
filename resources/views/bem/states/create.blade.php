@extends('layouts.bem.main')

@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Daftar <i>States</i></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-city"></i></div><a href="{{route('bem-states:index')}}"><i>States</i></a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-plus-circle"></i></div>Daftar <i>States</i></li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Daftar') }} <i>{{ __('States') }}</i></div>                

                    <div class="card-body">
                        <form action="{{route('bem-states:store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- <div class="form-group">
                                <label>Kod em</label>
                                <input type="text" name="kod_em" class="form-control">
                            </div> --}}
                            <div class="form-group">
                                <label>Negara</label>
                                {{-- <input type="text" name="negara" class="form-control"> --}}
                                <select name="negara" class="form-control">
                                    <option selected disabled>--Sila Pilih Negara--</option>
                                    @foreach($senaraiNegara as $key => $negara)
                                        <option value="{{$negara->id}}">{{$negara->keterangan}}</option>
                                    @endforeach                                
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kod States</label>
                                <input type="text" name="kod" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>States</label>
                                <input type="text" name="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Negara</label>
                                {{-- <input type="text" name="negara" class="form-control"> --}}
                                <select name="negara" class="form-control">
                                    @foreach($senaraiNegara as $key => $negara)
                                        <option value="{{$negara->id}}">{{$negara->keterangan}}</option>
                                    @endforeach                                
                                </select>
                            </div>
                            <div class="form-group">
                                <a href="{{route('bem-states:index')}}" class="btn btn-secondary">Kembali</a>
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