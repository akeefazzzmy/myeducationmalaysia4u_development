@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Status Pengguna</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-info-circle"></i></div>Status Pengguna</li>
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
                        {{ __('Status Pengguna') }}

                        <div class="float-right">
                            {{-- <form action="{{route('Status Pengguna:index')}}" method="GET">
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
                        {{ __('Status Pengguna index') }} <a href="{{route('admin-statusUsers:create')}}" class="btn btn-light">Create</a>

                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Bil</th>
                                    <th>Kod</th>
                                    <th>Status</th>
                                    <th>Tindakan</th>
                                @foreach($statusUsers as $key=>$status)                        
                                </tr>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$status->kod_status}}</td>
                                    <td>{{$status->keterangan}}</td>
                                    <td>
                                        <a href="{{route('admin-statusUsers:show', $status)}}" class="btn btn-primary">Show</a>
                                        <a href="{{route('admin-statusUsers:edit', $status)}}" class="btn btn-success">Edit</a>
                                        <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="{{route('admin-statusUsers:destroy', $status)}}" class="btn btn-danger">Delete</a>
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
