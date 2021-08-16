@extends('std.layouts.main')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Kemaskini Maklumat Pengajian Saya</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Maklumat</li>
        <li class="breadcrumb-item active"><a href="{{Route('std-edu-list')}}">Butiran Pengajian</a></li>
        <li class="breadcrumb-item active">Kemaskini Butiran Pengajian</li>
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
                <div class="card-header">{{ __('Maklumat Pengajian Saya') }}</div>

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
                    <label for="country-dropdown" class="col-sm-2 col-form-label">NEGARA PENGAJIAN</label>
                     <div class="col-sm-6">
                      {{--<input type="text" class="form-control" id="KodNegara" placeholder="Sila Pilih Negara" value="" required>--}}
                       <select name="country" id="country-dropdown" class="form-control" required>
                        {{-- <option value="{{ $pelajar->Kod_IPT }}">{{ $pelajar->ipt->NAMA_IPT}} - (current)</option> --}}
                        <option value="{{ $edu->Kod_Negara }}">{{ $edu->negara->Keterangan}} - (current)</option>
                        @foreach($negara as $country)
                        <option value="{{$country->Kod_Negara}}"> {{$country->Keterangan}}</option>
                        @endforeach
                    </select>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="state-dropdown" class="col-sm-2 col-form-label">WILAYAH PENGAJIAN</label>
                    <div class="col-sm-6">
                        <select name="state" id="state-dropdown" class="form-control" required>
                            <option value="{{ $edu->Kod_State }}">{{ $edu->state->NamaState}} - (current)</option>
                         </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inst-dropdown" class="col-sm-2 col-form-label">INSTITUSI PENGAJIAN</label>
                    <div class="col-sm-6">
                        <select name="institusi" id="inst-dropdown" class="form-control" required>
                            <option value="{{ $edu->Kod_Institusi }}">{{ $edu->institusi->NamaInstitusi}} - (current)</option>
                           </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Kod_Peringkat" class="col-sm-2 col-form-label">PERINGKAT PENGAJIAN</label>

                    <div class="col-md-6">
                       {{--<input type="text" class="form-control" id="KodNegara" placeholder="Sila Pilih Negara" value="" required>--}}
                       <select name="Kod_Peringkat" class="form-control" required>
                        {{-- <option value="{{ $pelajar->Kod_IPT }}">{{ $pelajar->ipt->NAMA_IPT}} - (current)</option> --}}
                        <option value="{{ $edu->Kod_Peringkat }}">{{ $edu->peringkat->NamaPeringkat}} - (current)</option>
                        @foreach ($peringkat as $level)
                           {{--  @if($pelajar->Kod_Jantina != $j->Kod_Jantina  ) --}}
                             <option value="{{ $level->Kod_Peringkat }}">{{ $level->NamaPeringkat}}</option>
                            {{-- @endif --}}
                        @endforeach
                    </select>

                        @error('Kod_Peringkat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bidang-dropdown" class="col-sm-2 col-form-label">BIDANG PENGAJIAN</label>
                     <div class="col-sm-6">
                      {{--<input type="text" class="form-control" id="KodNegara" placeholder="Sila Pilih Negara" value="" required>--}}
                       <select name="bidang" id="bidang-dropdown" class="form-control" required>
                        {{-- <option value="{{ $pelajar->Kod_IPT }}">{{ $pelajar->ipt->NAMA_IPT}} - (current)</option> --}}
                        <option value="{{ $edu->Kod_Bidang}}">{{ $edu->bidang->NamaBidang}} - (current)</option>
                        @foreach($bidang as $field)
                        <option value="{{$field->Kod_Bidang}}"> {{$field ->NamaBidang}}</option>
                        @endforeach
                    </select>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="program-dropdown" class="col-sm-2 col-form-label">PROGRAM PENGAJIAN</label>
                    <div class="col-sm-6">
                        <select name="program" id="program-dropdown" class="form-control" required>
                            <option value="{{ $edu->Kod_Program}}">{{ $edu->program->NamaProgram}} - (current)</option>
                         </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Kod_Penaja" class="col-sm-2 col-form-label">TAJAAN</label>
                    <div class="col-sm-6">
                      {{-- <input type="text" class="form-control" id="KodNegeri" placeholder="Sila Pilih Negeri" value="" required>--}}
                       <select name="Kod_Penaja" class="form-control" required>
                        {{-- <option value="{{ $pelajar->Kod_IPT }}">{{ $pelajar->ipt->NAMA_IPT}} - (current)</option> --}}
                        <option value="{{ $edu->Kod_Penaja }}">{{ $edu->tajaan->NamaPenaja}} - (current)</option>
                        @foreach ($penaja as $taja)
                           {{--  @if($pelajar->Kod_Jantina != $j->Kod_Jantina  ) --}}
                             <option value="{{ $taja->Kod_Penaja }}">{{ $taja->NamaPenaja}}</option>
                            {{-- @endif --}}
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="TarikhMula" class="col-sm-2 col-form-label">TARIKH MULA PENGAJIAN</label>

                    <div class="col-md-3">
                        <input id="TarikhMula" type="date" class="form-control @error('TarikhMula') is-invalid @enderror" name="TarikhMula" placeholder="Sila Isi Tarikh Mula Pengajian" value="{{ $edu->TarikhMula }}" required autocomplete="TarikhMula">

                        @error('TarikhMula')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="TarikhTamat" class="col-sm-2 col-form-label">TARIKH TAMAT PENGAJIAN</label>
                    <div class="col-md-3">
                        <input id="TarikhTamat" type="date" class="form-control @error('TarikhTamat') is-invalid @enderror" name="TarikhTamat" placeholder="Sila Isi Tarikh Tamat Pengajian" value="{{ $edu->TarikhTamat }}" required autocomplete="TarikhTamat">

                        @error('TarikhTamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Kod_StatusPengajian" class="col-sm-2 col-form-label">STATUS PENGAJIAN</label>
                    <div class="col-md-3">
                        <select name="Kod_StatusPengajian" class="form-control" required>
                            {{-- <option value="{{ $pelajar->Kod_IPT }}">{{ $pelajar->ipt->NAMA_IPT}} - (current)</option> --}}
                            <option value="{{ $edu->Kod_StatusPengajian }}">{{ $edu->statuspengajian->Keterangan}} - (current)</option>
                            @foreach ($statuspengajian as $status)
                               {{--  @if($pelajar->Kod_Jantina != $j->Kod_Jantina  ) --}}
                                 <option value="{{ $status->Kod_StatusPengajian }}">{{ $status->Keterangan}}</option>
                                {{-- @endif --}}
                            @endforeach
                        </select>
                    </div>
                </div>

                    <div class="col text-center">
                        <a href="{{Route('std-edu-list')}}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Maklumat Pengajian</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $('#country-dropdown').on('change', function() {
                var country_id = this.value;
                $("#state-dropdown").html('');
                $.ajax({
                    url:"{{ route('get:states')}}",
                    type: "POST",
                    data: {
                        country_id: country_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType : 'json',
                    success: function(result){
                        $('#state-dropdown').html('<option value="">Sila Pilih Wilayah Pengajian</option>');
                        $.each(result.states,function(key,value){
                            $("#state-dropdown").append('<option value="'+value.Kod_State+'">'+value.NamaState+'</option>');
                        });
                        $('#inst-dropdown').html('<option value="">Sila Pilih Wilayah Pengajian</option>');
                    }
                });
            });

            $('#state-dropdown').on('change', function() {
                var state_id = this.value;
                $("#inst-dropdown").html('');
                $.ajax({
                    url:"{{ route('get:institusi') }}",
                    type: "POST",
                    data: {
                        state_id: state_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType : 'json',
                    success: function(result){
                        $('#inst-dropdown').html('<option value="">Sila Pilih Institusi</option>');
                        $.each(result.institusi,function(key,value){
                            $("#inst-dropdown").append('<option value="'+value.Kod_Institusi+'">'+value.NamaInstitusi+'</option>');
                        });
                    }
                });
            });


     $('#bidang-dropdown').on('change', function() {
                var bidang_id = this.value;
                $("#program-dropdown").html('');
                $.ajax({
                    url:"{{ route('get:program') }}",
                    type: "POST",
                    data: {
                        bidang_id: bidang_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType : 'json',
                    success: function(result){
                        $('#program-dropdown').html('<option value="">Sila Pilih Program Pengajian</option>');
                        $.each(result.program,function(key,value){
                            $("#program-dropdown").append('<option value="'+value.Kod_Program+'">'+value.NamaProgram+'</option>');
                        });
                    }
                });
            });
        });
 </script>
@endsection
