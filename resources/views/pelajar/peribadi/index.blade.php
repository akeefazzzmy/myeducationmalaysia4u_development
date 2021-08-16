@extends('layouts.pelajar.main')

@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Butiran Peribadi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Maklumat</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-address-card" aria-hidden="true"></i></div>Butiran Peribadi</li>
    </ol>

{{-- Alert start --}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if(session()->has('alert-message'))
        <div class="alert alert-primary {{session()->get('alert-type')}}" role="alert">
            {{session()->get('alert-message')}}
            <span type="button" class="close" data-dismiss="alert" aria-label="Close" aria-hidden="true">&times;</span>
        </div>
    @endif
{{-- Alert end --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                {{-- <h5>Nombor Kad Pengenalan</h5> --}}
                                <h1>{{$user->name}}</h1>
                                <p>{{$user->no_kp}}</p>
                            </div>
                            <div class="col-sm-6">
                                {{-- <h5>Nama</h5> --}}
                                {{-- <h5>{{$user->name}}</h5> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{-- <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5>Nombor Kad Pengenalan</h5>
                                <p>{{$user->no_kp}}</p>
                            </div>
                            <div class="col-sm-6">
                                <h5>Nama</h5>
                                <p>{{$user->name}}</p>
                            </div>
                        </div>
                    </div> --}}

                    <div class="form-group">
                        <div class="row">
                            <h3>Maklumat Peribadi</h3>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">                            
                            <div class="col-sm-4">
                                <h5>Agama
                                    {{-- <i class="fa fa-edit" data-toggle="modal" data-target="#agamaModal" style="cursor:pointer; color:rgb(255, 0, 81)"></i> --}}
                                </h5>
                                
                                <p>
                                    @if($user->profil_pelajar->agama_id)
                                    <input class="form-control" value="{{$user->profil_pelajar->agama->keterangan}}" readonly>                                        
                                    @else
                                    <input class="form-control" value="Sila Kemaskini" readonly>                                        
                                    @endif                            
                                </p>
                            </div> 
                            <div class="col-sm-4">
                                <h5>Bangsa </h5>
                                <p>
                                    @if($user->profil_pelajar->bangsa_id)
                                    <input class="form-control" value="{{$user->profil_pelajar->bangsa->keterangan}}" readonly>                                    
                                    @else
                                    <input class="form-control" value="Sila Kemaskini" readonly>
                                    @endif                            
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <h5>Jantina </h5>
                                <p>
                                    @if($user->profil_pelajar->jantina_id)
                                    <input class="form-control" value="{{$user->profil_pelajar->jantina->keterangan}}" readonly>                                    
                                    @else
                                    <input class="form-control" value="Sila Kemaskini" readonly>
                                    @endif                            
                                </p>
                            </div>
                                <div class="col-sm-4">
                                    <h5>Tarikh Lahir </h5>
                                    <p>
                                        @if($user->profil_pelajar->tarikh_lahir)
                                        {{-- {{$user->profil_pelajar->tarikh_lahir}} --}}
                                        <input class="form-control" value="{{\Carbon\Carbon::parse($user->profil_pelajar->tarikh_lahir)->format('d/m/Y')}}" readonly>                                        
                                        @else
                                        <input class="form-control" value="Sila Kemaskini" readonly>                      
                                        @endif              
                                    </p>
                                </div>
                                <div class="col-sm-4">
                                    <h5>Negeri Lahir</h5>
                                    <p>
                                        @if($user->profil_pelajar->negeri_lahir)
                                        <input class="form-control" value="{{$user->profil_pelajar->negeriLahir->keterangan}}" readonly>                                        
                                        @else
                                        <input class="form-control" value="Sila Kemaskini" readonly>
                                        @endif                            
                                    </p>
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
                                <p>
                                    @if($user->no_tel)
                                    <input class="form-control" value="{{$user->no_tel}}" readonly>                                    
                                    @else
                                    <input class="form-control" value="Sila Kemaskini" readonly>
                                    @endif
                                </p>
                            </div> 
                            <div class="col-sm-8">
                                <h5>Emel</h5>
                                <p>
                                    @if($user->email)
                                    <input class="form-control" value="{{$user->email}}" readonly>                                                            
                                    @else
                                    <input class="form-control" value="Sila Kemaskini" readonly>         
                                    @endif                            
                                </p>
                            </div>
                            <div class="col-sm-12">
                                <h5>Alamat Di Malaysia </h5>
                                <p>
                                    @if($user->profil_pelajar->alamat_malaysia)
                                    <input class="form-control" value="{{$user->profil_pelajar->alamat_malaysia}}" readonly>                
                                    @else
                                    <input class="form-control" value="Sila Kemaskini" readonly>                     
                                    @endif                            
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <h5>Daerah </h5>
                                <p>
                                    @if($user->profil_pelajar->bandar_malaysia)
                                    <input class="form-control" value="{{$user->profil_pelajar->bandar_malaysia}}" readonly>                
                                    @else
                                    <input class="form-control" value="Sila Kemaskini" readonly>                     
                                    @endif                            
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <h5>Poskod</h5>
                                <p>
                                    @if($user->profil_pelajar->poskod_malaysia)
                                    <input class="form-control" value="{{$user->profil_pelajar->poskod_malaysia}}" readonly>                 
                                    @else
                                    <input class="form-control" value="Sila Kemaskini" readonly>                     
                                    @endif                            
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <h5>Negeri</h5>
                                <p>
                                    @if($user->profil_pelajar->negeri_alamat)
                                    <input class="form-control" value="{{$user->profil_pelajar->negeriAlamat->keterangan}}" readonly>                 
                                    @else
                                    <input class="form-control" value="Sila Kemaskini" readonly>                     
                                    @endif                            
                                </p>
                            </div>
                        </div>                          
                    </div>

                    <div class="mb-4"><hr class="solid"></div>

                    {{-- <div class="form-group">
                        <div class="row">
                            <h3>Maklumat Kesihatan</h3>
                        </div>
                    </div> --}}

                    {{-- <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5>Status Vaksinasi</h5>
                                <p>
                                    <input class="form-control" value="">
                                </p>
                            </div>                            
                        </div>
                    </div> --}}
                    <a href="{{route('pelajar-peribadi:edit', $user)}}" class="btn btn-success">Kemaskini</a>
                </div>
            </div>
            
        </div>
        
    </div>
    
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6"> --}}
                                {{-- <h5>Nombor Kad Pengenalan</h5> --}}
                                {{-- <h1>{{$user->name}}</h1>
                                <p>{{$user->no_kp}}</p>
                            </div>
                            <div class="col-sm-6"> --}}
                                {{-- <h5>Nama</h5> --}}
                                {{-- <h5>{{$user->name}}</h5> --}}
                            {{-- </div>
                        </div>
                    </div>
                </div>
                <div class="card-body"> --}}
                    {{-- <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5>Nombor Kad Pengenalan</h5>
                                <p>{{$user->no_kp}}</p>
                            </div>
                            <div class="col-sm-6">
                                <h5>Nama</h5>
                                <p>{{$user->name}}</p>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="form-group">
                        <div class="row">
                            <h3>Maklumat Diri</h3>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">                            
                            <div class="col-sm-4">
                                <h5>Agama <i class="fa fa-edit" data-toggle="modal" data-target="#agamaModal" style="cursor:pointer; color:rgb(255, 0, 81)"></i></h5>
                                <p>
                                    @if($user->profil_pelajar->agama_id)
                                        {{$user->profil_pelajar->agama->keterangan}}
                                    @else
                                        Sila Kemaskini
                                    @endif                            
                                </p>
                            </div> 
                            <div class="col-sm-4">
                                <h5>Bangsa <i class="fa fa-edit" data-toggle="modal" data-target="#bangsaModal" style="cursor:pointer; color:rgb(255, 0, 81)"></i></h5>
                                <p>
                                    @if($user->profil_pelajar->bangsa_id)
                                    {{$user->profil_pelajar->bangsa->keterangan}}
                                    @else
                                    Sila Kemaskini
                                    @endif                            
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <h5>Jantina <i class="fa fa-edit" data-toggle="modal" data-target="#jantinaModal" style="cursor:pointer; color:rgb(255, 0, 81)"></i></h5>
                                <p>
                                    @if($user->profil_pelajar->jantina_id)
                                    {{$user->profil_pelajar->jantina->keterangan}}
                                    @else
                                    Sila Kemaskini
                                    @endif                            
                                </p>
                            </div>
                                <div class="col-sm-4">
                                    <h5>Tarikh Lahir <i class="fa fa-edit" data-toggle="modal" data-target="#tarikhLahirModal" style="cursor:pointer; color:rgb(255, 0, 81)"></i></h5>
                                    <p>
                                        @if($user->profil_pelajar->tarikh_lahir) --}}
                                        {{-- {{$user->profil_pelajar->tarikh_lahir}} --}}
                                        {{-- {{\Carbon\Carbon::parse($user->profil_pelajar->tarikh_lahir)->format('d/m/Y')}}
                                        @else
                                        Sila Kemaskini                      
                                        @endif              
                                    </p>
                                </div>
                                <div class="col-sm-4">
                                    <h5>Negeri Lahir <i class="fa fa-edit" data-toggle="modal" data-target="#negeriLahirModal" style="cursor:pointer; color:rgb(255, 0, 81)"></i></h5>
                                    <p>
                                        @if($user->profil_pelajar->negeri_lahir)
                                        {{$user->profil_pelajar->negeriLahir->keterangan}}
                                        @else
                                        Sila Kemaskini
                                        @endif                            
                                    </p>
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
                                <h5>Nombor Telefon <i class="fa fa-edit" data-toggle="modal" data-target="#noTelModal" style="cursor:pointer; color:rgb(255, 0, 81)"></i></h5>
                                <p>
                                    @if($user->no_tel)
                                    {{$user->no_tel}}
                                    @else
                                    Sila Kemaskini
                                    @endif                            
                                </p>
                            </div>
                            <div class="col-sm-8">
                                <h5>Alamat Di Malaysia <i class="fa fa-edit" data-toggle="modal" data-target="#alamatModal" style="cursor:pointer; color:rgb(255, 0, 81)"></i> </h5>
                                <p>
                                    @if($user->profil_pelajar->alamat_malaysia && $user->profil_pelajar->bandar_malaysia && $user->profil_pelajar->poskod_malaysia && $user->profil_pelajar->negeri_alamat)
                                        {{$user->profil_pelajar->alamat_malaysia}},
                                        {{$user->profil_pelajar->bandar_malaysia}},
                                        {{$user->profil_pelajar->poskod_malaysia}},
                                        {{$user->profil_pelajar->negeriAlamat->keterangan}}                  
                                    @else($user->profil_pelajar->alamat_malaysia == null || $user->profil_pelajar->bandar_malaysia == null || $user->profil_pelajar->poskod_malaysia == null || $user->profil_pelajar->negeri_alamat == null)
                                    Sila Kemaskini                     
                                    @endif                            
                                </p>
                            </div>
                            <div class="col-sm-12">
                                <h5>Emel <i class="fa fa-edit" data-toggle="modal" data-target="#emelModal" style="cursor:pointer; color:rgb(255, 0, 81)"></i></h5>
                                <p>
                                    @if($user->email)
                                    {{$user->email}}                        
                                    @else
                                    Sila Kemaskini         
                                    @endif                            
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{--  --}}

</div>
@include('pelajar.peribadi.modal-index')
@endsection
