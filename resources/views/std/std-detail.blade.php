@extends('std.layouts.main')

@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Maklumat Peribadi Saya</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Maklumat</li>
        <li class="breadcrumb-item active">Butiran Peribadi</li>
    </ol>
    <div class="row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    {{-- @if(session('status'))
                        <div class="alert alert-info" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        @if (session('warning'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('warning') }}
                        </div>
                    @endif
            <div class="card">
                <div class="card-header">{{ __('Maklumat Peribadi Saya') }}</div>

                <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                 @csrf
                <div class="form-group row">
                    <label for="no_kp" class="col-sm-2 col-form-label">NO KP</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="no_kp" placeholder="No Kad Pengenalan" value="{{ $pelajar->no_kp }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Nama" class="col-sm-2 col-form-label">NAMA</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="Nama" placeholder="Nama" value="{{ $user->Nama }}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="NoPassport" class="col-sm-2 col-form-label">NO PASSPORT</label>

                    <div class="col-md-3">
                        @if($pelajar->NoPassport == "")
                             <input id="NoPassport" type="text" class="form-control @error('NoPassport') is-invalid @enderror" name="NoPassport" placeholder="Sila Isi No Passport" value="{{ old('NoPassport') }}" required autocomplete="NoPassport">
                            @else
                            <input id="NoPassport" type="text" class="form-control @error('NoPassport') is-invalid @enderror" name="NoPassport" placeholder="Sila Isi No Passport" value="{{$pelajar->NoPassport}}" required autocomplete="NoPassport">
                            @endif
                        @error('NoPassport')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="TarikhLahir" class="col-sm-2 col-form-label">TARIKH LAHIR</label>

                    <div class="col-md-3">
                        @if($pelajar->TarikhLahir == "")
                            <input id="TarikhLahir" type="date" class="form-control @error('TarikhLahir') is-invalid @enderror" name="TarikhLahir" placeholder="Sila Isi Tarikh Lahir" value="{{ old('TarikhLahir') }}" required autocomplete="TarikhLahir">
                            @else
                            <input id="TarikhLahir" type="date" class="form-control @error('TarikhLahir') is-invalid @enderror" name="TarikhLahir" placeholder="Sila Isi Tarikh Lahir" value="{{$pelajar->TarikhLahir}}" required autocomplete="TarikhLahir">
                            @endif
                        @error('TarikhLahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Umur" class="col-sm-2 col-form-label">UMUR</label>

                    <div class="col-md-3">
                        @if($pelajar->Umur == "")
                        <input id="Umur" type="text" class="form-control @error('Umur') is-invalid @enderror" name="Umur" placeholder="Sila Isi Umur" value="{{ old('Umur') }}" required autocomplete="Umur">
                        @else
                        <input id="Umur" type="text" class="form-control @error('Umur') is-invalid @enderror" name="Umur" placeholder="Sila Isi Umur" value="{{$pelajar->Umur}}" required autocomplete="Umur">
                        @endif
                        @error('Umur')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Jantina" class="col-sm-2 col-form-label">JANTINA</label>
                    <div class="col-sm-4">
                 @if($pelajar->Kod_Jantina == "")
                    <select name="KodJantina" class="form-control" required>
                        <option value="">Sila Pilih Jantina</option>
                      @foreach ($jantina as $j)
                          <option value="{{ $j->Kod_Jantina }}">{{ $j->Keterangan}}</option>
                        @endforeach
                    </select>
                    @else
                      <select name="KodJantina" class="form-control" required>
                        <option value="{{ $pelajar->Kod_Jantina }}">{{ $pelajar->jantina->Keterangan}} - (current)</option>
                      {{--  <option value="">Sila Pilih Jantina</option> --}}
                       @foreach ($jantina as $j)
                            @if($pelajar->Kod_Jantina != $j->Kod_Jantina)
                             <option value="{{ $j->Kod_Jantina }}">{{ $j->Keterangan}}</option>
                            @endif
                        @endforeach
                    </select>
                    @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="NegeriLahir" class="col-sm-2 col-form-label">NEGERI KELAHIRAN</label>
                    <div class="col-sm-6">
                        @if($pelajar->Kod_Negeri == "")
                        <select name="KodNegeriLahir" class="form-control" required>
                                <option value="">Sila Pilih Negeri Kelahiran</option>
                            @foreach ($negeri as $n)
                                <option value="{{ $n->Kod_Negeri }}">{{ $n->NamaNegeri}}</option>
                            @endforeach
                        </select>
                        @else
                      {{-- <input type="text" class="form-control" id="KodNegeriLahir" placeholder="Sila Pilih Negeri Kelahiran" value="" required> --}}
                       <select name="KodNegeriLahir" class="form-control" required>
                        <option value="{{ $pelajar->Kod_Negeri }}">{{ $pelajar->negeri->NamaNegeri}} - (current)</option>
                        {{-- <option value="">Sila Pilih Negeri Kelahiran</option> --}}
                        @foreach ($negeri as $n)
                            @if($pelajar->Kod_Negeri != $n->Kod_Negeri)
                             <option value="{{ $n->Kod_Negeri }}">{{ $n->NamaNegeri}}</option>
                            @endif
                        @endforeach
                    </select>
                    @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Bangsa" class="col-sm-2 col-form-label">BANGSA</label>
                    <div class="col-sm-4">
                        @if($pelajar->Kod_Bangsa == "")
                        <select name="KodBangsa" class="form-control" required>
                           <option value="">Sila Pilih Bangsa</option>
                           @foreach ($bangsa as $b)
                              <option value="{{ $b->Kod_Bangsa }}">{{ $b->NamaBangsa}}</option>
                           @endforeach
                       </select>
                       @else
                      {{-- <input type="text" class="form-control" id="KodBangsa" placeholder="Sila Pilih Bangsa" value="" required> --}}
                      <select name="KodBangsa" class="form-control" required>
                         <option value="{{ $pelajar->Kod_Bangsa }}">{{ $pelajar->bangsa->NamaBangsa}} - (current)</option>
                       {{-- <option value="">Sila Pilih Bangsa</option> --}}
                        @foreach ($bangsa as $b)
                           @if($pelajar->Kod_Bangsa != $b->Kod_Bangsa)
                             <option value="{{ $b->Kod_Bangsa }}">{{ $b->NamaBangsa}}</option>
                            @endif
                        @endforeach
                    </select>
                    @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Agama" class="col-sm-2 col-form-label">AGAMA</label>
                    <div class="col-sm-4">
                        @if($pelajar->Kod_Agama == "")
                      <select name="KodAgama" class="form-control" required>
                       <option value="">Sila Pilih Agama</option>
                        @foreach ($agama as $a)
                             <option value="{{ $a->Kod_Agama }}">{{ $a->NamaAgama}}</option>
                        @endforeach
                    </select>
                    @else
                      {{-- <input type="text" class="form-control" id="KodAgama" placeholder="Sila Pilih Agama" value="" required> --}}
                      <select name="KodAgama" class="form-control" required>
                        <option value="{{ $pelajar->Kod_Agama }}">{{ $pelajar->agama->NamaAgama}} - (current)</option>
                        {{-- <option value="">Sila Pilih Agama</option> --}}
                        @foreach ($agama as $a)
                            @if($pelajar->Kod_Agama != $a->Kod_Agama)
                             <option value="{{ $a->Kod_Agama }}">{{ $a->NamaAgama}}</option>
                             @endif
                        @endforeach
                    </select>
                    @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Alamat" class="col-sm-2 col-form-label">ALAMAT</label>
                    <div class="col-sm-6">
                     @if($pelajar->Alamat == "")
                      <textarea class="form-control" id="Alamat" rows="3" class="form-control @error('Alamat') is-invalid @enderror" name="Alamat" placeholder="Sila Isi Alamat" value="{{ old('Alamat') }}" required autocomplete="Alamat"></textarea>
                      @else
                      <textarea class="form-control" id="Alamat" rows="3" class="form-control @error('Alamat') is-invalid @enderror" name="Alamat" placeholder="Sila Isi Alamat" required autocomplete="Alamat">{{ $pelajar->Alamat }}</textarea>
                      @endif
                      @error('Alamat')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Poskod" class="col-sm-2 col-form-label">POSKOD</label>
                    <div class="col-md-3">
                        @if($pelajar->Poskod == "")
                        <input id="Poskod" type="text" class="form-control @error('Poskod') is-invalid @enderror" name="Poskod" placeholder="Sila Isi Poskod" value="{{ old('Poskod') }}" required autocomplete="Poskod">
                        @else
                        <input id="Poskod" type="text" class="form-control @error('Poskod') is-invalid @enderror" name="Poskod" placeholder="Sila Isi Poskod" value="{{ $pelajar->Poskod }}" required autocomplete="Poskod">
                        @endif
                        @error('Poskod')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Bandar" class="col-sm-2 col-form-label">BANDAR</label>

                    <div class="col-md-3">
                        @if($pelajar->Bandar == "")
                        <input id="Bandar" type="text" class="form-control @error('Bandar') is-invalid @enderror" name="Bandar" placeholder="Sila Isi Bandar" value="{{ old('Bandar') }}" required autocomplete="Bandar">
                        @else
                        <input id="Bandar" type="text" class="form-control @error('Bandar') is-invalid @enderror" name="Bandar" placeholder="Sila Isi Bandar" value="{{ $pelajar->Bandar }}" required autocomplete="Bandar">
                        @endif
                        @error('Bandar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Negeri" class="col-sm-2 col-form-label">NEGERI</label>
                    <div class="col-sm-6">
                    @if($pelajar->Kod_Negeri == '')
                    <select name="KodNegeri" class="form-control" required>
                      <option value="">Sila Pilih Negeri</option>
                        @foreach ($negeri as $n)
                             <option value="{{ $n->Kod_Negeri }}">{{ $n->NamaNegeri}}</option>
                        @endforeach
                    </select>
                    @else
                      {{-- <input type="text" class="form-control" id="KodNegeri" placeholder="Sila Pilih Negeri" value="" required>--}}
                       <select name="KodNegeri" class="form-control" required>
                        <option value="{{ $pelajar->Kod_Negeri }}">{{ $pelajar->negeri->NamaNegeri}} - (current)</option>
                        {{-- <option value="">Sila Pilih Negeri</option>--}}
                        @foreach ($negeri as $n)
                           @if($pelajar->Kod_Negeri != $n->Kod_Negeri)
                             <option value="{{ $n->Kod_Negeri }}">{{ $n->NamaNegeri}}</option>
                            @endif
                        @endforeach
                    </select>
                    @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Negara" class="col-sm-2 col-form-label">NEGARA</label>
                    <div class="col-sm-6">
                        @if($pelajar->Kod_Negara =='')
                        <select name="KodNegara" class="form-control" required>
                            <option value="">Sila Pilih Negara</option>
                            @foreach ($negara as $country)
                                 <option value="{{ $country->Kod_Negara }}">{{ $country->Keterangan}}</option>
                            @endforeach
                        </select>
                        @else
                      {{--<input type="text" class="form-control" id="KodNegara" placeholder="Sila Pilih Negara" value="" required>--}}
                       <select name="KodNegara" class="form-control" required>
                        <option value="{{ $pelajar->Kod_Negara }}">{{ $pelajar->negara->Keterangan}} - (current)</option>
                        {{-- <option value="">Sila Pilih Negara</option>--}}
                        @foreach ($negara as $country)
                           @if($pelajar->Kod_Negara != $country->Kod_Negara)
                             <option value="{{ $country->Kod_Negara }}">{{ $country->Keterangan}}</option>
                            @endif
                        @endforeach
                    </select>
                    @endif
                    </div>
                </div>

                    <div class="col text-center">
                    <button type="submit" class="btn btn-primary">Simpan Maklumat Peribadi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
