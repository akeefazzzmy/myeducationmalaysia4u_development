@extends('layouts.kedutaan.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Pengurusan Pelajar</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-tasks"></i></div>Pengurusan Pelajar</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-search"></i></div>Cari Pelajar</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-id-card"></i></div>No KP</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-plus-circle"></i></div>Daftar Vaksinasi Pelajar</li>
    </ol>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session()->has('alert-message'))
                    <div class="alert {{session()->get('alert-type')}}">
                        {{session()->get('alert-message')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Daftar Butiran Vaksinasi') }}</div>                

                    <div class="card-body">                        
                        <form method="POST" enctype="multipart/form-data">@csrf
                                
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
                                <a href="{{route('kedutaan-carianPelajar-noKP:showGet', $pelajar)}}" class="btn btn-secondary">Kembali</a>
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