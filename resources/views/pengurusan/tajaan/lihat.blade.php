@extends('admin.layouts.main')
@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Maklumat Penaja</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Kemaskini Penaja</li>
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
            <div class="card">
                <div class="card-header">{{ __('Maklumat Penaja') }}</div>

                <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                 @csrf
                 <div class="form-group" hidden>
                    <label>KOD PENAJA</label>
                    <input class="form-control" type="text" name="KodTajaan" value="{{ $tajaan->Kod_Penaja }}" readonly>
                </div>
                 <div class="form-group">
                        <label>NAMA PENAJA</label>
                        <input class="form-control" type="text" name="NamaTajaan" value="{{ $tajaan->NamaPenaja }}">
                        @error('NamaState')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                     </div>
                     <div class="form-group">
                        <label>NAMA SINGKATAN PENAJA</label>
                        <input class="form-control" type="text" name="SName" value="{{ $tajaan->NamaSingkatan}}">
                        @error('SName')
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
                    <div class="col text-center">
                        <a href="{{Route('tajaan.senarai')}}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Kemaskini Penaja</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
