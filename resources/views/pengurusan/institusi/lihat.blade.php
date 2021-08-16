@extends('admin.layouts.main')
@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Maklumat Institusi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Kemaskini Institusi</li>
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
                <div class="card-header">{{ __('Maklumat Institusi') }}</div>

                <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                 @csrf
                 <input class="form-control" type="text" name="KodState" value="{{ $institusi->Kod_State }}" hidden>
                 <div class="form-group">
                    <label>KOD INSTITUSI</label>
                    <input class="form-control" type="text" name="KodInstitusi" value="{{ $institusi->Kod_Institusi }}" readonly>
                </div>
                 <div class="form-group">
                        <label>NAMA INSTITUSI</label>
                        <input class="form-control" type="text" name="NamaInstitusi" value="{{ $institusi->NamaInstitusi }}">
                        @error('NamaInstitusi')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                     </div>
                    <div class="form-group">
                        <label>STATUS</label>
                        <select name="Status" class="form-control">
                            @if( $institusi->Kod_Status == '1')
                                <option value="{{ $institusi->Kod_Status }}">Aktif - (current)</option>
                            @elseif( $institusi->Kod_Status == '0')
                                <option value="{{ $institusi->Kod_Status }}">Tidak Aktif - (current)</option>
                            @else
                                <option value="{{ $institusi->Kod_Status }}">Tiada Maklumat - (current)</option>
                            @endif
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                        </select>
                            @error('Status')
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
                        <a href="{{Route('institusi.senarai')}}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Kemaskini Institusi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
