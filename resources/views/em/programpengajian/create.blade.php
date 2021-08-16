@extends('layouts.em.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Daftar Program Pengajian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengajian Pelajar</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-certificate"></i></div><a href="{{route('em-programpengajian:index')}}">Program Pengajian</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-plus-circle"></i></div>Daftar Program Pengajian</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Program Pengajian') }}</div>                

                    <div class="card-body">
                        <form action="{{route('em-programpengajian:store')}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label>Kod Program Pengajian</label>
                                <input type="text" name="kod" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama Program Pengajian</label>
                                <input type="text" name="nama" class="form-control">
                            </div> 
                            <div class="form-group">
                                <label>Tahap Pengajian</label>
                                <select name="tahapPengajian" class="form-control">
                                    @foreach($senaraiTahapPengajian as $key => $tahapPengajian)
                                        <option value="{{$tahapPengajian->id}}">{{$tahapPengajian->keterangan}}</option>
                                    @endforeach
                                </select>
                            </div> 
                            <div class="form-group">
                                <label>Institusi Pengajian</label>
                                <select name="institusi" class="form-control">
                                    @foreach($senaraiInstitusi as $key => $institusi)
                                        @if($institusi->states->liputan_em->em_id == auth()->user()->em_id)
                                            <option value="{{$institusi->id}}">{{$institusi->keterangan}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>                        
                            <div class="form-group">
                                <a href="{{route('em-programpengajian:index')}}" class="btn btn-secondary">Kembali</a>
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