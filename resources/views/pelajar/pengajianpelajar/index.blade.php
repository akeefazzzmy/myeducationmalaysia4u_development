@extends('layouts.pelajar.main')

@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Pengajian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Maklumat</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-book-reader" aria-hidden="true"></i></div>Butiran Pengajian</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session()->has('alert-message'))
                    <div class="alert {{session()->get('alert-type')}}">
                        {{session()->get('alert-message')}}
                    </div>
                @endif

                {{-- <div class="card">
                    <div class="card-header">
                        {{ __('Maklumat Pengajian Saya') }}

                        <div class="float-right"> --}}
                            {{-- <form action="{{route('Maklumat Pengajian Pelajar:index')}}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" value="{{request()->get('search')}}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Query</button>
                                    </div>
                                </div>
                            </form> --}}
                        {{-- </div>
                        
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif --}}
                        {{-- {{ __('Maklumat Pengajian Pelajar index') }} <a href="#" class="btn btn-light">Create</a> --}}
                        {{-- <a href="{{route('pelajar-pengajianpelajar:create')}}" class="btn btn-light">Create</a>

                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Bil</th>
                                    <th>Tahap</th>
                                    <th>Bidang</th>
                                    <th>Program</th>
                                    <th>Institusi</th>
                                    <th>Tarikh Mula</th>
                                    <th>Tarikh Tamat</th>
                                    <th>Tindakan</th>                       
                                </tr>
                                @foreach($pengajianPelajar as $key=>$pengajian)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$pengajian->tahap_pengajian->keterangan}}</td>
                                    <td>{{$pengajian->bidang->nama_bidang}}</td>
                                    <td>{{$pengajian->program_pengajian->keterangan}}</td>
                                    <td>{{$pengajian->institusi->keterangan}}</td>
                                    <td>
                                        @if($pengajian->tarikh_mula == null)
                                        Tiada Maklumat
                                        @else
                                        {{\Carbon\Carbon::parse($pengajian->tarikh_mula)->format('d/m/Y')}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($pengajian->tarikh_tamat == null)
                                        Tiada Maklumat
                                        @else
                                        {{\Carbon\Carbon::parse($pengajian->tarikh_tamat)->format('d/m/Y')}}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="row">
                                                <a href="{{route('pelajar-pengajianpelajar:show', $pengajian)}}" ><button class="btn btn-primary">Papar</button></a>
                                                <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="{{route('pelajar-pengajianpelajar:destroy', $pengajian)}}"><button class="btn btn-danger">Hapus</button></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                </div> --}}

                {{-- Try yajra --}}
                <div class="container mt-5">
                    {{-- <h2 class="mb-4">Negara</h2> --}}
                    <table class="table table-bordered pengajianPelajar-datatable">
                        <thead>
                            <tr>
                                <th>Bil</th>
                                <th>Tahap Pengajian</th>
                                <th>Bidang Pengajian</th>
                                <th>Tarikh Mula</th>
                                <th>Tarikh Tamat</th>
                                <th>
                                    <div class="sb-nav-link-icon">
                                        Tindakan
                                        <a href="{{route('pelajar-pengajianpelajar:create')}}"><i class="fa fa-plus-circle"></i></a>
                                        <a href="{{route('pelajar-pengajianpelajar:index')}}"><i class="fa fa-undo"></i></a>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                {{--  --}}

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function()
    {
      var table = $('.pengajianPelajar-datatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
              url : '{{ route('pelajar-pengajianpelajar:list') }}'
              },
          language: {url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json"},
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            //   {data: 'kod_negara', name: 'kod_negara'},
              {data: 'tahapPengajian', name: 'tahapPengajian'},
              {data: 'bidangPengajian', name: 'bidangPengajian'},
              {data: 'tarikhMulaPengajian', name: 'tarikhMulaPengajian'},
              {data: 'tarikhTamatPengajian', name: 'tarikhTamatPengajian'},
              {
                  data: 'action', 
                  name: 'action', 
                  orderable: true, 
                  searchable: true
              },
          ]
      });    
    });
  </script>

@endsection
