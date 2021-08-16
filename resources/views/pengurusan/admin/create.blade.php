@extends('admin.layouts.main')
@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Daftar Pengguna (Admin)</h1>
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
                                    <input class="form-control" type="text" maxlength="12" name="no_kpPengguna" required>
                                </div>
                            @error('no_kpPengguna')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group row">
                                <label for="NamaPengguna" class="col-sm-3 col-form-label">NAMA</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" name="NamaPengguna" required>
                                </div>
                                @error('NamaPengguna')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="TELEFON" class="col-sm-3 col-form-label">NO TELEFON</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" name="Telefon" required>
                                </div>
                                @error('Telefon')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="EMEL" class="col-sm-3 col-form-label">EMEL</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="email" name="Emel" required>
                                </div>
                                @error('Emel')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="CAPAIAN" class="col-sm-3 col-form-label">TAHAP CAPAIAN</label>
                                <div class="col-sm-4">
                                    <select name="KodCapaian" class="form-control tahapCapaian">
                                        <option value="tiada" selected disabled></option>
                                        @foreach ($KodCapai as $level)
                                        <option value="{{ $level->Kod_Capaian }}">{{ $level->Keterangan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row divNegara" hidden>
                                {{-- <label for="NEGARA" class="col-sm-3 col-form-label">NEGARA</label> --}}
                                <label for="NEGARA" class="col-sm-3 col-form-label">NAMA EM</label>
                                <div class="col-sm-4">
                                    <select name="Kod_Negara" class="form-control negara">
                                        <option value="tiada" selected disabled></option>
                                        @foreach ($eduMas as $em)
                                        <option value="{{ $em->Kod_EM }}">{{ $em->NamaEM}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Pegawai BEM Malaysia only --}}
                            {{-- <div class="form-group row divNegara2" hidden>
                            <label for="NEGARA" class="col-sm-3 col-form-label">NEGARA</label>
                            <div class="col-sm-4"> --}}
                            {{-- <input name="Kod_Negara" class="form-control" value="MYS" hidden>
                            <label class="form-label"><input class="form-control" value="MALAYSIA" readonly></label> --}}
                            {{-- <select name="malaysia" class="form-control">
                            <option value="tiada" selected disabled></option>
                            <option value="MYS">MALAYSIA</option>
                            </select>
                            </div>
                            </div> --}}
                            {{-- Pegawai BEM Malaysia only end --}}

                            <div class="form-group row">
                                <label for="Kod_Status" class="col-sm-3 col-form-label">STATUS PENGGUNA</label>
                                <div class="col-md-4">
                                    <select name="Kod_Status" class="form-control" required>
                                        {{-- <option value="{{ $pelajar->Kod_IPT }}">{{ $pelajar->ipt->NAMA_IPT}} - (current)</option> --}}
                                        <option value="tiada" selected disabled></option>
                                        <option value="1">AKTIF</option>
                                        <option value="0">TIDAK AKTIF</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col text-center">
                                <a href="{{Route('admin.senarai')}}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Daftar Pengguna</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

<script>
    $('.tahapCapaian').on('change', function()
    {
        var tahapCapaian = $('.tahapCapaian').val();
        // console.log(tahapCapaian);

        // $('.divNegara2').prop('hidden', true);
        if(tahapCapaian == 02 || tahapCapaian == 03 || tahapCapaian == 05)
        {
            // console.log('masuk bukan admin');
            // $('.divNegara').prop('hidden', false);

            if(tahapCapaian == 03 || tahapCapaian == 05)
            {
                // console.log('masuk em duta');
                //bukan peg bem
                $('.divNegara').prop('hidden', false);
            }
            else
            {
                //peg bem
                // console.log('masuk bem');
                $('.divNegara').prop('hidden', true);
                // $('.divNegara2').prop('hidden', false);
            }
        }
        else
        {
            // console.log('masuk admin');
            $('.divNegara').prop('hidden', true);
        }
    });
</script>

@endsection
