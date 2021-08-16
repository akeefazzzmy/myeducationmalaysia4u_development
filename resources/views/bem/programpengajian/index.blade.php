@extends('layouts.bem.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Program Pengajian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-certificate"></i></div>Program Pengajian</li>
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
                        {{ __('Program Pengajian') }}

                        <div class="float-right">
                            {{-- <form action="{{route('Program Pengajian:index')}}" method="GET">
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
                        {{ __('Program Pengajian') }} <a href="{{route('bem-programpengajian:create')}}" class="btn btn-light">Create</a>

                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Bil</th>
                                    <th>Kod</th>
                                    <th>Institusi</th>
                                    <th>Tahap</th>
                                    <th>Program</th>
                                    <th>Tindakan</th>
                                @foreach($programpengajian as $key=>$program)                        
                                </tr>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$program->kod_program_pengajian}}</td>
                                    <td>{{$program->institusi->keterangan}}</td>
                                    <td>{{$program->tahap_pengajian->keterangan}}</td>
                                    <td>{{$program->keterangan}}</td>
                                    <td>
                                        <a href="{{route('bem-programpengajian:show', $program)}}" class="btn btn-primary">Show</a>
                                        <a href="{{route('bem-programpengajian:edit', $program)}}" class="btn btn-success">Edit</a>
                                        <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="{{route('bem-programpengajian:destroy', $program)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            {{-- {{$penajas->links()}} --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
