@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Papar Bidang Pengajian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-book"></i></div><a href="{{route('admin-bidangpengajian:index')}}">Bidang Pengajian</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div>Papar Bidang Pengajian</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Kod Bidang Pengajian') }} : {{$bidang->kod_bidang}}</div>
                    <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    {{-- <div class="col-2">
                                        <label>Kod</label>
                                        <input type="text" name="kod" class="form-control" value="{{$bidang->kod_negara}}" readonly>
                                    </div> --}}
                                    <div class="col-4">
                                        <label>Bidang Pengajian</label>
                                        <input type="text" name="nama" class="form-control" value="{{$bidang->nama_bidang}}" readonly>
                                    </div>
                                    {{-- <div class="col-4">
                                        <label>Tarikh Diwujudkan</label>
                                        <input class="form-control" value="{{$bidang->created_at->format('d/m/Y')}}" readonly>
                                    </div>
                                    <div class="col-4">
                                        <label>Tarikh Dikemaskini</label>
                                        <input class="form-control" value="{{$bidang->updated_at->format('d/m/Y')}}" readonly>
                                    </div> --}}
                                    <div class="col-4">
                                        <label>Narrow Field</label>
                                        <input class="form-control" value="{{$bidang->narrow_field}}" readonly>
                                    </div>
                                    <div class="col-4">
                                        <label>Broad Field</label>
                                        <input class="form-control" value="{{$bidang->broad_field}}" readonly>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <table class="table">
                                    <label>Senarai Pelajar</label>
                                    <tr>
                                        <th>Bil</th>
                                        <th>Pelajar</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div> --}}
                            <div class="form-group">
                                <a href="{{route('admin-bidangpengajian:index')}}" class="btn btn-secondary">Kembali</a>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection