@extends('layouts.pelajar.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Daftar Waris</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Maklumat</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-users" aria-hidden="true"></i></div><a href="{{route('pelajar-waris:index')}}">Butiran Waris</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-plus-circle"></i></div>Daftar Waris</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Waris') }}</div>                

                    <div class="card-body">                        
                        <form action="{{route('pelajar-waris:store')}}" method="POST" enctype="multipart/form-data">@csrf

                                <input name="profilPelajarID" value="{{$user->profil_pelajar->id}}" hidden>
                                <input name="kpPewujud" value="{{$user->no_kp}}" hidden>
                                <input name="kpKemaskini" value="{{$user->no_kp}}" hidden>
                                
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-2">
                                        <label>Hubungan Waris</label>
                                        <select name="hubungan" class="form-control">
                                            @foreach($senaraiHubungan as $key => $hubungan)
                                            <option value="{{$hubungan->id}}">{{$hubungan->keterangan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>No. Kad Pengenalan Waris</label>
                                        <input type="text" name="no_kp" class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control">
                                    </div>
                                </div>
                            </div> 

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Alamat Rumah</label>
                                        <textarea type="text" name="alamatRumah" class="form-control"></textarea>
                                    </div>
                                    <div class="col-3">
                                        <label>Bandar</label>
                                        <input type="text" name="bandar" class="form-control">
                                    </div>
                                    <div class="col-3">
                                        <label>Poskod</label>
                                        <input type="text" name="poskod" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-2">
                                        <label>Nombor Telefon</label>
                                        <input type="text" name="no_tel" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <a href="{{route('pelajar-waris:index')}}" class="btn btn-secondary">Kembali</a>
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