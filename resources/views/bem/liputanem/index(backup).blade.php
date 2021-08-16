@extends('layouts.bem.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Liputan Education Malaysia</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-globe"></i></div>Liputan Education Malaysia</li>
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
                        {{ __('Liputan Educational Malaysia') }}

                        {{-- <div class="float-right">
                            <form action="{{route('bem-liputanEm:index')}}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" value="{{request()->get('search')}}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><div class="sb-nav-link-icon"><i class="fa fa-search"></i></div></button>
                                    </div>
                                </div>
                            </form>
                        </div> --}}
                        
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
                                    <th>EM</th>
                                    <th>Negara</th>
                                    <th>
                                        <div class="float-left">
                                            <div class="sb-nav-link-icon">
                                                Tindakan
                                                <a href="{{route('bem-liputanEm:create')}}"><i class="fa fa-plus-circle"></i></a>
                                                <a href="{{route('bem-liputanEm:index')}}"><i class="fa fa-undo"></i></a>
                                            </div>
                                        </div>
                                    </th>
                                @foreach($liputanEm as $key=>$liputan)                        
                                </tr>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    {{-- <td>{{$liputan->em_id}}</td> --}}
                                    <td>{{$liputan->em->keterangan}}</td>
                                    <td>{{$liputan->negara->keterangan}}</td>
                                    {{-- <td>{{$liputan->negara->keterangan}}</td> --}}
                                    <td>
                                        <a href="{{route('bem-liputanEm:show', $liputan)}}" class="btn btn-primary">Show</a>
                                        <a href="{{route('bem-liputanEm:edit', $liputan)}}" class="btn btn-success">Edit</a>
                                        <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="{{route('bem-liputanEm:destroy', $liputan)}}" class="btn btn-danger">Delete</a>
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
</div>
@endsection
