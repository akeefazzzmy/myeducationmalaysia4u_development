@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Senarai Pengguna</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Kod</li>
        <li class="breadcrumb-item active">Senarai Pengguna</li>
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
                        {{ __('Pengguna') }}

                        <div class="float-right">
                            {{-- <form action="{{route('Pengguna:index')}}" method="GET">
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
                        {{ __('Pengguna index') }} <a href="{{route('admin-users:create')}}" class="btn btn-light">Create</a>

                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Bil</th>
                                    <th>KP</th>
                                    <th>Capaian</th>
                                    <th>Nama</th>
                                    <th>EM</th>
                                    <th>Status</th>
                                    <th>Tindakan</th>
                                @foreach($users as $key=>$user)                        
                                </tr>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->no_kp}}</td>
                                    <td>{{$user->capaian->keterangan}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->em->kod_em}}</td>
                                    <td>{{$user->status_users->keterangan}}</td>
                                    <td>
                                        <a href="{{route('admin-users:show', $user)}}" class="btn btn-primary">Show</a>
                                        <a href="{{route('admin-users:edit', $user)}}" class="btn btn-success">Edit</a>
                                        <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="{{route('admin-users:destroy', $user)}}" class="btn btn-danger">Delete</a>
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
