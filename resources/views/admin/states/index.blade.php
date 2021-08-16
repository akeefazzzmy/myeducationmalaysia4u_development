@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4"><i>States</i></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-city"></i></div><i>States</i></li>
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
                        {{ __('States') }}

                        <div class="float-right"> --}}
                            {{-- <form action="{{route('States:index')}}" method="GET">
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
                        {{ __('States index') }} <a href="{{route('admin-states:create')}}" class="btn btn-light">Create</a>

                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Bil</th>
                                    <th>Kod</th>
                                    <th>State</th>
                                    <th>Negara</th>
                                    <th>Tindakan</th>
                                @foreach($states as $key=>$state)                        
                                </tr>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$state->kod_states}}</td>
                                    <td>{{$state->keterangan}}</td>
                                    <td>{{$state->negara->keterangan}}</td>
                                    <td>
                                        <a href="{{route('admin-states:show', $state)}}" class="btn btn-primary">Show</a>
                                        <a href="{{route('admin-states:edit', $state)}}" class="btn btn-success">Edit</a>
                                        <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="{{route('admin-states:destroy', $state)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            {{$states->links()}}
                        </div>

                    </div>
                </div> --}}

                Negara<br>
                <select class="form-control">
                        <option selected disabled>Sila pilih negara</option>
                        <option>SEMUA</option>
                    @foreach($senaraiNegara as $key => $negara)
                        <option>{{$negara->keterangan}}</option>
                    @endforeach                    
                </select>

                <div class="container mt-5">
                    {{-- <h2 class="mb-4">Negara</h2> --}}
                    <table class="table table-bordered states-datatable">
                        <thead>
                            <tr>
                                <th>Bil</th>
                                {{-- <th>Kod</th> --}}
                                <th><i>States</i></th>
                                <th>Negara</th>
                                <th>
                                    <div class="sb-nav-link-icon">
                                        Tindakan
                                        <a href="{{route('admin-states:create')}}"><i class="fa fa-plus-circle"></i></a>
                                        <a href="{{route('admin-states:index')}}"><i class="fa fa-undo"></i></a>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function()
    {
      var table = $('.states-datatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
              url : '{{ route('admin-states:list') }}'
              },
          language: {url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json"},
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            //   {data: 'kod_states', name: 'kod_states'},
              {data: 'keterangan', name: 'keterangan'},
              {data: 'negara', name: 'negara'},
            //   {data: 'negara_id', name: 'negara_id'},
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
