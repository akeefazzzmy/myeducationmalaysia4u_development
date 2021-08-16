@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Daftar Pengguna EM</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>Pengguna Sistem</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fas fa-user"></i></div><a href="{{route('admin-penggunaEm:index')}}">Pengguna EM</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-plus-circle"></i></div>Daftar Pengguna EM</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Pengguna EM') }}</div>                

                    <div class="card-body">
                        <form action="{{route('admin-penggunaEm:store', ['capaianID' => $capaian->id, 'statusUser' => $statusUser->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label>Nombor KP</label>
                                        <input type="text" name="no_kp" class="form-control">
                                    </div>
                                    <div class="col-9">
                                        <label>Nama</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label>Emel</label>
                                        <input type="text" name="email" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label>Nombor Telefon</label>
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="text" name="no_tel" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label>EM</label>
                                        <div class="row">
                                            <div class="col-12">
                                                <select name="em" class="form-control">
                                                    @foreach($senaraiEm as $key => $em)
                                                        <option value="{{$em->id}}">{{$em->keterangan}} ({{$em->kod_em}})</option>
                                                    @endforeach                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="{{route('admin-penggunaEm:index')}}" class="btn btn-secondary">Kembali</a>
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