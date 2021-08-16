@extends('layouts.pelajar.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Daftar Butiran Vaksinasi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Maklumat</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-medkit" aria-hidden="true"></i></div><a href="{{route('pelajar-vaksinasi:index')}}">Butiran Vaksinasi</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-plus-circle"></i></div>Daftar Butiran Vaksinasi</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Butiran Vaksinasi') }}</div>                

                    <div class="card-body">                        
                        <form action="{{route('pelajar-vaksinasi:store')}}" method="POST" enctype="multipart/form-data">@csrf
                                
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label>Jenis Vaksin</label>
                                        {{-- <input type="text" name="namaVaksin" class="form-control"> --}}
                                        <select name="jenisVaksin" class="form-control">
                                            <option selected disabled>Sila Pilih Jenis Vaksin</option>
                                            @foreach($senaraiJenisVaksin as $key => $jenisVaksin)
                                            <option value="{{$jenisVaksin->id}}">{{$jenisVaksin->nama_vaksin}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Status Vaksinasi</label>
                                        <select name="statusVaksinasi" class="form-control">
                                            <option selected disabled>Sila Pilih Status Vaksinasi</option>
                                            @foreach($senaraiStatusVaksinasi as $key => $statusVaksinasi)
                                            <option value="{{$statusVaksinasi->id}}">{{$statusVaksinasi->keterangan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="col-2">
                                        <label>Tarikh</label>
                                        <input type="date" name="tarikhVaksinasi" class="form-control">
                                    </div>                                     --}}
                                </div>
                            </div>

                            <div class="form-group">
                                <a href="{{route('pelajar-vaksinasi:index')}}" class="btn btn-secondary">Kembali</a>
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