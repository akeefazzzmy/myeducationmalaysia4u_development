@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Kemaskini Pelajar</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>Pengurusan Pengguna</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fas fa-user"></i></div><a href="{{route('admin-penggunaPelajar:index')}}">Pelajar</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div>Papar</li>
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
                    <div class="card-header">{{ __('Pelajar') }}</div>                

                    <div class="card-body">
                        {{-- <form method="POST">@csrf --}}
                        {{-- <form action="{{route('admin-penggunaPelajar:cariPelajarKpKemaskini')}}" method="POST"> --}}
                            <div class="form-group">
                                <div class="row">
                                    <h3>Maklumat Akaun Pelajar</h3>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label>No KP</label>
                                        <input type="text" name="no_kp" class="form-control" value="{{$user->no_kp}}" readonly>
                                    </div>
                                    <div class="col-8">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control" value="{{$user->name}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label>Emel</label>
                                        <input type="text" name="emel" class="form-control" value="{{$user->email}}" readonly>
                                    </div>
                                    <div class="col-4">
                                        <label>No Tel</label>
                                        <input type="text" name="no_tel" class="form-control" value="{{$user->no_tel}}" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label>Tahap Capaian</label>
                                        <input type="text" class="form-control" value="{{$user->capaian->keterangan}}" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label>Status Pengguna</label>
                                        {{-- <select class="form-control" name="statusUser">
                                        @foreach($senaraiStatus as $key=>$status)
                                        <option value="{{$status->id}}">{{$status->keterangan}}</option>
                                        @endforeach
                                        </select> --}}
                                        <input type="text" name="statusUser" class="form-control" value="{{$user->status_users->keterangan}}" readonly>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-4"><hr class="solid"></div>

                            <div class="form-group">
                                <div class="row">
                                  <div class="col">
                                    <div class="form-group">
                                        <a href="{{route('admin-penggunaPelajar:index')}}" class="btn btn-secondary">Kembali</a>
                                        <a href="{{route('admin-penggunaPelajar-cariPelajarKp:edit', $user->id)}}" class="btn btn-success">Kemaskini</a>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        {{-- </form> --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection