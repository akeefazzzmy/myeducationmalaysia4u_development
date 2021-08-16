@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Kemaskini Waris Pelajar</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><a href="{{route('admin-penggunaPelajar:cariPelajarKp-get', $no_kp)}}">Waris</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-edit"></i></div>Kemaskini Waris</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Waris Pelajar') }}</div>                

                    <div class="card-body">
                        @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                        <form method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-2">
                                        <label>No Kad Pengenalan</label>
                                        <input name="no_kp" type="text" class="form-control" value="{{$waris->no_kp}}">
                                    </div>
                                    <div class="col-6">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control" value="{{$waris->nama}}">
                                    </div>
                                    <div class="col-2">
                                        <label>No Telefon</label>
                                        <input type="text" name="no_tel" class="form-control" value="{{$waris->no_tel}}">
                                    </div>
                                    <div class="col-2">
                                        <label>Hubungan</label>
                                        {{-- <input type="text" class="form-control" value="{{$waris->hubungan->keterangan}}"> --}}
                                        <select name="hubungan" class="form-control">
                                            {{-- <option selected disabled value="{{$waris->id}}">{{$waris->hubungan->keterangan}}</option> --}}
                                            {{-- <option disabled>---</option> --}}
                                            @foreach($senaraiHubungan as $key => $hubungan)
                                                <option value="{{$hubungan->id}}">{{$hubungan->keterangan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-8">
                                        <label>Alamat</label>
                                        {{-- <textarea name="alamat" class="form-control" value="{{$waris->alamat}}" placeholder="{{$waris->alamat}}"></textarea>   --}}
                                        <input name="alamat" class="form-control" value="{{$waris->alamat}}">
                                    </div>
                                    <div class="col-2">
                                        <label>Bandar</label>
                                        <input name="bandar" class="form-control" value="{{$waris->bandar}}">
                                    </div>
                                    <div class="col-2">
                                        <label>Poskod</label>
                                        <input name="poskod" class="form-control" value="{{$waris->poskod}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="{{route('admin-penggunaPelajar:cariPelajarKp-get', $no_kp)}}" class="btn btn-secondary">Kembali</a>
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