@extends('layouts.em.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Program Pengajian</h1>
    <ol class="breadcrumb mb-4">
        {{-- <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengajian Pelajar</li> --}}
        <li class="breadcrumb-item active">Pengajian Pelajar</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-certificate"></i></div>Program Pengajian</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                        {{ __('Program Pengajian index') }} <a href="{{route('em-programpengajian:create')}}" class="btn btn-light">Create</a>

                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    {{-- <th>Bil</th> --}}
                                    <th>Kod</th>
                                    <th>Program</th>
                                    <th>Tahap</th> 
                                    <th>Institusi</th>                                                                       
                                    <th>Tindakan</th>                  
                                </tr>
                                @foreach($senaraiProgramPengajian as $key=>$programpengajian)
                                    @if($programpengajian->institusi->states->liputan_em->em_id == auth()->user()->em_id)
                                        <tr>
                                            {{-- <td>{{$key+1}}</td> --}}
                                            <td>{{$programpengajian->kod_program_pengajian}}</td>
                                            <td>{{$programpengajian->keterangan}}</td>
                                            <td>{{$programpengajian->tahap_pengajian->keterangan}}</td>
                                            <td>{{$programpengajian->institusi->keterangan}}</td>                                            
                                            <td>
                                                {{-- <a href="{{route('em-programpengajian:show', $program)}}" class="btn btn-primary">Show</a> --}}
                                                <a href="{{route('em-programpengajian:edit', $programpengajian)}}" class="btn btn-success">Edit</a>
                                                <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="{{route('em-programpengajian:destroy', $programpengajian)}}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endif
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
