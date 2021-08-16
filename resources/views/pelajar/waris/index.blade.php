@extends('layouts.pelajar.main')

@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Senarai Waris</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Maklumat</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-users" aria-hidden="true"></i></div><a href="{{route('pelajar-waris:index')}}">Butiran Waris</a></li>
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
                        {{ __('Waris') }}

                        <div class="float-right"> --}}
                            {{-- <form action="{{route('Waris:index')}}" method="GET">
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
                        {{ __('Waris index') }} <a href="{{route('pelajar-waris:create')}}" class="btn btn-light">Create</a>

                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Bil</th>
                                    <th>Hubungan</th>
                                    <th>Nama</th>
                                    <th>Nombor Telefon</th>
                                    <th>Tindakan</th>                       
                                </tr>
                                @foreach($user->profil_pelajar->waris as $key => $waris)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$waris->hubungan->keterangan}}</td>
                                    <td>{{$waris->nama}}</td>
                                    <td>{{$waris->no_tel}}</td>
                                    <td>
                                        <a href="{{route('pelajar-waris:show', $waris)}}" class="btn btn-primary">Show</a>
                                        <a href="{{route('pelajar-waris:edit', $waris)}}" class="btn btn-success">Edit</a>
                                        <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="{{route('pelajar-waris:destroy', $waris)}}" class="btn btn-danger">Delete</a>
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
                    <table class="table table-bordered waris-datatable">
                        <thead>
                            <tr>
                                <th>Bil</th>
                                <th>Hubungan</th>
                                <th>Nama</th>
                                <th>
                                    <div class="sb-nav-link-icon">
                                        Tindakan
                                        <a href="{{route('pelajar-waris:create')}}"><i class="fa fa-plus-circle"></i></a>
                                        <a href="{{route('pelajar-waris:index')}}"><i class="fa fa-undo"></i></a>
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
                      var table = $('.waris-datatable').DataTable({
                          processing: true,
                          serverSide: true,
                          ajax: {
                              url : '{{ route('pelajar-waris:list') }}'
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
                  </script>
                  
            </div>
        </div>
    </div>
</div>
@endsection
