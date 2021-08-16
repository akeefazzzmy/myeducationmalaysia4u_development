@extends('layouts.kedutaan.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Peribadi Pelajar</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Pelajar</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-flag"></i></div>Peribadi Pelajar</li>
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
                        {{ __('Peribadi Pelajar') }}

                        <div class="float-right">
                        </div>                        
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label><h3>Negara</h3></label>
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
                                <th>Butiran Peribadi</th>
                                <th>
                                    Tindakan
                                </th>                                                   
                            </tr>

                            @foreach($senaraiPelajar as $key => $pelajar)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    {{$pelajar->name}}<br>
                                    {{$pelajar->no_kp}}<br>
                                    {{$pelajar->no_tel}}<br>
                                    {{$pelajar->email}}<br>
                                    {{$pelajar->profil_pelajar->tarikh_lahir}}<br>
                                    {{$pelajar->profil_pelajar->negeriLahir->keterangan}}<br>
                                    {{$pelajar->status_users->keterangan}}
                                </td>
                                <td>
                                    <a href="#" class="btn btn-success">Kemaskini</a>
                                </td>
                            </tr>  
                            @endforeach                    
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection