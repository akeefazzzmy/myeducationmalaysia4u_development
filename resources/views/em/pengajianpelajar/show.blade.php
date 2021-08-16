@extends('layouts.em.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Pengurusan Pelajar</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-tasks"></i></div>Pengurusan Pelajar</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-search"></i></div>Cari Pelajar</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-id-card"></i></div>No KP</li>
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
                                <div class="col-sm-6">
                                    {{-- <h5>Nama</h5> --}}
                                    {{-- <h5>{{$pelajar->name}}</h5> --}}
                                    c
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
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
                                        @if($pelajar->profil_pelajar->agama_id)
                                        <input class="form-control" value="{{$pelajar->profil_pelajar->agama->keterangan}}" readonly>                                        
                                        @else
                                        <input class="form-control" value="Sila Kemaskini" readonly>                                        
                                        @endif                            
                                    </p>
                                </div> 
                                <div class="col-sm-4">
                                    <h5>Bangsa </h5>
                                    <p>
                                        @if($pelajar->profil_pelajar->bangsa_id)
                                        <input class="form-control" value="{{$pelajar->profil_pelajar->bangsa->keterangan}}" readonly>                                    
                                        @else
                                        <input class="form-control" value="Sila Kemaskini" readonly>
                                        @endif                            
                                    </p>
                                </div>
                                <div class="col-sm-4">
                                    <h5>Jantina </h5>
                                    <p>
                                        @if($pelajar->profil_pelajar->jantina_id)
                                        <input class="form-control" value="{{$pelajar->profil_pelajar->jantina->keterangan}}" readonly>                                    
                                        @else
                                        <input class="form-control" value="Sila Kemaskini" readonly>
                                        @endif                            
                                    </p>
                                </div>
                                    <div class="col-sm-4">
                                        <h5>Tarikh Lahir </h5>
                                        <p>
                                            @if($pelajar->profil_pelajar->tarikh_lahir)
                                            {{-- {{$pelajar->profil_pelajar->tarikh_lahir}} --}}
                                            <input class="form-control" value="{{\Carbon\Carbon::parse($pelajar->profil_pelajar->tarikh_lahir)->format('d/m/Y')}}" readonly>                                        
                                            @else
                                            <input class="form-control" value="Sila Kemaskini" readonly>                      
                                            @endif              
                                        </p>
                                    </div>
                                    <div class="col-sm-4">
                                        <h5>Negeri Lahir</h5>
                                        <p>
                                            @if($pelajar->profil_pelajar->negeri_lahir)
                                            <input class="form-control" value="{{$pelajar->profil_pelajar->negeriLahir->keterangan}}" readonly>                                        
                                            @else
                                            <input class="form-control" value="Sila Kemaskini" readonly>
                                            @endif                            
                                        </p>
                                    </div>
                            </div>                          
                        </div>
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
                                        @if($pelajar->no_tel)
                                        <input class="form-control" value="{{$pelajar->no_tel}}" readonly>                                    
                                        @else
                                        <input class="form-control" value="Sila Kemaskini" readonly>
                                        @endif
                                    </p>
                                </div> 
                                <div class="col-sm-8">
                                    <h5>Emel</h5>
                                    <p>
                                        @if($pelajar->email)
                                        <input class="form-control" value="{{$pelajar->email}}" readonly>                                                            
                                        @else
                                        <input class="form-control" value="Sila Kemaskini" readonly>         
                                        @endif                            
                                    </p>
                                </div>
                                <div class="col-sm-12">
                                    <h5>Alamat Di Malaysia </h5>
                                    <p>
                                        @if($pelajar->profil_pelajar->alamat_malaysia)
                                        <input class="form-control" value="{{$pelajar->profil_pelajar->alamat_malaysia}}" readonly>                
                                        @else
                                        <input class="form-control" value="Sila Kemaskini" readonly>                     
                                        @endif                            
                                    </p>
                                </div>
                                <div class="col-sm-4">
                                    <h5>Daerah </h5>
                                    <p>
                                        @if($pelajar->profil_pelajar->bandar_malaysia)
                                        <input class="form-control" value="{{$pelajar->profil_pelajar->bandar_malaysia}}" readonly>                
                                        @else
                                        <input class="form-control" value="Sila Kemaskini" readonly>                     
                                        @endif                            
                                    </p>
                                </div>
                                <div class="col-sm-4">
                                    <h5>Poskod</h5>
                                    <p>
                                        @if($pelajar->profil_pelajar->poskod_malaysia)
                                        <input class="form-control" value="{{$pelajar->profil_pelajar->poskod_malaysia}}" readonly>                 
                                        @else
                                        <input class="form-control" value="Sila Kemaskini" readonly>                     
                                        @endif                            
                                    </p>
                                </div>
                                <div class="col-sm-4">
                                    <h5>Negeri</h5>
                                    <p>
                                        @if($pelajar->profil_pelajar->negeri_alamat)
                                        <input class="form-control" value="{{$pelajar->profil_pelajar->negeriAlamat->keterangan}}" readonly>                 
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
                                <h3>Maklumat Waris</h3>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="container mt-5">
                                {{-- <h2 class="mb-4">Negara</h2> --}}
                                <table class="table table-bordered waris-datatable">
                                    <thead>
                                        <tr>
                                            <th>Bil</th>
                                            <th>Hubungan</th>
                                            <th>Nama</th>
                                            <th>
                                                <div class="sb-nav-link-icon">
                                                    Tindakan
                                                    {{-- <a href="{{route('em-pengurusanpelajar-waris:create', $pelajar)}}"><i class="fa fa-plus-circle"></i></a> --}}
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>                            
                        </div>

                        <div class="mb-4"><hr class="solid"></div>

                        <div class="form-group">
                            <div class="row">
                                <h3>Maklumat Pengajian</h3>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="container mt-5">
                                {{-- <h2 class="mb-4">Negara</h2> --}}
                                <table class="table table-bordered pengajianPelajar-datatable">
                                    <thead>
                                        <tr>
                                            <th>Bil</th>
                                            <th>Tahap Pengajian</th>
                                            <th>Bidang Pengajian</th>
                                            {{-- <th>Tarikh Mula</th>
                                            <th>Tarikh Tamat</th> --}}
                                            <th>
                                                <div class="sb-nav-link-icon">
                                                    Tindakan
                                                    {{-- <a href="#"><i class="fa fa-plus-circle"></i></a> --}}
                                                    <a href="{{route('kedutaan-carianPelajar-noKP-pengajianPelajar:create', $pelajar)}}"><i class="fa fa-plus-circle"></i></a>
                                                    {{-- <a href="{{route('pelajar-pengajianpelajar:index')}}"><i class="fa fa-undo"></i></a> --}}
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>                           
                        </div>

                        <div class="mb-4"><hr class="solid"></div>

                        <div class="form-group">
                            <div class="row">
                                <h3>Maklumat Vaksinasi</h3>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="container mt-5">                
                                <table class="table table-bordered vaksinasi-datatable">
                                    <thead>
                                        <tr>
                                            <th>Bil</th>
                                            <th>Jenis</th>
                                            <th>Status</th>                                
                                            <th>
                                                <div class="sb-nav-link-icon">
                                                    Tindakan
                                                    <a href="{{route('kedutaan-carianPelajar-noKP-vaksinasiPelajar:create', $pelajar)}}"><i class="fa fa-plus-circle"></i></a>
                                                    {{-- <a href="{{route('pelajar-vaksinasi:index')}}"><i class="fa fa-undo"></i></a> --}}
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>                           
                        </div>

                        <div class="mb-4"><hr class="solid"></div>
                        <a href="{{route('em-pengajianpelajar:index')}}" class="btn btn-secondary">Kembali</a>
                        <a href="#" class="btn btn-success">Kemaskini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>

    // WARIS DATATABLE
    $(function()
        {
        var table = $('.waris-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url : '{{ route('em-pengurusanpelajar-noKP-waris:list', $pelajar) }}'
                },
            language: {url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json"},
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                //   {data: 'kod_negara', name: 'kod_negara'},
                {data: 'hubungan', name: 'hubungan'},
                {data: 'nama', name: 'nama'},
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
            ]
        });    
        });
    // WARIS DATATABLE END

    // PENGAJIAN PELAJAR DATATABLE
    $(function()
    {
      var table = $('.pengajianPelajar-datatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
              url : '{{ route('em-carianPelajar-noKP-pengajianpelajar:list', $pelajar) }}'
              },
          language: {url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json"},
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            //   {data: 'kod_negara', name: 'kod_negara'},
              {data: 'tahapPengajian', name: 'tahapPengajian'},
              {data: 'bidangPengajian', name: 'bidangPengajian'},
            //   {data: 'tarikhMulaPengajian', name: 'tarikhMulaPengajian'},
            //   {data: 'tarikhTamatPengajian', name: 'tarikhTamatPengajian'},
              {
                  data: 'action', 
                  name: 'action', 
                  orderable: true, 
                  searchable: true
              },
          ]
      });    
    });
// PENGAJIAN PELAJAR DATATABLE END

//VAKSINASI PELAJAR DATATABLE
$(function()
    {
      var table = $('.vaksinasi-datatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
            url : '{{ route('em-carianPelajar-noKP-vaksinasipelajar:list', $pelajar) }}'
            },
          language: {url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json"},
          columns:
          [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'jenis', name: 'jenis'},
            {data: 'status', name: 'status'},
            {
            data: 'action', 
            name: 'action', 
            orderable: true, 
            searchable: true
            },
          ]
      });    
    });
//VAKSINASI PELAJAR DATATABLE END

</script>

@endsection