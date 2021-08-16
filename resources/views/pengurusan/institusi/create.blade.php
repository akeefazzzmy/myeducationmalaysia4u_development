@extends('admin.layouts.main')
@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Daftar Institusi (Admin)</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Maklumat Institusi</li>
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
                        <div class="card-header">{{ __('Maklumat Institusi') }}</div>
                            <div class="card-body">
                                {{-- <form id="daftarState" action="POST" enctype="multipart/form-data"> yang asal--}}
                                <form method="POST" action="{{Route('institusi-simpan')}}" enctype="multipart/form-data">
                                {{-- <form id="daftarState" action="POST"> --}}
                                    @csrf

                                    {{-- NEGARA --}}
                                    <div class="form-group row">
                                        <label for="Negara" class="col-sm-2 col-form-label">NEGARA</label>
                                        <div class="col-sm-8">
                                            <select class="form-control negara" name="negara" required>
                                                <option selected disabled>--Sila Pilih--</option>
                                                @foreach($negara as $negara)
                                                    {{-- <option>{{$negara->Keterangan}} : {{$negara->Kod_Negara}}</option> --}}
                                                    <option value="{{$negara->Kod_Negara}}">{{$negara->Keterangan}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('Negara')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- KOD NEGARA --}}
                                    <div class="form-group row" hidden>
                                        <label for="KodNegara" class="col-sm-2 col-form-label">KOD NEGARA</label>
                                        <div class="col-sm-8 append-kodNegara">
                                            <input class="form-control kodNegara" name="kodNegara" readonly>
                                        </div>
                                        @error('KodNegara')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    {{-- KOD STATE --}}
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><i>STATE</i></label>
                                        <div class="col-sm-8">
                                        <select class="form-control append-selectedDisabledOption append-kodState" name="kodState" required>
                                            {{-- @foreach($kodState as $kodState)
                                                <option class="form-control" required>{{$kodState->Kod_State}}</option>
                                            @endforeach --}}
                                        </select>
                                        </div>
                                        @error('kodState')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- KOD INSTITUSI --}}
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">KOD INSTITUSI</label>
                                        <div class="col-sm-8">
                                            <input class="form-control kodInstitusi" name="kodInstitusi" readonly>
                                        </div>
                                        @error('kodState')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- NAMA STATE --}}
                                    <div class="form-group row">
                                        <label for="NamaInstitusi" class="col-sm-2 col-form-label">NAMA INSTITUSI</label>
                                            <div class="col-sm-8">
                                                <input class="form-control NamaInstitusi" name="namaInstitusi" type="text" minlength="1" required>
                                            </div>
                                            @error('NamaInstitusi')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    
                                    {{-- STATUS KEAKTIFAN --}}
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-2 col-form-label">STATUS</label>
                                            {{-- <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn btn-outline" name="statusKeaktifan" id="btnradio1" value="1" autocomplete="off" checked>
                                                <label class="btn" for="btnradio1">AKTIF</label>
                                                <input type="radio" class="btn btn-outline" name="statusKeaktifan" id="btnradio2" value="0" autocomplete="off">
                                                <label class="btn" for="btnradio2">TIDAK AKTIF</label>
                                            </div> --}}
                                            <div class="col-sm-8">
                                                <select class="form-control" name="statusKeaktifan" required>
                                                    <option selected disabled></option>
                                                    <option value="1">AKTIF</option>
                                                    <option value="0">TIDAK AKTIF</option>
                                                </select>
                                            </div>
                                            @error('status')
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

    {{-- <div class="form-group row">
    <label for="CAPAIAN" class="col-sm-3 col-form-label">TAHAP CAPAIAN</label>
    <div class="col-sm-4">
    <select name="KodCapaian" class="form-control" required> --}}

    {{-- <option value="">Sila Pilih Negara</option>--}}
    {{-- @foreach ($KodCapai as $level)

    <option value="{{ $level->Kod_Capaian }}">{{ $level->Keterangan}}</option>

    @endforeach --}}
    {{-- </select>
    </div>
    </div>
    <div class="form-group row">
    <label for="NEGARA" class="col-sm-3 col-form-label">NEGARA</label>
    <div class="col-sm-6">
    <select name="Kod_Negara" class="form-control"> --}}

    {{-- <option value="">Sila Pilih Negara</option>--}}
    {{-- @foreach ($negara as $country)

    <option value="{{ $country->Kod_Negara }}">{{ $country->Keterangan}}</option>

    @endforeach --}}
    {{-- </select> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- <div class="form-group row"> --}}
    {{-- <label for="Kod_Status" class="col-sm-3 col-form-label">STATUS</label>
    <div class="col-md-4">
    <select name="Kod_Status" class="form-control" required> --}}
    {{-- <option value="{{ $pelajar->Kod_IPT }}">{{ $pelajar->ipt->NAMA_IPT}} - (current)</option> --}}
    {{-- <option value="">Sila Pilih Status Pengguna</option>
    <option value="1">Aktif</option>
    <option value="0">Tidak Aktif</option>
    </select>
    </div>
    </div> --}}
                        <div class="col text-center">
                            <input class="btn btn-secondary" type="reset" value="Reset">
                            <a href="{{Route('institusi.senarai')}}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Daftar Institusi</button>
                        </div>
                        </form>
    </div>
    </div>
