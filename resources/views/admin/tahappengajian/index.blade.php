@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Senarai Tahap Pengajian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-graduation-cap"></i></div>Tahap Pengajian</li>
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
                        {{ __('Tahap Pengajian') }}

                        <div class="float-right"> --}}
                            {{-- <form action="{{route('Tahap Pengajian:index')}}" method="GET">
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
                        @endif
                        {{ __('Tahap Pengajian index') }} <a href="{{route('admin-tahappengajian:create')}}" class="btn btn-light">Create</a>

                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Bil</th>
                                    <th>Kod</th>
                                    <th>Tahap</th>
                                    <th>Tindakan</th>
                                @foreach($tahapPengajian as $key=>$tahap)                        
                                </tr>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$tahap->kod_tahap}}</td>
                                    <td>{{$tahap->keterangan}}</td>
                                    <td>
                                        <a href="{{route('admin-tahappengajian:show', $tahap)}}" class="btn btn-primary">Show</a>
                                        <a href="{{route('admin-tahappengajian:edit', $tahap)}}" class="btn btn-success">Edit</a>
                                        <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="{{route('admin-tahappengajian:destroy', $tahap)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                </div> --}}

                {{-- Try yajra --}}
                <div class="container mt-5">
                    <table class="table table-bordered tahappengajian-datatable">
                        <thead>
                            <tr>
                                <th>Bil</th>
                                {{-- <th>Kod</th> --}}
                                <th>Tahap Pengajian</th>
                                <th>
                                    <div class="sb-nav-link-icon">
                                        Tindakan
                                        {{-- <a href="{{route('admin-tahappengajian:create')}}"><i class="fa fa-plus-circle"></i></a> --}}
                                        <a href="{{route('admin-tahappengajian:index')}}"><i class="fa fa-undo"></i></a>
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
                      var table = $('.tahappengajian-datatable').DataTable({
                          processing: true,
                          serverSide: true,
                          ajax: {
                              url : '{{ route('admin-tahappengajian:list') }}'
                              },
                          language: {url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json"},
                          columns: [
                              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                              {data: 'keterangan', name: 'keterangan'},
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
