@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Kedutaan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>Pengguna Sistem</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>Kedutaan</li>
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
                        {{ __('Kedutaan') }}

                        <div class="float-right">
                            <div class="float-right">
                                <form action="{{route('admin-penggunaKedutaan:index')}}" method="GET">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" value="{{request()->get('search')}}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><div class="sb-nav-link-icon"><i class="fa fa-search"></i></div></button>
                                        </div>
                                        <div class="input-group-append">
                                            <a href="{{route('admin-penggunaKedutaan:index')}}" class="btn btn-link"><div class="sb-nav-link-icon"><i class="fa fa-undo"></i></div></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
                                    <th>Negara</th>
                                    <th>No KP</th>
                                    <th>Nama</th>
                                    <th>Emel</th>
                                    <th>No Telefon</th>
                                    <th>Status</th>
                                    <th>
                                        <div class="sb-nav-link-icon">
                                            Tindakan <a href="{{route('admin-penggunaKedutaan:create')}}"><i class="fa fa-plus-circle"></i></a>
                                        </div>
                                    </th>                       
                                </tr>
                                @foreach($senaraiUserKedutaan as $key=>$userKedutaan)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$userKedutaan->negara->keterangan}}</td>
                                    <td>{{$userKedutaan->no_kp}}</td>
                                    <td>{{$userKedutaan->name}}</td>
                                    <td>{{$userKedutaan->email}}</td>
                                    <td>{{$userKedutaan->no_tel}}</td>
                                    <td>{{$userKedutaan->status_users->keterangan}}</td>
                                    <td>
                                        {{-- <a href="{{route('admin-penggunaKedutaan:edit', $userKedutaan->id)}}" class="btn btn-success">Kemaskini</a> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            {{$senaraiUserKedutaan->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
