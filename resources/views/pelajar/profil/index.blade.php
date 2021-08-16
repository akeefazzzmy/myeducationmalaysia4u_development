@extends('layouts.pelajar.main')
@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Profil</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Profil</li>
        <li class="breadcrumb-item active">Profil</li>
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
                    <div class="card-header">{{ __('Kemaskini Profil') }}</div>                

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('pelajar-profil:update')}}">@csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label>No. Kad Pengenalan</label>
                                        <input type="text" name="kp" value="{{$user->no_kp}}" class="form-control" readonly>
                                    </div>
                                    <div class="col-8">
                                        <label>Nama</label>
                                        <input type="text" name="nama" value="{{$user->name}}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-8">
                                        <label>Emel</label>
                                        <input type="text" name="emel" value="{{$user->email}}" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label>No. Telefon</label>
                                        <input type="text" name="no_tel" value="{{$user->no_tel}}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Gambar Profil</label>
                                        <input class="form-control" type="file" name="profile_picture">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Kemaskini</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection