@extends('layouts.kedutaan.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Pengajian Pelajar</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Maklumat Pelajar</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-flag"></i></div>Pengajian Pelajar</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-flag"></i></div>Kemaskini</li>
    </ol>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h2>{{ __('Maklumat Pengajian') }}</h2></div>              

                    <div class="card-body">
                        <form method="POST">@csrf
                        
                            <div class="form-group">
                                <div class="row">
                                    <label>
                                        <h3>
                                            {{-- {{$pengajianpelajar->profil_pelajar->users->name}}<br>
                                            {{$pengajianpelajar->profil_pelajar->users->no_kp}} --}}
                                        </h3>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label><h3>Institusi Pengajian</h3></label>
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="row"> 
                                {{-- <div class="col-3">
                                    <label>Negara</label>
                                    <select class="form-control negara" name="negara">
                                        <option value="{{$pengajianpelajar->institusi->states->negara->kod_negara}}">{{$pengajianpelajar->institusi->states->negara->keterangan}}</option>
                                        <option disabled>---</option>
                                        @foreach($senaraiNegara as $key => $negara)
                                            <option value="{{$negara->kod_negara}}">{{$negara->keterangan}}</option>
                                        @endforeach                                    
                                    </select>
                                </div> --}}
                                <div class="col-3">
                                    <label><i>State</i></label>                                
                                    <select class="form-control state" name="state">
                                        <option value="{{$pengajianpelajar->institusi->states->kod_states}}" selected>{{$pengajianpelajar->institusi->states->keterangan}}</option>
                                        <option disabled>---</option>
                                        @foreach($senaraiState as $key => $state)
                                            <option value="{{$state->kod_states}}">{{$state->keterangan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label>Institusi Pengajian</label>
                                    <select class="form-control institusi" name="institusi">
                                        <option value="{{$pengajianpelajar->institusi->id}}" selected>{{$pengajianpelajar->institusi->keterangan}}</option>
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
                                                <option value="{{$pengajianpelajar->tahap_pengajian->id}}" selected>{{$pengajianpelajar->tahap_pengajian->keterangan}}</option>
                                                <option disabled>---</option>
                                            @foreach($senaraiTahapPengajian as $key => $tahapPengajian)
                                                <option value="{{$tahapPengajian->id}}">{{$tahapPengajian->keterangan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>Bidang</label>
                                        <select class="form-control bidangPengajian" name="bidangPengajian">
                                                <option value="{{$pengajianpelajar->bidang->kod_bidang}}" selected>{{$pengajianpelajar->bidang->nama_bidang}}</option>
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
                                            <option value="{{$pengajianpelajar->program_pengajian->id}}" selected>{{$pengajianpelajar->program_pengajian->keterangan}}</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Tarikh Mula</label>
                                                <input name="tarikh_mula" type="date" class="form-control" value="{{$pengajianpelajar->tarikh_mula}}">
                                            </div>
                                            <div class="col-6">
                                                <label>Tarikh Tamat</label>
                                                <input name="tarikh_tamat" type="date" class="form-control" value="{{$pengajianpelajar->tarikh_tamat}}">
                                            </div>
                                        </div>
                                    </div>                                
                                </div>                            
                            </div>                           
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        {{-- <a href="{{route('pelajar-pengajianpelajar:show', $pengajian)}}" class="btn btn-secondary">Kembali</a> --}}
                                        {{-- <a href="#" class="btn btn-secondary">Kembali</a> --}}
                                        <a href="{{route('kedutaan-pengajianpelajar:indexShow', $negarapengajian)}}" class="btn btn-secondary">Kembali</a>
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

    $('.state').on('change', function()
    {
        var kod_state = $('.state').val();
        // console.log(kod_state);
        $('.institusi').empty();
        $('.institusi').prepend('<option selected disabled="disabled">Sila pilih institusi pengajian</option>');

        $.get('{{route("kedutaan-populateStatesToInstitusi")}}', {'kod_state':kod_state}, function(response)
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
        var kod_bidang = $('.bidangPengajian').val();
        // console.log(kod_bidang);
        $('.programPengajian').empty();
        $('.programPengajian').prepend('<option selected disabled="disabled">Sila pilih program pengajian</option>');
        $.get('{{route("kedutaan-populateBidangToProgram")}}', {'kod_bidang':kod_bidang}, function(response)
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