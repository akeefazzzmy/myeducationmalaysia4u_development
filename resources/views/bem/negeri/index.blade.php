@extends('layouts.bem.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Negeri</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-flag"></i></div>Negeri</li>
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
                        {{ __('Negeri') }}

                        <div class="float-right">
                            <form action="{{route('bem-negeri:index')}}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" value="{{request()->get('search')}}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><div class="sb-nav-link-icon"><i class="fa fa-search"></i></div></button>
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
                                    <th>Kod</th>
                                    <th>Nama</th>
                                    <th>
                                        <div class="float-left">
                                            <div class="sb-nav-link-icon">
                                                Tindakan
                                                <a href="{{route('bem-negeri:create')}}"><i class="fa fa-plus-circle"></i></a>
                                                <a href="{{route('bem-negeri:index')}}"><i class="fa fa-undo"></i></a>
                                            </div>
                                        </div>
                                    </th>                                                  
                                </tr>
                                @foreach($senaraiNegeri as $key=>$negeri)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$negeri->kod_negeri}}</td>
                                    <td>{{$negeri->keterangan}}</td>
                                    <td>
                                        <a href="{{route('bem-negeri:show', $negeri)}}" class="btn btn-primary">Show</a>
                                        <a href="{{route('bem-negeri:edit', $negeri)}}" class="btn btn-success">Edit</a>
                                        <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="{{route('bem-negeri:destroy', $negeri)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            {{$senaraiNegeri->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
