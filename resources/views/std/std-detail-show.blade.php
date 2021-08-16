@extends('std.layouts.main')

@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Maklumat Peribadi Saya</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Maklumat Peribadi</li>
    </ol>
    <div class="row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @else
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
                      <input type="text" class="form-control" id="no_kp" value="{{ $pelajar->no_kp }}" readonly>
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
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="no_kp"  value="{{ $pelajar->NoPassport }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="TarikhLahir" class="col-sm-2 col-form-label">TARIKH LAHIR</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="TarikhLahir"  value="{{ $pelajar->TarikhLahir }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Umur" class="col-sm-2 col-form-label">UMUR</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="Umur"  value="{{ $pelajar->Umur }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Jantina" class="col-sm-2 col-form-label">JANTINA</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="KodJantina"  value="{{ $pelajar->jantina->Keterangan}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="NegeriLahir" class="col-sm-2 col-form-label">NEGERI KELAHIRAN</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="KodNegeriLahir"  value="{{ $pelajar->negeriLahir->NamaNegeri}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Bangsa" class="col-sm-2 col-form-label">BANGSA</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="Bangsa"  value="{{ $pelajar->bangsa->NamaBangsa}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Agama" class="col-sm-2 col-form-label">AGAMA</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="Agama" value="{{ $pelajar->agama->NamaAgama}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Alamat" class="col-sm-2 col-form-label">ALAMAT</label>
                    <div class="col-sm-6">
                        <textarea  class="form-control" id="Alamat" name="Alamat"  rows="3" readonly>{{ $pelajar->Alamat}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Poskod" class="col-sm-2 col-form-label">POSKOD</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="Poskod"  value="{{ $pelajar->Poskod}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Bandar" class="col-sm-2 col-form-label">BANDAR</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="Bandar"  value="{{ $pelajar->Bandar}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Negeri" class="col-sm-2 col-form-label">NEGERI</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="KodNegeri"  value="{{ $pelajar->negeri->NamaNegeri}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Negara" class="col-sm-2 col-form-label">NEGARA</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="KodNegara"  value="{{ $pelajar->negara->Keterangan}}" readonly>
                    </div>
                </div>

                    <div class="col text-center">
                    <button type="submit" class="btn btn-primary">Kemaskini Maklumat Peribadi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
