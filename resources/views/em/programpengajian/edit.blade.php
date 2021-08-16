@extends('layouts.em.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Kemaskini Program Pengajian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengajian Pelajar</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-certificate"></i></div><a href="{{route('em-programpengajian:index')}}">Program Pengajian</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-edit"></i></div>Kemaskini Program Pengajian</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Program Pengajian Edit') }}</div>                

                    <div class="card-body">
                        <form method="POST">@csrf
                            <div class="form-group">
                                <label>Kod</label>
                                <input type="text" name="kod" class="form-control" value="{{$programpengajian->kod_program_pengajian}}" readonly>
                            </div>                        
                            <div class="form-group">
                                {{-- <label>Tahap Pengajian ({{$programpengajian->tahap_pengajian->keterangan}})</label> --}}
                                <label>Tahap Pengajian</label>
                                <select name="tahapPengajian" class="form-control">
                                    @foreach($tahapPengajian as $tahap)
                                    <option value="{{$tahap->id}}">{{$tahap->keterangan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                {{-- <label>Institusi ({{$programpengajian->institusi->keterangan}})</label> --}}
                                <label>Institusi</label>
                                <select name="institusi" class="form-control">
                                    @foreach($senaraiInstitusi as $institusi)
                                        @if($institusi->states->liputan_em->em_id == auth()->user()->em_id)
                                            <option value="{{$institusi->id}}">{{$institusi->keterangan}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Program Pengajian</label>
                                <input type="text" name="nama" class="form-control" value="{{$programpengajian->keterangan}}">
                            </div>
                            <div class="form-group">
                                <a href="{{route('em-programpengajian:index')}}" class="btn btn-secondary">Kembali</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Kemaskini</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection