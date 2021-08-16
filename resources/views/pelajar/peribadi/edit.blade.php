@extends('layouts.pelajar.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Kemaskini Maklumat Peribadi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Maklumat</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-address-card" aria-hidden="true"></i></div><a href="{{route('pelajar-peribadi:index')}}">Butiran Peribadi</a></li>
        {{-- <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye" aria-hidden="true"></i></div><a href="{{route('pelajar-pengajianpelajar:show', $pengajian)}}">Papar Maklumat Pengajian</a></li> --}}
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-edit"></i></div>Kemaskini Maklumat Peribadi</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h2>{{ __('Butiran Peribadi') }}</h2></div>              

                    <div class="card-body">
                        <form action="{{route('pelajar-peribadi:update', $user->id)}}" method="POST">@csrf
                            <div class="form-group">
                                <div class="row">
                                    <h3>Maklumat Peribadi</h3>
                                </div>
                            </div>
        
                            <div class="form-group">
                                <div class="row">                            
                                    <div class="col-sm-4">
                                        <h5>Agama
                                        </h5>
                                        <select name="agama" class="form-control">
                                            {{-- <option value="{{$user->profil_pelajar->agama->id}}" selected>{{$user->profil_pelajar->agama->keterangan}}</option> --}}
                                            @if($user->profil_pelajar->agama_id)
                                            {
                                                <option value="{{$user->profil_pelajar->agama_id}}" selected>{{$user->profil_pelajar->agama->keterangan}}</option>
                                            }
                                            @else
                                            {
                                                <option selected>Sila Kemaskini</option>
                                            }
                                            @endif
                                            <option disabled>----------</option>
                                            @foreach($senaraiAgama as $key => $agama)
                                                <option value="{{$agama->id}}">{{$agama->keterangan}}</option>
                                            @endforeach                                            
                                        </select>
                                    </div> 
                                    <div class="col-sm-4">
                                        <h5>Bangsa </h5>
                                        <select name="bangsa" class="form-control">
                                            {{-- <option value="{{$user->profil_pelajar->bangsa->id}}" selected>{{$user->profil_pelajar->bangsa->keterangan}}</option> --}}
                                            @if($user->profil_pelajar->agama_id)
                                            {
                                                <option value="{{$user->profil_pelajar->bangsa->id}}" selected>{{$user->profil_pelajar->bangsa->keterangan}}</option>
                                            }
                                            @else
                                            {
                                                <option selected>Sila Kemaskini</option>
                                            }
                                            @endif
                                            <option disabled>----------</option>
                                            @foreach($senaraiBangsa as $key => $bangsa)
                                                <option value="{{$bangsa->id}}">{{$bangsa->keterangan}}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <h5>Jantina </h5>
                                        <select name="jantina" class="form-control">
                                            {{-- <option value="{{$user->profil_pelajar->jantina->id}}" selected>{{$user->profil_pelajar->jantina->keterangan}}</option> --}}
                                            @if($user->profil_pelajar->agama_id)
                                            {
                                                <option value="{{$user->profil_pelajar->jantina->id}}" selected>{{$user->profil_pelajar->jantina->keterangan}}</option>
                                            }
                                            @else
                                            {
                                                <option selected>Sila Kemaskini</option>
                                            }
                                            @endif
                                            <option disabled>----------</option>
                                            @foreach($senaraiJantina as $key => $jantina)
                                                <option value="{{$jantina->id}}">{{$jantina->keterangan}}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                </div>                          
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h5>Tarikh Lahir </h5>
                                        {{-- <input name="tarikhLahir" class="form-control" type="date" value="{{$user->profil_pelajar->tarikh_lahir}}"> --}}
                                        @if($user->profil_pelajar->tarikh_lahir)
                                            <input name="tarikhLahir" class="form-control" type="date" value="{{$user->profil_pelajar->tarikh_lahir}}">
                                        @else
                                            <input name="tarikhLahir" class="form-control" type="date">
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <h5>Negeri Lahir</h5>
                                        <select name="negeri_lahir" class="form-control">
                                            @if($user->profil_pelajar->negeri_lahir)
                                                <option value="{{$user->profil_pelajar->negeri_lahir}}" selected>{{$user->profil_pelajar->negeriLahir->keterangan}}</option>
                                                <option disabled>----------</option>
                                                @foreach($senaraiNegeri as $key => $negeri)
                                                    <option value="{{$negeri->id}}">{{$negeri->keterangan}}</option>
                                                @endforeach
                                            @else
                                                <option selected disabled>Sila Kemaskini</option>
                                                <option disabled>----------</option>
                                                @foreach($senaraiNegeri as $key => $negeri)
                                                    <option value="{{$negeri->id}}">{{$negeri->keterangan}}</option>
                                                @endforeach 
                                            @endif  
                                            {{-- <option value="{{$user->profil_pelajar->negeri_lahir}}" selected>{{$user->profil_pelajar->negeriLahir}}</option> --}}
                                            
                                        </select>
                                    </div>
                                    </div>
                            </div>
        
                            <div class="mb-4"><hr class="solid"></div>
        
                            <div class="form-group">
                                <div class="row">
                                    <h3>Maklumat Perhubungan</h3>
                                </div>
                            </div>
        
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h5>Nombor Telefon</h5>
                                        {{-- <input name="no_tel" class="form-control" value="{{$user->no_tel}}"> --}}

                                        @if($user->no_tel)
                                            <input name="no_tel" class="form-control" value="{{$user->no_tel}}">
                                        @else
                                            <input name="no_tel" class="form-control">
                                        @endif
                                    </div>
                                    <div class="col-sm-8">
                                        <h5>Emel</h5>                                        

                                        @if($user->email)
                                            <input name="emel" class="form-control" value="{{$user->email}}">
                                        @else
                                            <input name="emel" class="form-control">                               
                                        @endif
                                    </div>                                                                        
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5>Alamat Di Malaysia</h5>
                                        @if($user->profil_pelajar->alamat_malaysia)
                                            <input class="form-control" name="alamat_malaysia" value="{{$user->profil_pelajar->alamat_malaysia}}">
                                        @else
                                            <input class="form-control" name="alamat_malaysia" value="Sila Kemaskini">
                                        @endif
                                    </div>
                                </div>                                
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h5>Daerah</h5>
                                        @if($user->profil_pelajar->bandar_malaysia)
                                            <input class="form-control" name="bandar_malaysia" value="{{$user->profil_pelajar->bandar_malaysia}}">
                                        @else
                                            <input class="form-control" name="bandar_malaysia" value="Sila Kemaskini">
                                        @endif
                                    </div>
                                    <div class="col-sm-2">
                                        <h5>Poskod</h5>                                        
                                        @if($user->profil_pelajar->poskod_malaysia)
                                            <input name="poskod_malaysia" class="form-control" value="{{$user->profil_pelajar->poskod_malaysia}}">
                                        @else
                                            <input name="poskod_malaysia" class="form-control" value="Sila Kemaskini">
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <h5>Negeri</h5>
                                        <select name="negeri_alamat" class="form-control">
                                            @if($user->profil_pelajar->negeri_alamat)
                                                <option value="{{$user->profil_pelajar->negeri_alamat}}" selected>{{$user->profil_pelajar->negeriAlamat->keterangan}}</option>
                                                <option disabled>----------</option>
                                                @foreach($senaraiNegeri as $key => $negeri)
                                                    <option value="{{$negeri->id}}">{{$negeri->keterangan}}</option>
                                                @endforeach
                                            @else
                                                <option selected disabled>Sila Kemaskini</option>
                                                <option disabled>----------</option>
                                                @foreach($senaraiNegeri as $key => $negeri)
                                                    <option value="{{$negeri->id}}">{{$negeri->keterangan}}</option>
                                                @endforeach
                                            @endif
                                        </select>                                                
                                            

                                            
                                    </div>                                    
                                </div>                                
                            </div>

                            <div class="mb-4"><hr class="solid"></div>

                            {{-- <div class="form-group">
                                <div class="row">
                                    <h3>Maklumat Kesihatan</h3>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">                                    
                                    <div class="col-sm-2">
                                        <h5>Status Vaksinasi</h5>
                                        <select name="status_vaksinasi" class="form-control">
                                            @foreach($senaraiStatusVaksinasi as $key => $statusVaksinasi)
                                                <option value="{{$statusVaksinasi->id}}">{{$statusVaksinasi->keterangan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div> --}}

                            <a href="{{route('pelajar-peribadi:index')}}" class="btn btn-secondary">Kembali</a> 
                            {{-- <a href="" class="btn btn-info">Simpan</a>                          --}}
                            <button type="submit" class="btn btn-info">Kemaskini</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection