@extends('layouts.pelajar.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Daftar Alamat Penginapan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Maklumat</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-book-reader" aria-hidden="true"></i></div><a href="{{route('pelajar-pengajianpelajar:index')}}">Butiran Pengajian</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye" aria-hidden="true"></i></div><a href="{{route('pelajar-pengajianpelajar:show', $pengajian->id)}}">Papar Maklumat Pengajian</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-plus-circle"></i></div>Daftar Maklumat Penginapan</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Alamat Penginapan') }}</div>                

                    <div class="card-body">
                        <form action="{{route('pelajar-alamatPenginapanPengajianPelajar:store', $pengajian)}}" method="POST" enctype="multipart/form-data">@csrf
                            <input name="pengajianID" value="{{$pengajian->id}}" hidden>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Alamat Penuh</label>
                                        <textarea class="form-control" name="alamatPenginapanPengajian"></textarea>
                                    </div>
                                    <div class="col-3">
                                        <label><i>Negara</i></label>
                                        <select class="form-control negara" name="negara">
                                            @foreach($senaraiNegara as $negara)
                                                <option value="{{$negara->kod_negara}}">{{$negara->keterangan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label><i>States</i></label>
                                        <select class="form-control state" name="state" disabled>
                                            {{-- @foreach($senaraiStates as $state)
                                                <option value="{{$state->id}}">{{$state->keterangan}} , {{$state->negara->keterangan??''}}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <label><i>States</i></label>
                                <select class="form-control" name="state">
                                    @foreach($senaraiStates as $state)
                                        <option value="{{$state->id}}">{{$state->keterangan}} , {{$state->negara->keterangan??''}}</option>
                                    @endforeach
                                </select>

                            </div> --}}

                            {{-- <div class="form-group">
                                <label>Negara</label>
                                <select class="form-control">
                                    @foreach($senaraiNegara as $negara)
                                        <option>{{$negara->keterangan}}</option>
                                    @endforeach
                                </select>
                            </div>                             --}}
                            <div class="form-group">
                                <a href="{{route('pelajar-pengajianpelajar:show', $pengajian->id)}}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Daftar</button>
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
        $('.state').prop('disabled', false);
        $('.state').empty();

        var kod_negara = $('.negara').val();
        // console.log(negara);
        $.get( '{{route("populateNegaraToState")}}', {'negara' : kod_negara}, function(response)
        {
            // console.log(response);
            $.each(response, function()
            {
                // console.log(this);

                var state_id = this.id;
                var namaSate = this.keterangan;

                var optionState = '<option value="'+state_id+'">'+namaSate+'</option>';
                $('.state').append(optionState);
            });
        });
    });
</script>

@endsection