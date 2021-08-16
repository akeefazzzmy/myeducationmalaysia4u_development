@extends('admin.layouts.main')
@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Daftar Penaja (Admin)</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Maklumat Penaja</li>
    </ol>
    <div class="row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if(session('danger'))
                    <div class="alert alert-danger" role="alert">
                    {{ session('danger') }}
                    </div>
                    @endif
                    
                    <div class="card">
                        <div class="card-header">{{ __('Maklumat Penaja') }}</div>
                            <div class="card-body">
                                {{-- <form id="daftarState" action="POST" enctype="multipart/form-data"> yang asal--}}
                                <form method="POST" action="{{Route('tajaan-simpan')}}" enctype="multipart/form-data">
                                {{-- <form id="daftarState" action="POST"> --}}
                                    @csrf

                                    {{-- KOD PENAJA --}}
                                    <div class="form-group row" hidden>
                                        <label for="Penaja" class="col-sm-2 col-form-label">KOD PENAJA</label>
                                        <div class="col-sm-8">
                                                <input class="form-control" name="kodPenaja" value="{{$kodPenajaTambahSatu}}" readonly>
                                        </div>
                                        @error('Penaja')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- NAMA PENAJA --}}
                                    <div class="form-group row">
                                        <label for="NamaPenaja" class="col-sm-2 col-form-label">NAMA PENAJA</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="namaPenaja">
                                        </div>
                                        @error('NamaPenaja')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    {{-- SINGKATAN PENAJA --}}
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">NAMA SINGKATAN PENAJA</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="namaSingkatanPenaja">
                                        </div>
                                        @error('singkatanPenaja')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- ID PEGAWAI --}}
                                    <div class="form-group row" hidden>
                                        <label class="col-sm-2 col-form-label">ID PEGAWAI</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="idPeg" value="{{ auth()->user()->no_kp }}" readonly>
                                            {{-- <input class="form-control" name="idPeg" value="{{Request::session()->get('no_kp')}}"> --}}
                                        </div>
                                        @error('idPeagawai')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- BUTTON --}}
                                    <div class="col text-center">
                                        <a href="{{Route('tajaan.senarai')}}" class="btn btn-secondary">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Daftar Penaja</button>
                                    </div>
                                </form>
    </div>
    </div>
</div>

@endsection