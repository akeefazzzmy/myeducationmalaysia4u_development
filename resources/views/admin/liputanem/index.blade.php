@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Senarai Liputan Education Malaysia</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-globe"></i></div>Senarai Liputan Education Malaysia</li>
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
                        {{ __('Liputan Educational Malaysia') }}

                        <div class="float-right"> --}}
                            {{-- <form action="{{route('Liputan Educational Malaysia:index')}}" method="GET">
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
                        {{ __('Liputan Educational Malaysia index') }} <a href="{{route('admin-liputanEm:create')}}" class="btn btn-light">Create</a>

                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Bil</th>
                                    <th>EM</th>
                                    <th>Negara</th>
                                    <th>Tindakan</th>
                                @foreach($liputanEm as $key=>$liputan)                        
                                </tr>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$liputan->em->keterangan}}</td>
                                    <td>{{$liputan->negara->keterangan}}</td>
                                    <td>
                                        <a href="{{route('admin-liputanEm:show', $liputan)}}" class="btn btn-primary">Show</a>
                                        <a href="{{route('admin-liputanEm:edit', $liputan)}}" class="btn btn-success">Edit</a>
                                        <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="{{route('admin-liputanEm:destroy', $liputan)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div> --}}
                    {{-- </div>
                </div> --}}

                {{-- YAJRA Datatable --}}
                <div class="container mt-5">
                    <table class="table table-bordered liputanEm-datatable">
                        <thead>
                            <tr>
                                <th>Bil</th>
                                <th>Negara</th>
                                <th>EM</th>
                                <th>Kod EM</th>
                                <th>
                                    <div class="sb-nav-link-icon">
                                        Tindakan
                                        <a href="{{route('admin-liputanEm:create')}}"><i class="fa fa-plus-circle"></i></a>
                                        <a href="{{route('admin-liputanEm:index')}}"><i class="fa fa-undo"></i></a>
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
                      var table = $('.liputanEm-datatable').DataTable({
                          processing: true,
                          serverSide: true,
                          ajax: {
                              url : '{{ route('admin-liputanEm:list') }}'
                              },
                          language: {url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json"},
                          columns: [
                              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                              {data: 'negara', name: 'negara'},
                              {data: 'em', name: 'em'},
                              {data: 'kod_em', name: 'kod_em'},
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
