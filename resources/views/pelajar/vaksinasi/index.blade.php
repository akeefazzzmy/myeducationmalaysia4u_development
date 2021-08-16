@extends('layouts.pelajar.main')
@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Butiran Vaksinasi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengurusan Maklumat</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-medkit" aria-hidden="true"></i></div>Butiran Vaksinasi</li>
    </ol>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session()->has('alert-message'))
                    <div class="alert {{session()->get('alert-type')}}">
                        {{session()->get('alert-message')}}
                    </div>
                @endif

                 {{-- Try yajra --}}
                 <div class="container mt-5">
                    {{-- <h2 class="mb-4">Negara</h2> --}}                    
                    <table class="table table-bordered vaksinasi-datatable">
                        <thead>
                            <tr>
                                <th>Bil</th>
                                <th>Jenis</th>
                                <th>Status</th>                                
                                <th>
                                    <div class="sb-nav-link-icon">
                                        Tindakan
                                        <a href="{{route('pelajar-vaksinasi:create')}}"><i class="fa fa-plus-circle"></i></a>
                                        <a href="{{route('pelajar-vaksinasi:index')}}"><i class="fa fa-undo"></i></a>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @if (count($user->vaksinasi_pelajar) > 0)
                                @foreach($user->vaksinasi_pelajar as $key => $maklumatVaksinasiPelajar)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$maklumatVaksinasiPelajar->jenis_vaksin->nama_vaksin}}</td>
                                        <td>{{$maklumatVaksinasiPelajar->status_vaksinasi->keterangan}}</td>                                        
                                        <td>
                                            <a href="#" class="btn btn-primary">Papar</a>
                                            <a href="#" class="btn btn-success">Kemaskini</a>
                                            <a href="{{route('pelajar-vaksinasi:destroy', $maklumatVaksinasiPelajar)}}" onclick="return confirm('Rekod yang dihapus tidak boleh dikembalikan semula. Anda pasti mahu menghapuskan rekod yang dipilih?');" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" style="text-align:center">Tiada Maklumat</td>
                                </tr>
                            @endif
                        </tbody> --}}
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
      var table = $('.vaksinasi-datatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
              url : '{{ route('pelajar-vaksinasi:list') }}'
              },
          language: {url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json"},
          columns:
          [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'jenis', name: 'jenis'},
            {data: 'status', name: 'status'},
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