</div>

<script>

$('.negara').on('change', function()
{
    var kodNegara = $('.negara').val();
    $('.kodNegara').val(kodNegara);
    
    $.get('{{Route("populateKodState")}}', {'kodNegara':kodNegara}, function(response)
    {
        $('.append-kodState').empty();

        var selectedDisabledOption = '<option selected disabled>--Sila Pilih--</option>';
        $('.append-selectedDisabledOption').append(selectedDisabledOption);

        $.each(response.kodState, function()
        {
            var kod = this.Kod_State;
            var namaState = this.NamaState;

            var option = '<option value="'+kod+'">'+namaState+' ('+kod+')</option>';
            $('.append-kodState').append(option);
        });
    });
});

$('.append-kodState').on('change', function()
{
    var kodState = $('.append-kodState').val();

    $.get('{{Route("populateKodInstitusi")}}',{'kodState':kodState}, function(kodBaruTambahSatu)
    {
        if(kodBaruTambahSatu < 10)
        {
            var digitKodInstitusiBaru = '0'+kodBaruTambahSatu;
        }
        else
        {
            var digitKodInstitusiBaru = kodBaruTambahSatu;
        }     
        $('.kodInstitusi').val(kodState+digitKodInstitusiBaru);
    });    
});

// $('.negara').on('change', function()
// {
//     // var kodNegara = $('.kodNegara').val();
//     // var input = '<input class="form-control col-sm-12" type="text" name="nama[]" value="'+kodNegara+'" readonly>'; 
//     // $('.append-kodState').empty();
//     // $('.append-kodState').append(input);
//     $('.namaState').prop("disabled", false);

//     // console.log(kodNegara);
//     $('.namaState').on('change', function()
//     {
//         var kodNegara = $('.kodNegara').val();
//         // var input = '<input class="form-control kodState col-sm-12" type="text" name="nama[]" value="'+kodNegara+'" readonly>';         
//         // $('.append-kodState').empty();
//         // $('.append-kodState').append(input);

//         $.get('{{route("populateKodNegara")}}', {'kodNegara':kodNegara},function(nomborKodState)
//         {
//             if(nomborKodState < 10)
//             {
//                 var nomborKodState = '0'+nomborKodState;
//             }
//             else
//             {
//                 var nomborKodState = nomborKodState;
//             }
            
//             var input = '<input class="form-control kodState col-sm-12" type="text" name="kodState" value="'+kodNegara+''+nomborKodState+'" readonly>';         
//             $('.append-kodState').empty();
//             $('.append-kodState').append(input);
//         });
//     });
// });

</script>



@endsection