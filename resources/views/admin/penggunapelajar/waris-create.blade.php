@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Daftar Waris</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><a href="{{route('admin-penggunaPelajar:cariPelajarKp-get', $no_kp)}}">Waris</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-plus-circle"></i></div>Daftar Waris</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Waris') }}</div>                
                    <div class="card-body">
                        @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                        <form action="{{route('admin-penggunaPelajar-waris:store', ['profil_pelajar_id'=>$profilPelajarId, 'no_kp'=>$no_kp])}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-2">
                                        <label>Hubungan</label>
                                        <select name="hubungan" class="form-control">
                                            @foreach($senaraiHubungan as $key => $hubungan)
                                                <option value="{{$hubungan->id}}">{{$hubungan->keterangan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <label>No KP</label>
                                        <input type="text" name="no_kp" class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control">
                                    </div>
                                    <div class="col-2">
                                        <label>No Telefon</label>
                                        <input type="text" name="no_tel" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label>Emel</label>
                                        <input type="text" name="emel" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control"></textarea>
                                    </div>
                                    <div class="col-2">
                                        <label>Bandar</label>
                                        <input name="bandar" class="form-control">
                                    </div>
                                    <div class="col-2">
                                        <label>Poskod</label>
                                        <textarea name="poskod" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label>Waris</label>
                                <input type="text" name="nama" class="form-control">
                            </div>                         --}}
                            <div class="form-group">
                                <a href="{{route('admin-penggunaPelajar:cariPelajarKp-get', $no_kp)}}" class="btn btn-secondary">Kembali</a>
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