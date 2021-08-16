@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Negara</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-flag"></i></div>Negara</li>
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
                    <div class="card-header"> --}}
                        {{-- {{ __('Negara') }} --}}

                        {{-- <div class="float-right">
                            <form action="{{route('admin-negara:index')}}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" value="{{request()->get('search')}}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><div class="sb-nav-link-icon"><i class="fa fa-search"></i></div></button>
                                    </div>
                                </div>
                            </form>
                        </div>  
                        
                    </div> --}}
                    {{-- <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif --}}
                        {{-- {{ __('Negara index') }} <a href="{{route('admin-negara:create')}}" class="btn btn-light">Create</a> --}}

                        {{-- <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Bil</th>
                                    <th>Kod</th>
                                    <th>Negara</th>
                                    <th>
                                        <div class="float-left">
                                            <div class="sb-nav-link-icon">
                                                Tindakan
                                                <a href="{{route('admin-negara:create')}}"><i class="fa fa-plus-circle"></i></a>
                                                <a href="{{route('admin-negara:index')}}"><i class="fa fa-undo"></i></a>
                                            </div>
                                        </div>
                                    </th>                                                    
                                </tr>
                                @foreach($senaraiNegara as $key=>$negara)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$negara->kod_negara}}</td>
                                    <td>{{$negara->keterangan}}</td>
                                    <td>
                                        <a href="{{route('admin-negara:show', $negara)}}" class="btn btn-primary">Papar</a>
                                        <a href="{{route('admin-negara:edit', $negara)}}" class="btn btn-success">Kemaskini</a>
                                        <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?')" href="{{route('admin-negara:destroy', $negara)}}" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            {{$senaraiNegara->links()}}
                        </div>

                    </div>
                </div> --}}

                {{-- Try yajra --}}
                <div class="container mt-5">
                    {{-- <h2 class="mb-4">Negara</h2> --}}
                    <table class="table table-bordered negara-datatable">
                        <thead>
                            <tr>
                                <th>Bil</th>
                                {{-- <th>Kod</th> --}}
                                <th>Negara</th>
                                <th>
                                    <div class="sb-nav-link-icon">
                                        Tindakan
                                        <a href="{{route('admin-negara:create')}}"><i class="fa fa-plus-circle"></i></a>
                                        <a href="{{route('admin-negara:index')}}"><i class="fa fa-undo"></i></a>
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
                      var table = $('.negara-datatable').DataTable({
                          processing: true,
                          serverSide: true,
                          ajax: {
                              url : '{{ route('admin-negara:list') }}'
                              },
                          language: {url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json"},
                          columns: [
                              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                            //   {data: 'kod_negara', name: 'kod_negara'},
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
