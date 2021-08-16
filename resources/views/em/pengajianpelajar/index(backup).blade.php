@extends('layouts.em.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Pengajian Pelajar</h1>
    <ol class="breadcrumb mb-4">
        {{-- <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengajian Pelajar</li> --}}
        <li class="breadcrumb-item active">Pengurusan Maklumat</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-certificate"></i></div>Pengajian Pelajar</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session()->has('alert-message'))
                    <div class="alert {{session()->get('alert-type')}}">
                        {{session()->get('alert-message')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        {{ __('Pengajian Pelajar') }}

                        <div class="float-right">
                            {{-- <form action="{{route('Pengajian Pelajar:index')}}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" value="{{request()->get('search')}}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Query</button>
                                    </div>
                                </div>
                            </form> --}}
                        </div>
                        
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label><h3>Negara Bawah Liputan {{$user->em->keterangan}}</h3></label>

                                        <form action="{{route('em-pengajianpelajar:index')}}" method="GET">
                                            <div class="input-group">
                                                {{-- <input type="text" name="search" class="form-control"> --}}

                                                <select class="form-control negara" name="search">
                                                    <option selected disabled></option>
                                                    @foreach($negaraLiputanEm as $key => $negaraLiputan)
                                                    <option value="{{$negaraLiputan->kod_negara}}">{{$negaraLiputan->negara->keterangan??''}}</option>
                                                    @endforeach                                            
                                                </select>
                                                
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit"><div class="sb-nav-link-icon"><i class="fa fa-search"></i></div></button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <table class="table">
                                <tr>
                                    <th>Bil</th>
                                    <th>Pelajar</th>
                                    {{-- <th>Negara</th> --}}
                                    {{-- <th>Institusi</th> --}}
                                    {{-- <th>Tahap Pengajian</th> --}}
                                    <th>Butiran Pengajian</th>
                                    {{-- <th>Bidang</th> --}}
                                    <th>
                                        Tindakan
                                        {{-- <a href="{{route('em-pengajianpelajar:create')}}"><i class="fa fa-plus-circle"></i></a> --}}
                                        <a href="{{route('em-pengajianpelajar:index')}}"><i class="fa fa-undo"></i></a>
                                    </th>
                                                       
                                </tr>
                                @foreach($senaraiPengajianPelajar as $key=>$pengajianPelajar) 
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        {{$pengajianPelajar->profil_pelajar->users->name}}<br>
                                        {{$pengajianPelajar->profil_pelajar->users->no_kp}}
                                    </td>
                                    {{-- <td>{{$pengajianPelajar->liputan_em->negara->keterangan??''}}</td>  --}}
                                    <td>
                                        {{$pengajianPelajar->institusi->keterangan}}<br>
                                        {{$pengajianPelajar->tahap_pengajian->keterangan}}<br>
                                        {{$pengajianPelajar->bidang->nama_bidang}}<br>
                                        ({{$pengajianPelajar->program_pengajian->keterangan}})<br>
                                        {{$pengajianPelajar->tarikh_mula}} - {{$pengajianPelajar->tarikh_tamat}}
                                    </td>  
                                    {{-- <td>{{$pengajianPelajar->tahap_pengajian->keterangan}}</td>   --}}
                                    {{-- <td>{{$pengajianPelajar->bidang->nama_bidang}}</td>                                     --}}
                                    <td>
                                        {{-- <a href="{{route('admin-pengajianpelajar:show', $pengajianPelajar)}}" class="btn btn-primary">Papar</a> --}}
                                        <a href="{{route('em-pengajianpelajar:edit', ['pengajianpelajar' => $pengajianPelajar, 'negarapengajian' => $pengajianPelajar->kod_negara])}}" class="btn btn-success">Kemaskini</a>
                                        {{-- <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="{{route('em-pengajianpelajar:destroy', $pengajianPelajar)}}" class="btn btn-danger">Hapus</a> --}}
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
</div>

<script>
                    
</script>
@endsection
