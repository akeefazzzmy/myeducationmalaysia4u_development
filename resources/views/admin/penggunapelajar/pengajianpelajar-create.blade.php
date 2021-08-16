@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Daftar Pengajian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Maklumat</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-book-reader" aria-hidden="true"></i></div><a href="{{route('pelajar-pengajianpelajar:index')}}">Butiran Pengajian</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-plus-circle"></i></div>Daftar Maklumat Pengajian</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Pengajian') }}</div>                

                    <div class="card-body">                        
                        <form action="{{route('pelajar-pengajianpelajar:store')}}" method="POST" enctype="multipart/form-data">@csrf
                            {{-- <input class="form-control" name="profilPelajarID" value="{{$user->profil_pelajar->id}}" hidden> --}}
                            <div class="form-group">
                                <div class="row">
                                    <h1>Institusi</h1>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Negara Pengajian :</label>
                                        <select name="negara" class="form-control negara">
                                            <option selected disabled>Sila pilih negara pengajian</option>
                                            @foreach($senaraiNegara as $key => $negara)
                                            <option value="{{$negara->kod_negara}}">{{$negara->keterangan}}</option>                                               
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label><i>State</i> Pengajian :</label>
                                        <select name="state" class="form-control states" disabled>
                                            <option>Sila pilih negara pengajian</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Institusi Pengajian :</label>
                                        <select name="institusiPengajian" class="form-control institusiPengajian" disabled>
                                            <option>Sila pilih <i>state</i> pengajian</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="bidangDiv" hidden>
                                <div class="form-group">
                                    <div class="row">
                                        <h1>Bidang</h1>                                    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Tahap Pengajian :</label>
                                            <select name="tahapPengajian" class="form-control tahapPengajian" hidden>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label>Bidang Pengajian :</label>
                                            <select name="bidangPengajian" class="form-control bidangPengajian" hidden disabled>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Program Pengajian :</label>
                                            <select name="programPengajian" class="form-control programPengajian" hidden></select>
                                        </div>
                                        <div class="col-3 tarikh tarikhMula" hidden>
                                            <label>Tarikh Mula :</label>
                                            <input type="date" name="tarikhMulaPengajian" class="form-control">
                                        </div>
                                        <div class="col-3 tarikh tarikhTamat" hidden>
                                            <label>Tarikh Tamat :</label>
                                            <input type="date" name="tarikhTamatPengajian" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">

                                </div>
                            </div>

                            <div class="form-group">
                                <a href="{{route('admin-penggunaPelajar:cariPelajarKp-get', $no_kp)}}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary buttonDaftar" disabled>Daftar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.negara').on('change', function()
    {
        var kod_negara = $('.negara').val();
        // console.log(kod_negara);
        $('.states').empty();
        // $('.states').prop('disabled', false);
        $('.states').prop('disabled', false);
        $('.states').prepend('<option selected disabled="disabled">Sila pilih <i>state</i> pengajian</option>');

        $.get('{{route("admin-populateNegaraToStates")}}', {'kod_negara':kod_negara}, function(response)
        {
            console.log(response);
            
            $.each(response, function()
            {
                // console.log(this);
                var kod_state = this.kod_states;
                var nama_state = this.keterangan;
                // console.log(nama_state);

                var states = '<option value="'+kod_state+'">'+nama_state+'</option>';
                $('.states').append(states);
            });
        });
    });

    $('.states').on('change', function()
    {
        var kod_state = $('.states').val();
        // console.log(kod_state);

        $('.institusiPengajian').empty();
        // $('.institusiPengajian').prop('disabled', false);
        $('.institusiPengajian').prop('disabled', false);
        $('.institusiPengajian').prepend('<option selected disabled="disabled">Sila pilih institusi pengajian</option>');

        $.get('{{route("pelajar-populateStatesToInstitusi")}}', {'kod_state': kod_state}, function(response)
        {
            // console.log(response);
            $.each(response, function()
            {
                var institusi_id = this.id;
                var nama_institusi = this.keterangan;
                var kod_institusi = this.kod_institusi;

                var institusiPengajian = '<option name="institusiPengajianID" value="'+institusi_id+'">'+nama_institusi+'</option>';
                $('.institusiPengajian').append(institusiPengajian);
            });
        });

    });

    $('.institusiPengajian').on('change', function()
    {
        $('.tahapPengajian').prop('hidden', false);
        // $('.tahapPengajian').prepend('<option selected disabled="disabled">Sila pilih tahap pengajian</option>');
        $('.bidangDiv').prop('hidden', false);
    });

    $('.tahapPengajian').on('change', function()
    {
        $('.bidangPengajian').prop('disabled', false);
        $('.bidangPengajian').prop('hidden', false);
        // $('.bidangPengajian').empty();
        // $('.bidangPengajian').prepend('<option selected disabled="disabled">Sila pilih bidang pengajian</option>');
    });

    $('.bidangPengajian').on('change', function()
    {
        $('.programPengajian').empty();
        $('.programPengajian').prepend('<option selected disabled="disabled">Sila pilih program pengajian</option>');
        $('.programPengajian').prop('hidden', false);

        var kod_bidang = $('.bidangPengajian').val();        

        $.get('{{route("pelajar-populateBidangToProgram")}}', {'kod_bidang':kod_bidang}, function(response)
        {
            $.each(response, function()
            {
                // console.log(this);

                var program_pengajian_id = this.id;
                var namaProgramPengajian = this.keterangan;

                var optionProgramPengajian = '<option name="programPengajian" value="'+program_pengajian_id+'">'+namaProgramPengajian+'</option>';
                $('.programPengajian').append(optionProgramPengajian);
            });
        });
    });

    $('.programPengajian').on('change', function()
    {
        $('.tarikh').prop('hidden', false);
    });

    $('.tarikhTamat').on('change', function()
    {
        $('.buttonDaftar').prop('disabled', false);
    });
</script>
@endsection