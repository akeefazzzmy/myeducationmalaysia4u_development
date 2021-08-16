@extends('layouts.pelajar.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Kemaskini Waris</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Maklumat</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-users" aria-hidden="true"></i></div><a href="{{route('pelajar-waris:index')}}">Butiran Waris</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-edit"></i></div>Kemaskini Waris</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Waris') }}</div>                

                    <div class="card-body">
                        <form method="POST">@csrf

                            <input name="profilPelajarID" value="{{$user->profil_pelajar->id}}" hidden>
                            <input name="kpKemaskini" value="{{$user->no_kp}}" hidden>
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-2">
                                        <label>Hubungan</label>
                                        <select class="form-control" name="hubungan">
                                            @foreach($senaraiHubungan as $key=>$hubungan)
                                            <option value="{{$hubungan->id}}">{{$hubungan->keterangan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <label>Nombor KP</label>
                                        <input type="text" name="no_kp" class="form-control" value="{{$waris->no_kp}}">
                                    </div>
                                    <div class="col-8">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control" value="{{$waris->nama}}">
                                    </div>                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12">
                                        <label>Alamat Rumah</label>
                                        <input type="text" name="alamatRumah" class="form-control" value="{{$waris->alamat}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label>Bandar</label>
                                        <input type="text" name="bandar" class="form-control" value="{{$waris->bandar}}">
                                    </div>
                                    <div class="col-2">
                                        <label>Poskod</label>
                                        <input type="text" name="poskod" class="form-control" value="{{$waris->poskod}}">
                                    </div>
                                    <div class="col-2">
                                        <label>Nombor Telefon</label>
                                        <input type="text" name="no_tel" class="form-control" value="{{$waris->no_tel}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <a href="{{route('pelajar-waris:index')}}" class="btn btn-secondary">Kembali</a>
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