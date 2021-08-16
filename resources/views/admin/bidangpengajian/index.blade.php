@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Senarai Bidang Pengajian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-book"></i></div>Bidang Pengajian</li>
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
                        {{ __('Bidang Pengajian') }} <a href="{{route('admin-bidangpengajian:create')}}" class="btn btn-light">Create</a> --}}

                        {{-- <div class="float-right">
                            <form action="{{route('Bidang Pengajian:index')}}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" value="{{request()->get('search')}}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Query</button>
                                    </div>
                                </div>
                            </form>
                        </div> --}}
                        
                    {{-- </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Bil</th>
                                    <th>Kod</th>
                                    <th>Bidang</th>
                                    <th>Broad(Umum) Field</th>
                                    <th>Narrow(Khusus) Field</th>                                    
                                    <th>Tindakan</th>
                                @foreach($senaraiBidang as $key => $bidang)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$bidang->kod_bidang}}</td>
                                    <td>{{$bidang->nama_bidang}}</td>
                                    <td>{{$bidang->broad_field}}</td>
                                    <td>{{$bidang->narrow_field}}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Show</a>
                                        <a href="#" class="btn btn-success">Edit</a>
                                        <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>                    
                </div> --}}

                {{-- YAJRA Datatable --}}
                <div class="container mt-5">
                    <table class="table table-bordered bidangpengajian-datatable">
                        <thead>
                            <tr>
                                <th>Bil</th>
                                {{-- <th>Kod</th> --}}
                                <th>Bidang</th>
                                <th>Broad(Umum) Field</th>
                                <th>Narrow(Khusus) Field</th>                                    
                                <th>
                                    <div class="sb-nav-link-icon">
                                        Tindakan
                                        <a href="{{route('admin-bidangpengajian:create')}}"><i class="fa fa-plus-circle"></i></a>
                                        <a href="{{route('admin-bidangpengajian:index')}}"><i class="fa fa-undo"></i></a>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

                <script type="text/javascript">
                    $(function()
                    {
                      var table = $('.bidangpengajian-datatable').DataTable({
                          processing: true,
                          serverSide: true,
                          ajax: {
                              url : '{{ route('admin-bidangpengajian:list') }}'
                              },
                          language: {url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json"},
                          columns: [
                              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                            //   {data: 'kod_bidang', name: 'kod_bidang'},
                              {data: 'nama_bidang', name: 'nama_bidang'},
                              {data: 'broad_field', name: 'broad_field'},
                              {data: 'narrow_field', name: 'narrow_field'},                              
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
                
            </div>
        </div>
    </div>
</div>
@endsection
