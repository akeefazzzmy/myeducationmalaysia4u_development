@extends('std.layouts.main')

@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Tambah Maklumat Waris Saya</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Maklumat</li>
        <li class="breadcrumb-item active"><a href="{{Route('std-waris')}}">Butiran Waris</a></li>
        <li class="breadcrumb-item active">Tambah Butiran Waris</li>
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
                <div class="card-header">{{ __('Maklumat Waris Saya') }}</div>

                <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                 @csrf
                <div class="form-group row">
                    <label for="no_kp" class="col-sm-2 col-form-label">NO KP</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="no_kp" placeholder="No Kad Pengenalan" value="{{ $user->no_kp }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Nama" class="col-sm-2 col-form-label">NAMA</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="Nama" placeholder="Nama" value="{{ $user->Nama }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_kp_Waris" class="col-sm-2 col-form-label">NO KP WARIS</label>
                    <div class="col-sm-4">
                      <input type="text" id="no_kp_Waris" class="form-control @error('no_kp_Waris') is-invalid @enderror"  maxlength="12" placeholder="No Kad Pengenalan Waris" name="no_kp_Waris" value="{{ old('no_kp_Waris') }}" required>

                      @error('no_kp_Waris')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Nama_Waris" class="col-sm-2 col-form-label">NAMA WARIS</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="Nama_Waris" placeholder="Nama Waris" name="Nama_Waris" value="{{ old('Nama_Waris') }}" required >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Alamat_Waris" class="col-sm-2 col-form-label">ALAMAT WARIS</label>
                    <div class="col-sm-6">
                      <textarea class="form-control" id="Alamat_Waris" rows="3" class="form-control @error('Alamat_Waris') is-invalid @enderror" name="Alamat_Waris" placeholder="Sila Isi Alamat Waris" value="{{ old('Alamat_Waris') }}" required autocomplete="Alamat_Waris"></textarea>

                      @error('Alamat_Waris')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Poskod_Waris" class="col-sm-2 col-form-label">POSKOD WARIS</label>

                    <div class="col-md-3">
                        <input id="Poskod_Waris" type="text" class="form-control @error('Poskod_Waris') is-invalid @enderror" name="Poskod_Waris" placeholder="Sila Isi Poskod Waris" value="{{ old('Poskod_Waris') }}" required autocomplete="Poskod_Waris">

                        @error('Poskod_Waris')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Bandar_Waris" class="col-sm-2 col-form-label">BANDAR WARIS</label>

                    <div class="col-md-3">
                        <input id="Bandar_Waris" type="text" class="form-control @error('Bandar_Waris') is-invalid @enderror" name="Bandar_Waris" placeholder="Sila Isi Bandar Waris" value="{{ old('Bandar_Waris') }}" required autocomplete="Bandar_Waris">

                        @error('Bandar_Waris')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Negeri_Waris" class="col-sm-2 col-form-label">NEGERI WARIS</label>
                    <div class="col-sm-6">
                      {{-- <input type="text" class="form-control" id="KodNegeri" placeholder="Sila Pilih Negeri" value="" required>--}}
                       <select name="Kod_NegeriWaris" class="form-control" required>
                        {{-- <option value="{{ $pelajar->Kod_IPT }}">{{ $pelajar->ipt->NAMA_IPT}} - (current)</option> --}}
                        <option value="">Sila Pilih Negeri</option>
                        @foreach ($negeri as $n)
                           {{--  @if($pelajar->Kod_Jantina != $j->Kod_Jantina  ) --}}
                             <option value="{{ $n->Kod_Negeri }}">{{ $n->NamaNegeri}}</option>
                            {{-- @endif --}}
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Negara_Waris" class="col-sm-2 col-form-label">NEGARA WARIS</label>
                    <div class="col-sm-6">
                      {{--<input type="text" class="form-control" id="KodNegara" placeholder="Sila Pilih Negara" value="" required>--}}
                       <select name="Kod_NegaraWaris" class="form-control" required>
                        {{-- <option value="{{ $pelajar->Kod_IPT }}">{{ $pelajar->ipt->NAMA_IPT}} - (current)</option> --}}
                        <option value="">Sila Pilih Negara</option>
                        @foreach ($negara as $country)
                           {{--  @if($pelajar->Kod_Jantina != $j->Kod_Jantina  ) --}}
                             <option value="{{ $country->Kod_Negara }}">{{ $country->Keterangan}}</option>
                            {{-- @endif --}}
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="NoTel_Waris" class="col-sm-2 col-form-label">NO. TELEFON WARIS</label>

                    <div class="col-md-3">
                        <input id="NoTel_Waris" type="text" class="form-control @error('NoTel_Waris') is-invalid @enderror" name="NoTel_Waris" placeholder="Sila Isi No Telefon Waris" value="{{ old('NoTel_Waris') }}" required autocomplete="NoTel_Waris">

                        @error('NoTel_Waris')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Hubungan_Waris" class="col-sm-2 col-form-label">HUBUNGAN WARIS</label>
                    <div class="col-sm-6">
                      {{--<input type="text" class="form-control" id="KodNegara" placeholder="Sila Pilih Negara" value="" required>--}}
                       <select name="Hubungan_Waris" class="form-control" required>
                        {{-- <option value="{{ $pelajar->Kod_IPT }}">{{ $pelajar->ipt->NAMA_IPT}} - (current)</option> --}}
                        <option value="">Sila Pilih Hubungan Waris</option>
                        @foreach ($hubungan as $relationship)
                           {{--  @if($pelajar->Kod_Jantina != $j->Kod_Jantina  ) --}}
                             <option value="{{ $relationship->Kod_Hubungan }}">{{ $relationship->Keterangan}}</option>
                            {{-- @endif --}}
                        @endforeach
                    </select>
                    </div>
                </div>

                    <div class="col text-center">
                        <a href="{{Route('std-waris')}}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Maklumat Waris</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
