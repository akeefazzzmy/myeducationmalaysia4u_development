@extends('layouts.kedutaan.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Pengurusan Pelajar</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-tasks"></i></div>Pengurusan Pelajar</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-search"></i></div>Cari Pelajar</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-id-card"></i></div>No KP</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-plus-circle"></i></div>Daftar Waris Pelajar</li>
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
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    {{-- <h5>Nombor Kad Pengenalan</h5> --}}
                                    <h1>{{$pelajar->name}}</h1>
                                    <p>{{$pelajar->no_kp}}</p>
                                </div>
                            </div>
                        </div>
                    </div>                
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <div class="row">
                                <h3>Daftar Waris</h3>
                            </div>
                        </div>
                        {{-- <form action="{{route('admin-penggunaPelajar-waris:store', ['profil_pelajar_id'=>$profilPelajarId, 'no_kp'=>$no_kp])}}" method="POST" enctype="multipart/form-data">@csrf --}}
                        <form method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <div class="row">                            
                                    <div class="col-sm-4">
                                        <h5>Hubungan</h5>
                                        <p>
                                            <select name="hubungan" class="form-control">
                                                    <option selected disabled>Sila pilih hubungan waris</option>
                                                @foreach($senaraiHubungan as $key => $hubungan)
                                                    <option value="{{$hubungan->id}}">{{$hubungan->keterangan}}</option>
                                                @endforeach
                                            </select>
                                        </p>
                                    </div> 
                                    <div class="col-sm-2">
                                        <h5>No KP</h5>
                                        <p>
                                            <input type="text" name="no_kp" class="form-control">
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <h5>Nama </h5>
                                        <p>
                                            <input type="text" name="nama" class="form-control">
                                        </p>
                                    </div>
                                        <div class="col-sm-4">
                                            <h5>No Telefon</h5>
                                            <p>
                                                <input type="text" name="no_tel" class="form-control">
                                            </p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5>Emel</h5>
                                            <p>
                                                <input type="text" name="emel" class="form-control">
                                            </p>
                                        </div>
                                </div>
                                <div class="row">                            
                                    <div class="col-sm-6">
                                        <h5>Alamat</h5>
                                        <p>
                                            <textarea name="alamat" class="form-control"></textarea>
                                        </p>
                                    </div>
                                    <div class="col-sm-4">
                                        <h5>Daerah</h5>
                                        <p>
                                            <input name="daerah" class="form-control">
                                        </p>
                                    </div>
                                    <div class="col-sm-2">
                                        <h5>Poskod</h5>
                                        <p>
                                            <input name="poskod" class="form-control">
                                        </p>
                                    </div>
                                </div>                         
                            </div> 
                            
                            <div class="form-group">
                                {{-- <a href="{{route('admin-penggunaPelajar:cariPelajarKp-get', $no_kp)}}" class="btn btn-secondary">Kembali</a> --}}
                                <a href="{{route('kedutaan-carianPelajar-noKP:showGet', $pelajar)}}" class="btn btn-secondary">Kembali</a>
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