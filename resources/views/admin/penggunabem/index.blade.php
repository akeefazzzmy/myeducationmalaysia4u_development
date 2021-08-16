@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Pegawai BEM</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>Pengguna Sistem</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>Pegawai BEM</li>
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
                        {{ __('Pegawai BEM') }}

                        <div class="float-right">
                            {{-- <form action="{{route('Institusi:index')}}" method="GET">
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
                            <table class="table">
                                <tr>
                                    <th>Bil</th>
                                    <th>No KP</th>
                                    <th>Nama</th>
                                    <th>Emel</th>
                                    <th>No Telefon</th>
                                    <th>Status</th>
                                    <th>Tindakan <a href="{{route('admin-penggunaBem:create')}}"><i class="fa fa-plus-circle"></i></a></th>                       
                                </tr>
                                @foreach($senaraiBem as $key=>$bem)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$bem->no_kp}}</td>
                                    <td>{{$bem->name}}</td>
                                    <td>{{$bem->email}}</td>
                                    <td>{{$bem->no_tel}}</td>
                                    <td>{{$bem->status_users->keterangan}}</td>
                                    <td>
                                        {{-- <a href="#" class="btn btn-primary">Show</a> --}}
                                        <a href="{{route('admin-penggunaBem:edit', $bem->id)}}" class="btn btn-success">Kemaskini</a>
                                        {{-- <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="#" class="btn btn-danger">Delete</a> --}}
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
