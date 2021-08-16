@extends('layouts.admin.main')

@section('body')
<div class="container-fluid">
    {{-- <h1 class="mt-4">Carian Pelajar</h1> --}}
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin-penggunaPelajar:index')}}">Carian</a></li>
            <li class="breadcrumb-item">Senarai Carian</li>
        </ol>
    </nav>

    {{-- <div class="row">
        <label><h3 class="mt-4">Maklumat Peribadi</h3></label>
    </div> --}}
    
    {{-- <div class="row">
        <p>
            No Kad Pengenalan : {{$user->no_kp}}<br>
            No Passport : {{$user->profil_pelajar->no_passport}}<br>
            Nama : {{$user->name}}<br>
            Negeri Lahir : {{$user->profil_pelajar->negeriLahir->keterangan}}<br>
            Agama : {{$user->profil_pelajar->agama->keterangan}}<br>
            Bangsa : {{$user->profil_pelajar->bangsa->keterangan}}<br>
            Jantina : {{$user->profil_pelajar->jantina->keterangan}}<br>
            Emel : {{$user->email}}<br>
            No Telefon : {{$user->no_tel}}<br>
            Status Akaun : {{$user->status_users->keterangan}}<br>
        </p>
    </div> --}}

    <div class="row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <div class="card">
                    <div class="card-header">{{ __('Maklumat Waris Pelajar') }}</div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover" id="detail_pelajar">
                            <thead>
                                <tr>
                                    <th>Bil</th>
                                    <th>Hubungan</th>
                                    <th>No Kad Pengenalan</th>
                                    <th>Nama</th>
                                    <th>Tindakan <a href="{{route('admin-penggunaPelajar-waris:create', ['profilPelajarId'=>$user->profil_pelajar->id, 'no_kp'=>$user->no_kp])}}"><i class="fa fa-plus-circle"></i></a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->profil_pelajar->waris as $key => $waris)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$waris->hubungan->keterangan}}</td>
                                    <td>{{$waris->no_kp}}</td>
                                    <td>{{$waris->nama}}</td>
                                    <td>
                                        <a href="{{route('admin-penggunaPelajar-waris:show', ['waris'=>$waris, 'no_kp'=>$user->no_kp])}}" class="btn btn-primary">Papar</a>
                                        <a href="{{route('admin-penggunaPelajar-waris:edit', ['waris'=>$waris, 'no_kp'=>$user->no_kp])}}" class="btn btn-success">Kemaskini</a>
                                        <a onclick="return confirm('Data yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan data yang dipilih?')" href="{{route('admin-penggunaPelajar-waris:destroy', $waris)}}" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                {{-- <div class="card">
                    <div class="card-header">{{ __('Maklumat Pengajian') }}</div>
                    <div class="table-responsive">
                        <table class="table table-hover" id="detail_pelajar">
                            <thead>
                                <tr>
                                    <th>Bil</th>
                                    <th>Tahap</th>
                                    <th>Bidang</th>
                                    <th>Tarikh Mula</th>
                                    <th>Tarikh Tamat</th>
                                    <th>Tindakan <a href="{{route('admin-penggunaPelajar-pengajianpelajar:create', ['profilPelajarId'=>$user->profil_pelajar->id, 'no_kp'=>$user->no_kp])}}"><i class="fa fa-plus-circle"></i></a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->profil_pelajar->pengajian_pelajar as $key => $pengajianPelajar)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$pengajianPelajar->tahap_pengajian->keterangan}}</td>
                                    <td>{{$pengajianPelajar->bidang->nama_bidang}}</td>
                                    <td>{{\Carbon\Carbon::parse($pengajianPelajar->tarikh_mula)->format('d/m/Y')}}</td>
                                    <td>{{\Carbon\Carbon::parse($pengajianPelajar->tarikh_tamat)->format('d/m/Y')}}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Papar</a>
                                        <a href="#" class="btn btn-success">Kemaskini</a>
                                        <a onclick="return confirm('Data yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan data yang dipilih?')" href="#" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> --}}
</div>      
</div>
</div>
</div>
    @endsection
