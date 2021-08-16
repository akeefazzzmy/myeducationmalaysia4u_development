@extends('admin.layouts.main')
@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Kemaskini Pengguna</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Maklumat Pengguna</li>
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
                <div class="card-header">{{ __('Maklumat Pengguna') }}</div>

                <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                 @csrf
                 <div class="form-group row">
                    <label for="no_kpPengguna" class="col-sm-3 col-form-label">NO KAD PENGENALAN</label>
                    <div class="col-sm-4">
                    <input class="form-control" type="text" maxlength="12" name="no_kpPengguna" value="{{ $admin->no_kp }}" readonly>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="NamaPengguna" class="col-sm-3 col-form-label">NAMA</label>
                    <div class="col-sm-8">
                    <input class="form-control" type="text" name="NamaPengguna" value="{{ $admin->Nama }}" readonly>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="TELEFON" class="col-sm-3 col-form-label">NO TELEFON</label>
                    <div class="col-sm-4">
                    <input class="form-control" type="text" name="Telefon" value="{{ $admin->NoTel }}" required>
                    </div>
                    @error('Telefon')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group row">
                        <label for="EMEL" class="col-sm-3 col-form-label">EMEL</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="email" name="Emel" value="{{ $admin->Emel }}" required>
                    </div>
                        @error('Emel')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                <div class="form-group row">
                        <label for="CAPAIAN" class="col-sm-3 col-form-label">TAHAP CAPAIAN</label>
                    <div class="col-sm-4">
                        <select name="KodCapaian" class="form-control" required>

                            <option value="{{ $admin->Kod_Capaian}}">{{ $admin->capaian->Keterangan}} - (terkini)</option>
                            @foreach ($KodCapai as $level)

                                 <option value="{{ $level->Kod_Capaian }}">{{ $level->Keterangan}}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
                {{--  --}}
                @if($admin->Kod_Negara)
                <div class="form-group row">
                    <label for="NEGARA" class="col-sm-3 col-form-label">NEGARA</label>
                    <div class="col-sm-6">
                        <select name="Kod_Negara" class="form-control">
                            <option value="{{ $admin->Kod_Negara}}">{{ $admin->Kod_Negara}} - (terkini)</option>
                            @foreach ($negara as $country)
                            <option value="{{ $country->Kod_Negara }}">{{ $country->Kod_Negara }} : {{ $country->Keterangan}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @else
                @endif
                {{--  --}}
            <div class="form-group row">
                <label for="Kod_Status" class="col-sm-3 col-form-label">STATUS</label>
                <div class="col-md-4">
                    <select name="Kod_Status" class="form-control" required>
                    @if( $admin->Kod_Status == '1')
                        <option value="{{ $admin->Kod_Status }}">Aktif - (terkini)</option>
                    @elseif( $admin->Kod_Status == '0')
                        <option value="{{ $admin->Kod_Status }}">Tidak Aktif - (terkini)</option>
                    @else
                        <option value="{{ $admin->Kod_Status }}">Tiada Maklumat - (terkini)</option>
                 @endif
                <option value="1">Aktif</option>
                   <option value="0">Tidak Aktif</option>
                    </select>
                </div>
            </div>
                    <div class="col text-center">
                        <a href="{{Route('admin.senarai')}}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Kemaskini Pengguna</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
