@extends('layouts.admin.main')
@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Education Malaysia Edit</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Education Malaysia') }}</div>                

                    <div class="card-body">
                        <form method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Kod</label>
                                <input type="text" name="kod" class="form-control" value="{{$em->kod_em}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{$em->keterangan}}">
                            </div>
                            <div class="form-group">
                                <label>Negara Education Malaysia</label>
                                {{-- <input type="text" name="kodNegaraEM" class="form-control" value="{{$em->kod_negara_em}}"> --}}
                                {{-- <input type="text" name="kodNegaraEM" class="form-control" value="{{$em->negara->keterangan}}"> --}}
                                <select name="kodNegaraEM" class="form-control">
                                        <option value="{{$em->negara->kod_negara}}" selected>{{$em->negara->keterangan}}</option>
                                        <option disabled>---</option>
                                    @foreach($senaraiNegara as $key => $negara)
                                        <option value="{{$negara->kod_negara}}">{{$negara->keterangan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat Education Malaysia</label>
                                <input type="text" name="alamatEm" class="form-control" value="{{$em->alamat}}">
                            </div>
                            <div class="form-group">
                                <a href="{{route('admin-em:index')}}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection