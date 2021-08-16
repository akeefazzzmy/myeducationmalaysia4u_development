@extends('layouts.pelajar.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Kemaskini Maklumat Penginapan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Maklumat</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-book-reader" aria-hidden="true"></i></div><a href="{{route('pelajar-pengajianpelajar:index')}}">Butiran Pengajian</a></li>
        {{-- <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye" aria-hidden="true"></i></div><a href="{{route('pelajar-pengajianpelajar:show', $pengajian->id)}}">Papar Maklumat Pengajian</a></li> --}}
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye" aria-hidden="true"></i></div><a href="{{route('pelajar-pengajianpelajar:show', $pelajarID)}}">Papar Maklumat Pengajian</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-edit"></i></div>Kemaskini Maklumat Penginapan</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{ __('Maklumat Penginapan') }}</h2></div>              

                    <div class="card-body">
                        <form method="POST">@csrf
                            <input name="alamatPenginapanPengajianID" value="{{$alamat->id}}" hidden>
                            <div class="form-group">
                                <div class="row">
                                    <label><h3>Alamat Penuh</h3></label>
                                    <div class="col-12">
                                        <textarea class="form-control" name="alamat" value="{{$alamat->alamat_penuh}}">{{$alamat->alamat_penuh}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label><h3><i>State</i></h3></label>
                                        <select class="form-control" name="state">
                                                <option value="{{$alamat->states_id}}" selected>{{$alamat->states->keterangan}}</option>
                                                <option disabled></option>
                                            @foreach($states as $key=>$state)
                                                <option value="{{$state->id}}">{{$state->keterangan}} : {{$state->negara->keterangan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="{{route('pelajar-pengajianpelajar:show', $pelajarID)}}" class="btn btn-secondary">Kembali</a>
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
@endsection