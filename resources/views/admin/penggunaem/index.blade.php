@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Pegawai EM</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>Pengguna Sistem</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>Pegawai EM</li>
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
                        {{ __('Pegawai EM') }}

                        <div class="float-right">
                            <div class="float-right">
                                <form action="{{route('admin-penggunaEm:index')}}" method="GET">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" value="{{request()->get('search')}}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><div class="sb-nav-link-icon"><i class="fa fa-search"></i></div></button>

                                            {{-- <a href="{{route('admin-penggunaEm:index')}}"><i class="fa fa-undo"></i></a> --}}
                                        </div>
                                        <div class="input-group-append">
                                            <a href="{{route('admin-penggunaEm:index')}}" class="btn btn-link"><div class="sb-nav-link-icon"><i class="fa fa-undo"></i></div></a>
                                            {{-- <a href="{{route('admin-penggunaEm:index')}}"><i class="fa fa-undo"></i></a> --}}
                                        </div>
                                    </div>
                                </form>
                            </div> 
                            {{-- <a href="{{route('admin-penggunaEm:create')}}" class="btn btn-light">Create</a> --}}
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
                                    <th>EM</th>
                                    <th>No KP</th>
                                    <th>Nama</th>
                                    <th>Emel</th>
                                    <th>No Telefon</th>
                                    <th>Status</th>
                                    <th>
                                        <div class="sb-nav-link-icon">
                                            Tindakan <a href="{{route('admin-penggunaEm:create')}}"><i class="fa fa-plus-circle"></i></a>
                                            {{-- <a href="{{route('admin-penggunaEm:create')}}"><i class="fa fa-plus-circle"></i></a>
                                            <a href="{{route('admin-penggunaEm:index')}}"><i class="fa fa-undo"></i></a> --}}
                                            {{-- <div class="input-group-append"> --}}
                                                {{-- <button class="btn btn-light"><div class="sb-nav-link-icon"><a href="{{route('admin-penggunaEm:index')}}"><i class="fa fa-undo"></i></a></div></button> --}}
                                                {{-- <button class="btn btn-light"><div class="sb-nav-link-icon"><a href="{{route('admin-penggunaEm:create')}}"><i class="fa fa-plus-circle"></i></a></div></button> --}}
                                            {{-- </div> --}}
                                        </div>
                                    </th>                       
                                </tr>
                                @foreach($senaraiUserEm as $key=>$userEm)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$userEm->em->keterangan}}</td>
                                    <td>{{$userEm->no_kp}}</td>
                                    <td>{{$userEm->name}}</td>
                                    <td>{{$userEm->email}}</td>
                                    <td>{{$userEm->no_tel}}</td>
                                    <td>{{$userEm->status_users->keterangan}}</td>
                                    <td>
                                        {{-- <a href="#" class="btn btn-primary">Show</a> --}}
                                        <a href="{{route('admin-penggunaEm:edit', $userEm->id)}}" class="btn btn-success">Kemaskini</a>
                                        {{-- <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="#" class="btn btn-danger">Delete</a> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            {{$senaraiUserEm->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
