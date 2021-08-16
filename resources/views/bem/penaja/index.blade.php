@extends('layouts.bem.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Senarai Penaja</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-donate"></i></div>Senarai Penaja</li>
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
                        {{ __('Senarai Penaja') }}
                        <div class="float-right">
                            <form action="{{route('bem-penaja:index')}}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" value="{{request()->get('search')}}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><div class="sb-nav-link-icon"><i class="fa fa-search"></i></div></button>
                                        {{-- <a href="{{route('bem-penaja:create')}}" class="btn btn-light">Create</a> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Bil</th>
                                    <th>Kod Penaja</th>
                                    <th>Singkatan</th>
                                    <th>Penaja</th>
                                    <th>
                                        <div class="float-left">
                                            <div class="sb-nav-link-icon">
                                                Tindakan
                                                <a href="{{route('bem-penaja:create')}}"><i class="fa fa-plus-circle"></i></a>
                                                <a href="{{route('bem-penaja:index')}}"><i class="fa fa-undo"></i></a>
                                            </div>
                                        </div>
                                    </th>
                                                       
                                </tr>
                                @foreach($senaraiPenaja as $key=>$penaja) 
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$penaja->kod_penaja}}</td>
                                    <td>{{$penaja->singkatan}}</td>
                                    <td>{{$penaja->keterangan}}</td>
                                    <td>
                                        <a href="{{route('bem-penaja:show', $penaja)}}" class="btn btn-primary">Show</a>
                                        <a href="{{route('bem-penaja:edit', $penaja)}}" class="btn btn-success">Edit</a>
                                        <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="{{route('bem-penaja:destroy', $penaja)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            {{$senaraiPenaja->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
