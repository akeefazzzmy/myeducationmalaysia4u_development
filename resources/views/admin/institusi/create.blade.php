@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Daftar Institusi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-university"></i></div><a href="{{route('admin-institusi:index')}}">Senarai Institusi</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-plus-circle"></i></div>Daftar Institusi</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Institusi') }}</div>                

                    <div class="card-body">
                        <form action="{{route('admin-institusi:store')}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Negara</label>
                                        <select class="form-control negara" name="state">
                                            <option selected disabled>Sila pilih negara</option>
                                            @foreach($senaraiNegara as $negara)
                                                <option value="{{$negara->kod_negara}}">{{$negara->kod_negara}} : {{$negara->keterangan}}</option>
                                            @endforeach
                                        <select>
                                    </div>
                                    <div class="col-6">
                                        <label>States</label>                                        
                                            {{-- <input type="text" name="kodState" class="form-control"> --}}
                                            <select name="state" class="form-control states" disabled>
                                                {{-- @foreach($states as $state)
                                                <option value="{{$state->id}}">{{$state->keterangan}}</option>
                                                @endforeach --}}
                                            </select>                                            
                                    </div>
                                    <div class="col-6">
                                        <label>Nama Institusi</label>
                                        <input type="text" name="nama" class="form-control namaInstitusi" disabled>
                                    </div>
                                    {{-- <div class="col-6">
                                        <label>Kod Institusi</label>
                                        <input type="text" name="kod" class="form-control">
                                    </div> --}}
                                </div>
                            </div>                      
                            <div class="form-group">
                                <a href="{{route('admin-institusi:index')}}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary buttonDaftar" disabled>Daftar</button>
                                <a href="{{route('admin-institusi:create')}}" class="btn btn-warning">Reset</a>
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
        $('.states').empty();

        var negara = $('.negara').val();
        $.get('{{route("populateNegaraToState")}}', {'negara' : negara}, function(response)
        {
            $('.states').prepend("<option selected disabled='disabled' value='Hello Me'>Sila Pilih <i>States</i></option>");
            $.each(response, function()
            {
                var kod_state = this.kod_states;
                var state = this.keterangan;
                
                var states = '<option value="'+kod_state+'">'+state+'</option>';
                $('.states').append(states).prop( "disabled", false );
            });
        });        
    });
    $('.states').on('change', function()
    {
        $('.namaInstitusi').prop("disabled", false);
    });
    $('.namaInstitusi').on('change', function()
    {
        $('.buttonDaftar').prop("disabled", false);
    });

</script>
@endsection