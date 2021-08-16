@extends('layouts.em.main')
@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Profil</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Profil</li>
        <li class="breadcrumb-item active">Profil Saya</li>
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
                    <div class="card-header">{{ __('Kemaskini Profil Saya') }}</div>                

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('em-update-profile')}}">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label>No KP</label>
                                        <input type="text" name="no_kp" value="{{$user->no_kp}}" class="form-control" readonly>
                                    </div>
                                    <div class="col-9">
                                        <label>Nama</label>
                                        <input type="text" name="nama" value="{{$user->name}}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-8">
                                        <label>Alamat Emel</label>
                                        <input type="text" name="emel" value="{{$user->email}}" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label>No Tel</label>
                                        <input type="text" name="no_tel" value="{{$user->no_tel}}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Gambar Profil</label><br>
                                        @if(auth()->user()->image_file)
                                            <img src="{{ asset('/storage/'.auth()->user()->image_file) }}" style="width:50%; border-radius: 50%; object-fit: cover; border-radius: none; border: 2px solid black; padding: none; box-shadow: none"><br><br>
                                        @else
                                        <img src="{{ url('/storage/images/user_icon.png') }}" style="width:50%; border-radius: 50%; object-fit: cover; border-radius: none; border: 2px solid black; padding: none; box-shadow: none"><br><br>
                                        @endif
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