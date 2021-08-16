@extends('layouts.pelajar.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Daftar Penaja</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Maklumat</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-book-reader" aria-hidden="true"></i></div><a href="{{route('pelajar-pengajianpelajar:index')}}">Butiran Pengajian</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye" aria-hidden="true"></i></div><a href="{{route('pelajar-pengajianpelajar:show', $pengajian->id)}}">Papar Maklumat Pengajian</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-plus-circle"></i></div>Daftar Maklumat Penaja Pengajian</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Senarai Penaja') }}</div>                

                    <div class="card-body">
                        <form action="{{route('pelajar-penajaPengajianPelajar:store', $pengajian)}}" method="POST" enctype="multipart/form-data">@csrf
                            <input name="pengajianID" value="{{$pengajian->id}}" hidden>
                            <div class="form-group">
                                <label>Penaja</label>
                                <select class="form-control" name="penaja">
                                    @foreach($senaraiPenaja as $key => $penaja)
                                        <option value="{{$penaja->id}}">{{$penaja->keterangan}}</option>
                                    @endforeach
                                </select>
                            </div>
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

@endsection