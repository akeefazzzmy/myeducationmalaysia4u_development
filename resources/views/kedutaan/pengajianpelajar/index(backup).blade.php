@extends('layouts.kedutaan.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Pengajian Pelajar</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Maklumat Pelajar</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-flag"></i></div>Pengajian Pelajar</li>
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
                    <div class="card-header">
                        {{ __('Pengajian Pelajar') }}

                        <div class="float-right">
                        </div>                        
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label><h3>Negara {{$user->negara->keterangan}}</h3></label>
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <div class="float-right">
                                <form action="{{route('kedutaan-pengajianpelajar:index')}}" method="GET">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" value="{{request()->get('search')}}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><div class="sb-nav-link-icon"><i class="fa fa-search"></i></div></button>
                                        </div>
                                        <div class="input-group-append">
                                            <a href="{{route('kedutaan-pengajianpelajar:index')}}" class="btn btn-link"><div class="sb-nav-link-icon"><i class="fa fa-undo"></i></div></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table">
                            <tr>
                                <th>Bil</th>
                                <th>Pelajar</th>
                                <th>Butiran Pengajian</th>
                                <th>
                                    Tindakan
                                    {{-- <a href="{{route('em-pengajianpelajar:create')}}"><i class="fa fa-plus-circle"></i></a> --}}
                                    {{-- <a href="{{route('em-pengajianpelajar:index')}}"><i class="fa fa-undo"></i></a> --}}
                                </th>                                                   
                            </tr>

                            @foreach($senaraiPengajianPelajar as $key => $pengajianPelajar)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    {{$pengajianPelajar->profil_pelajar->users->name}}<br>
                                    {{$pengajianPelajar->profil_pelajar->users->no_kp}}
                                </td>
                                <td>
                                    {{$pengajianPelajar->institusi->keterangan}}<br>
                                    {{$pengajianPelajar->tahap_pengajian->keterangan}}<br>
                                    {{$pengajianPelajar->bidang->nama_bidang}}<br>
                                    ({{$pengajianPelajar->program_pengajian->keterangan}})<br>
                                    {{Carbon\Carbon::parse($pengajianPelajar->tarikh_mula)->format('d/m/Y')}} - {{Carbon\Carbon::parse($pengajianPelajar->tarikh_tamat)->format('d/m/Y')}}
                                    {{-- {{\Carbon\Carbon::parse($pengajian->tarikh_mula)->format('d/m/Y')}} --}}
                                </td>
                                <td>
                                    <a href="{{route('kedutaan-pengajianpelajar:edit', ['pengajianpelajar'=>$pengajianPelajar, 'negarapengajian'=>$pengajianPelajar->kod_negara])}}" class="btn btn-success">Kemaskini</a>
                                </td>
                            </tr>                                
                            @endforeach                            
                        </table>
                        {{$senaraiPengajianPelajar->links()}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection