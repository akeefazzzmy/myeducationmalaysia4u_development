@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Daftar Pelajar</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>Pengurusan Pengguna</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fas fa-user"></i></div><a href="{{route('admin-penggunaPelajar:index')}}">Pelajar</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-plus-circle"></i></div>Daftar</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Pelajar') }}</div>

                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label>Nombor KP yang dimasukkan tiada dalam rekod sebagai pelajar. Isi ruangan berikut untuk daftar pelajar.</label>
                                </div>
                            </div>
                        </div>
                        <form action="{{route('admin-penggunaPelajar-cariPelajarKp:store')}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label>Nombor KP</label>
                                        @if($user)
                                        <input type="text" name="no_kp" class="form-control" value="{{$user->no_kp}}" readonly>
                                        @else
                                        <input type="text" name="no_kp" class="form-control" value="{{$noKP}}">
                                        @endif
                                    </div>
                                    <div class="col-8">
                                        <label>Nama</label>
                                        @if($user)
                                        <input type="text" name="name" class="form-control" value="{{$user->name}}" readonly>
                                        @else
                                        <input type="text" name="name" class="form-control">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label>Emel</label>
                                        @if($user)
                                        <input type="text" name="email" class="form-control" value="{{$user->email}}">
                                        @else
                                        <input type="text" name="email" class="form-control">
                                        @endif
                                    </div>
                                    <div class="col-4">
                                        <label>Nombor Telefon</label>
                                        <div class="row">
                                            <div class="col-12">
                                                @if($user)
                                                <input type="text" name="no_tel" class="form-control" value="{{$user->no_tel}}">
                                                @else
                                                <input type="text" name="no_tel" class="form-control">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="{{route('admin-penggunaPelajar:index')}}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection