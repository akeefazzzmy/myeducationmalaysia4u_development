@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Daftar Liputan Education Malaysia</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Kod</li>
        <li class="breadcrumb-item active">Education Malaysia</li>
        <li class="breadcrumb-item active">Papar</li>
        <li class="breadcrumb-item active">Daftar Negara Liputan</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Negara Liputan') }} {{$em->keterangan}}</div>                

                    <div class="card-body">
                        <form action="{{route('admin-em-createLiputan:store', $em)}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-2">
                                        <label>Singkatan</label>
                                        <input type="text" name="kod" class="form-control" value="{{$em->kod_em}}" readonly>
                                    </div>
                                    <div class="col-4">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" value="{{$em->keterangan}}" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label>Negara</label>
                                        <select name="negara" class="form-control negara">
                                                <option selected disabled>Sila Pilih Negara Liputan</option>
                                                <option disabled>---</option>
                                            @foreach($senaraiNegara as $key => $negara)
                                                <option value="{{$negara->kod_negara}}">{{$negara->kod_negara}} : {{$negara->keterangan}}</option>
                                            @endforeach                                            
                                        </select>
                                    </div>
                                </div>                            
                            </div>
                            <div class="form-group">
                                <a href="{{route('admin-em:show', $em)}}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary daftarButton" disabled>Daftar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.negara').on('click', function()
    {
        $('.daftarButton').prop("disabled", false);
        // $('.buttonDaftar').prop("disabled", false);
    });
</script>
@endsection