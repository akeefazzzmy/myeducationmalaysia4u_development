@extends('layouts.admin.main')
@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Kemaskini Maklumat Pengajian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-search"></i></div>Carian Pelajar</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-id-card"></i></div><a href="{{route('admin-carianPelajar-noKP:index')}}">Nombor KP</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div><a href="{{route('admin-carianPelajar-noKP:showGet', $pelajar)}}">Papar</a></li>
        {{-- <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div><a href="#">Papar</a></li> --}}
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-edit"></i></div>Kemaskini Maklumat Pengajian</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                @if(session()->has('alert-message'))
                    <div class="alert {{session()->get('alert-type')}}">
                        {{session()->get('alert-message')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header"><h2>{{ __('Maklumat Pengajian') }}</h2></div>              

                    <div class="card-body">
                        <form method="POST">@csrf                        
                            <div class="form-group">
                                <div class="row">
                                    <label><h3>Institusi Pengajian</h3></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row"> 
                                    <div class="col-3">
                                        <label>Negara</label>
                                        <select class="form-control negara" name="negara">
                                            <option value="{{$pengajian->institusi->states->negara->kod_negara}}" selected>{{$pengajian->institusi->states->negara->keterangan}}</option>
                                            <option disabled>---</option>
                                            @foreach($senaraiNegara as $key => $negara)
                                                <option value="{{$negara->kod_negara}}">{{$negara->keterangan}}</option>
                                            @endforeach                                    
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label><i>State</i></label>                                
                                        <select class="form-control state" name="state">
                                            <option value="{{$pengajian->institusi->states->kod_states}}" selected>{{$pengajian->institusi->states->keterangan}}</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>Institusi Pengajian</label>
                                        <select class="form-control institusi" name="institusi">
                                            <option value="{{$pengajian->institusi->id}}" selected>{{$pengajian->institusi->keterangan}}</option>
                                        </select>
                                    </div>                                                        
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label><h3>Bidang Pengajian</h3></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Tahap Pengajian :</label>
                                        <select class="form-control" name="tahapPengajian">
                                                <option value="{{$pengajian->tahap_pengajian->id}}" selected>{{$pengajian->tahap_pengajian->keterangan}}</option>
                                                <option disabled>---</option>
                                            @foreach($senaraiTahapPengajian as $key => $tahapPengajian)
                                                <option value="{{$tahapPengajian->id}}">{{$tahapPengajian->keterangan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>Bidang</label>
                                        <select class="form-control bidangPengajian" name="bidangPengajian">
                                                <option value="{{$pengajian->bidang->kod_bidang}}" selected>{{$pengajian->bidang->nama_bidang}}</option>
                                                <option disabled>---</option>
                                            @foreach($senaraiBidang as $key => $bidang)
                                                <option value="{{$bidang->kod_bidang}}">{{$bidang->nama_bidang}}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                </div>                            
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Program</label>
                                        <select class="form-control programPengajian" name="programPengajian">
                                            <option value="{{$pengajian->program_pengajian->id}}" selected>{{$pengajian->program_pengajian->keterangan}}</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Tarikh Mula</label>
                                                <input name="tarikh_mula" type="date" class="form-control" value="{{$pengajian->tarikh_mula}}">
                                            </div>
                                            <div class="col-6">
                                                <label>Tarikh Tamat</label>
                                                <input name="tarikh_tamat" type="date" class="form-control" value="{{$pengajian->tarikh_tamat}}">
                                            </div>
                                        </div>
                                    </div>                                
                                </div>                            
                            </div>                           
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="{{route('admin-carianPelajar-noKP:showGet', $pelajar)}}" class="btn btn-secondary">Kembali</a>
                                        <button type="submit" class="btn btn-success">Kemaskini</button>
                                    </div>
                                </div>
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
        // console.log(negara);
        $('.state').empty();
        $('.state').prepend('<option selected disabled="disabled">Sila pilih <i>state</i> pengajian</option>');
        $('.institusi').empty();
        $('.institusi').prepend('<option selected disabled="disabled">Sila pilih institusi pengajian</option>');

        $.get('{{route("admin-populateNegaraToStates")}}', {'kod_negara' : kod_negara}, function(response)
        {
            // console.log(response);
            $.each(response, function()
            {
                // console.log(this);
                var kod_state= this.kod_states;
                var nama_state= this.keterangan;
                var optionState= '<option value="'+kod_state+'">'+nama_state+'</option>';
                $('.state').append(optionState);
            });
        });
    });

    $('.state').on('change', function()
    {
        var kod_state = $('.state').val();
        // console.log(kod_state);
        $('.institusi').empty();
        $.get('{{route("admin-populateStatesToInstitusi")}}', {'kod_state':kod_state}, function(response)
        {
            $.each(response, function()
            {
                // console.log(response);
                var institusi_id= this.id;
                var nama_institusi = this.keterangan;
                var optionInstitusi = '<option value="'+institusi_id+'">'+nama_institusi+'</option>';
                $('.institusi').append(optionInstitusi);
            });
        });
    });

    $('.bidangPengajian').on('change', function()
    {
        $('.programPengajian').empty();
        $('.programPengajian').prepend('<option selected disabled="disabled">Sila pilih program pengajian</option>');
        var kod_bidang = $('.bidangPengajian').val();
        $.get('{{route("admin-populateBidangToProgram")}}', {'kod_bidang':kod_bidang}, function(response)
        {
            // console.log(response);
            $.each(response, function()
            {
                // console.log(this);
                var program_pengajian_id = this.id;
                var namaProgramPengajian = this.keterangan;

                var optionProgramPengajian = '<option value="'+program_pengajian_id+'">'+namaProgramPengajian+'</option>';
                $('.programPengajian').append(optionProgramPengajian);
            });
        });
    });

</script>

@endsection