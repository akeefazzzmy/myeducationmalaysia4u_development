@extends('layouts.admin.main')
@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Papar Maklumat Education Malaysia</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-map-marker"></i></div><a href="{{route('admin-em:index')}}">Education Malaysia</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div>Papar</li>
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
                {{-- <div class="card-header">{{ __('Education Malaysia') }}</div>                 --}}

                <div class="card-body">
                    {{-- <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <h4>Maklumat {{$em->keterangan}} ({{$em->kod_em}})</h4>
                            </div>
                        </div>                            
                    </div> --}}

                    <div class="container mt-5">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <h4>Alamat</h4>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-12">
                                    <h6>{{$em->alamat}}</h6>
                                    <div class="form-group">
                                        <a href="{{route('admin-em:edit', $em)}}" class="btn btn-success">Kemaskini</a>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>

                        {{-- <div class="form-group">
                            <label>Kod Negara Education Malaysia</label>
                            <input type="text" name="kodNegaraEM" class="form-control" value="{{$em->kod_negara_em}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tarikh Dicipta</label>
                            <input type="text" name="created_at" class="form-control" value="{{$em->created_at}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tarikh Kemaskini</label>
                            <input type="text" name="updated_at" class="form-control" value="{{$em->updated_at}}" readonly>
                        </div> --}}
                        
                        {{-- YAJRA Datatable --}}
                        <div class="container mt-5">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12">
                                        <h4>Senarai Negara Liputan {{$em->keterangan}}</h4>
                                    </div>
                                </div>                            
                            </div>
                            <table class="table table-bordered negaraLiputan-datatable">
                                <thead>
                                    <tr>
                                        <th>Bil</th>
                                        {{-- <th>Kod Negara</th> --}}
                                        <th>Negara</th>
                                        <th>
                                            <div class="sb-nav-link-icon">
                                                Tindakan
                                                <a href="{{route('admin-em-createLiputan:create', $em)}}"><i class="fa fa-plus-circle"></i></a>
                                                <a href="{{route('admin-em:show', $em)}}"><i class="fa fa-undo"></i></a>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <div class="form-group">
                                <a href="{{route('admin-em:index')}}" class="btn btn-secondary">Kembali</a>
                                <a href="{{route('admin-em-createLiputan:create', $em)}}" class="btn btn-primary">Daftar Negara Liputan</a>
                            </div>
                        </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    $(function()
    {
      var table = $('.negaraLiputan-datatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
              url : '{{ route('admin-em:show', $em) }}'
              },
          language: {url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json"},
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            //   {data: 'kodNegara', name: 'kodNegara'},
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

@endsection