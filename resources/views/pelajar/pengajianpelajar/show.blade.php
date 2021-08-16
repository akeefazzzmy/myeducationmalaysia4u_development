@extends('layouts.pelajar.main')
@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Papar Maklumat Pengajian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Maklumat</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-book-reader" aria-hidden="true"></i></div><a href="{{route('pelajar-pengajianpelajar:index')}}">Butiran Pengajian</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div>Papar Maklumat Pengajian</li>
    </ol>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
                @if(session()->has('alert-message'))
                    <div class="alert {{session()->get('alert-type')}}">
                        {{session()->get('alert-message')}}
                    </div>
                @endif
            <div class="card">                
                <div class="card-header"><h2>{{ __('Maklumat Pengajian') }}</h2></div>
                    <div class="card-body">
                        <div class="form-group">
                            {{-- <div class="row">
                                <label><h3>Kursus</h3></label><div class="col-4">
                                    <a href="{{route('pelajar-pengajianpelajar:edit', $pengajian)}}" class="btn btn-success">Kemaskini</a>
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <div class="row">
                                    <label><h3>Kursus</h3></label><div class="col-4">                                
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-6">
                                    <label>Institusi Pengajian</label>
                                    <input type="text" name="institusi" class="form-control" value="{{$pengajian->institusi->keterangan}}" readonly>
                                </div>
                                <div class="col-3">
                                    <label><i>State</i></label>
                                    <input type="text" name="state" class="form-control" value="{{$pengajian->institusi->states->keterangan}}" readonly>
                                </div>
                                <div class="col-3">
                                    <label>Negara</label>
                                    <input type="text" name="negara" class="form-control" value="{{$pengajian->institusi->states->negara->keterangan}}" readonly>
                                </div>
                            </div>                            
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label>Tahap Pengajian</label>
                                    <input type="text" name="tahap" class="form-control text-uppercase" value="{{$pengajian->tahap_pengajian->keterangan}}" readonly>
                                </div>
                                <div class="col-6">
                                    <label>Bidang</label>
                                    <input type="text" name="program" class="form-control" value="{{$pengajian->bidang->nama_bidang}}" readonly>
                                </div> 
                            </div>                            
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label>Program</label>
                                    <input type="text" name="program" class="form-control" value="{{$pengajian->program_pengajian->keterangan}}" readonly>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Tarikh Mula</label>
                                            @if($pengajian->tarikh_mula == null)
                                                <p class="form-control" readonly>Tiada Maklumat</p>
                                            @else
                                                <p class="form-control" readonly>{{\Carbon\Carbon::parse($pengajian->tarikh_mula)->format('d/m/Y')}}</p>
                                            @endif
                                        </div>
                                        <div class="col-6">
                                            <label>Tarikh Tamat</label>
                                            @if($pengajian->tarikh_tamat == null)
                                                <p class="form-control" readonly>Tiada Maklumat</p>
                                            @else
                                                <p class="form-control" readonly>{{\Carbon\Carbon::parse($pengajian->tarikh_tamat)->format('d/m/Y')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>                                
                            </div>                            
                        </div>
                        <div class="form-group">
                            <div class="row"><div class="col-6">
                                {{-- <label><a href="{{route('pelajar-pengajianpelajar:edit', $pengajian)}}" class="btn btn-success">Kemaskini</a> --}}
                                <label><a href="{{route('pelajar-pengajianpelajar:edit', $pengajian)}}" class="btn btn-success">Kemaskini</a>
                                    
                            </div></div>
                        </div>
                        
                        <div class="mb-4">
                            {{-- <h6 class="text-uppercase">Solid</h6> --}}
                            <!-- Solid divider -->
                            <hr class="solid">
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">                            
                                        {{-- <label><h3>Penaja <a href="{{route('pelajar-penajaPengajianPelajar:create', $pengajian)}}" class="btn btn-light">Create</a></h3></label> --}}
                                        <label><h3>Penaja <a href="{{route('pelajar-penajaPengajianPelajar:create', $pengajian)}}"><i class="fa fa-plus-circle"></i></a></h3></label>
                                    </div>
                                        {{--  --}}
                                        <div class="row">
                                            <div class="col-12">
                                                @if (count($senaraiPenajaPengajian))
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>Bil</th>
                                                        <th>Penaja</th>
                                                        <th>Tarikh Mula Penajaan</th>
                                                        <th>Tarikh Tamat Penajaan</th>
                                                        <th>Tindakan</th>                    
                                                    </tr>                                                    
                                                    @foreach($senaraiPenajaPengajian as $key => $penajaPengajian)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{$penajaPengajian->penaja->keterangan}}</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <a href="#" class="btn btn-success">Kemaskini</a>
                                                                <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="{{route('pelajar-penajaPengajianPelajar:destroy', ['penajaPengajian'=>$penajaPengajian->id,'pelajarID'=>$pengajian])}}" class="btn btn-danger">Hapus</a>
                                                            </td>
                                                        </tr>                                                        
                                                    @endforeach                                                                                                     
                                                </table>
                                                @else
                                                    <label>Tiada rekod penaja</label>
                                                @endif
                                            </div>
                                        </div>
                                        {{--  --}}
                                </div>
                                <div class="col-12">
                                    <div class="row">                            
                                        {{-- <label><h3>Penginapan <a href="{{route('pelajar-alamatPenginapanPengajianPelajar:create', $pengajian)}}" class="btn btn-light">Create</a></h3></label> --}}
                                        <label><h3>Penginapan <a href="{{route('pelajar-alamatPenginapanPengajianPelajar:create', $pengajian)}}"><i class="fa fa-plus-circle"></i></a></h3></label>
                                    </div>
                                        <div class="row">
                                            <div class="col-12">
                                            <div>
                                                <div class="form-group">                                        
                                                    <div class="row">
                                                        @if (count($senaraiAlamatPenginapanPengajian))
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <th>Bil</th>
                                                                <th>Alamat Penuh</th>
                                                                <th><i>State</i></th>
                                                                <th>Negara</th>
                                                                <th>Tindakan</th>
                                                            </tr>
                                                            @foreach($senaraiAlamatPenginapanPengajian as $key => $alamatPenginapanPengajian)
                                                            <tr>
                                                                <td>{{$key+1}}</td>
                                                                <td class="text-uppercase">{{$alamatPenginapanPengajian->alamat_penuh}}</td>
                                                                <td>{{$alamatPenginapanPengajian->states->keterangan}}</td>
                                                                <td>{{$alamatPenginapanPengajian->negara->keterangan}}</td>
                                                                <td>
                                                                    {{-- <a href="{{route('pelajar-alamatPenginapanPengajianPelajar:edit', ['alamat'=>$alamatPenginapanPengajian->id,'pelajarID'=>$pengajian])}}" class="btn btn-success">Kemaskini</a> --}}
                                                                    <a href="#" class="btn btn-success">Kemaskini</a>
                                                                    <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="{{route('pelajar-alamatPenginapanPengajianPelajar:destroy', ['alamat'=>$alamatPenginapanPengajian->id,'pelajarID'=>$pengajian])}}" class="btn btn-danger">Hapus</a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </table>
                                                        @else
                                                            <label>Tiada rekod alamat penginapan sewaktu pengajian</label>
                                                        @endif
                                                        
                                                        {{-- @foreach($senaraiAlamatPenginapanPengajian as $key => $alamatPenginapanPengajian)
                                                            <label>
                                                                {{$key+1}}
                                                                {{$alamatPenginapanPengajian->alamat_penuh}},<br>
                                                                {{$alamatPenginapanPengajian->states->keterangan}},<br>
                                                                {{$alamatPenginapanPengajian->states->negara->keterangan}}<br>
                                                                    <div>
                                                                        <a href="{{route('pelajar-alamatPenginapanPengajianPelajar:edit', ['alamat'=>$alamatPenginapanPengajian->id,'pelajarID'=>$pengajian])}}" class="btn btn-success">Edit</a>
                                                                        <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="{{route('pelajar-alamatPenginapanPengajianPelajar:destroy', ['alamat'=>$alamatPenginapanPengajian->id,'pelajarID'=>$pengajian])}}" class="btn btn-danger">Delete</a>
                                                                    </div>
                                                            </label>
                                                        @endforeach   --}}
                                                    </div>
                                                </div>
                                            </div></div>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            {{-- <h6 class="text-uppercase">Solid</h6> --}}
                            <!-- Solid divider -->
                            <hr class="solid">
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <a href="{{route('pelajar-pengajianpelajar:index')}}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection