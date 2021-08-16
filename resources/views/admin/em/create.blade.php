@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Daftar <i>Education Malaysia</i></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Kod</li>
        <li class="breadcrumb-item active"><i>Education Malaysia</i></li>
        <li class="breadcrumb-item active">Daftar</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Daftar') }} <i>Education Malaysia</i></div>                

                    <div class="card-body">
                        <form action="{{route('admin-em:store')}}" method="POST" enctype="multipart/form-data">@csrf
                            {{-- <div class="form-group">
                                <label>Kod em</label>
                                <input type="text" name="kod_em" class="form-control">
                            </div> --}}
                            <div class="form-group">
                                <label>Singkatan</label>
                                <input type="text" name="kod" placeholder="Contoh( 'EMA' )" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama <i>Education Malaysia</i></label>
                                <input type="text" name="nama" placeholder="Contoh( 'EM Australia' )" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Negara <i>Education Malaysia</i></label>
                                {{-- <input type="text" name="kodNegaraEM" class="form-control"> --}}
                                <select name="kodNegaraEM" class="form-control">
                                    @foreach($senaraiNegara as $key => $negara)
                                        <option value="{{$negara->kod_negara}}">{{$negara->kod_negara}} : {{$negara->keterangan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <a href="{{route('admin-em:index')}}" class="btn btn-secondary">Kembali</a>
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