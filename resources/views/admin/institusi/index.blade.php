@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Senarai Institusi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-university"></i></div>Senarai Institusi</li>
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
                        {{ __('Institusi') }}

                        <div class="float-right"> --}}
                            {{-- <form action="{{route('Institusi:index')}}" method="GET">
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
                        {{ __('Institusi index') }} <a href="{{route('admin-institusi:create')}}" class="btn btn-light">Create</a>

                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Bil</th>
                                    <th>Kod Institusi</th>
                                    <th>Institusi</th>
                                    <th>States</th>
                                    <th>Negara</th>
                                    <th>Tindakan</th>
                                @foreach($senaraiInstitusi as $key=>$institusi)                        
                                </tr>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$institusi->kod_states}}</td>
                                    <td>{{$institusi->keterangan}}</td>
                                    {{-- <td>{{$institusi['states']}}</td> --}}
                                    {{-- <td>{{ $institusi->states->keterangan ?? ' ' }}</td>
                                    <td>{{ $institusi->states->negara->keterangan ?? ' ' }}</td> --}}
                                    {{-- <td>{{$institusi->states[["'id'"]]}}</td> --}}
                                    {{-- <td>
                                        <a href="{{route('admin-institusi:show', $institusi)}}" class="btn btn-primary">Show</a>
                                        <a href="{{route('admin-institusi:edit', $institusi)}}" class="btn btn-success">Edit</a>
                                        <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="{{route('admin-institusi:destroy', $institusi)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div> --}}
                    {{-- </div> --}}
                {{-- </div> --}}

                {{-- Try yajra --}}
                <div class="container mt-5">
                    {{-- <h2 class="mb-4">Negara</h2> --}}
                    <table class="table table-bordered institusi-datatable">
                        <thead>
                            <tr>
                                <th>Bil</th>
                                {{-- <th>Kod Institusi</th> --}}
                                <th>Institusi</th>
                                <th><i>States</i></th>
                                <th>Negara</th>
                                <th>
                                    <div class="sb-nav-link-icon">
                                        Tindakan
                                        <a href="{{route('admin-institusi:create')}}"><i class="fa fa-plus-circle"></i></a>
                                        <a href="{{route('admin-institusi:index')}}"><i class="fa fa-undo"></i></a>
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
                      var table = $('.institusi-datatable').DataTable({
                          processing: true,
                          serverSide: true,
                          ajax: {
                              url : '{{ route('admin-institusi:list') }}'
                              },
                          language: {url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json"},
                          columns:
                          [
                              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                            //   {data: 'kod_institusi', name: 'kod_institusi'},
                              {data: 'keterangan', name: 'keterangan'},
                              {data: 'states', name: 'states'},
                              {data: 'negara', name: 'negara'},
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
