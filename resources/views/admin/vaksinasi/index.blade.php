@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Vaksinasi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-syringe"></i></div>Vaksinasi</li>
    </ol>

        @if(session()->has('alert-message'))
        <div class="alert {{session()->get('alert-type')}}">
        {{session()->get('alert-message')}}
        </div>
        @endif
        
    {{-- Status Vaksinasi DataTable --}}
    <div class="container mt-5">
        <div class="form-group">
            <div class="row">
                <div class="col-12">
                    <h4>Senarai Status Vaksinasi</h4>
                </div>
            </div>                            
        </div>
        <table class="table table-bordered vaksinasi-status-datatable">
            <thead>
                <tr>
                    <th>Bil</th>
                    {{-- <th>Kod</th> --}}
                    <th>Status</th>
                    <th>
                        <div class="sb-nav-link-icon">
                            Tindakan
                            <a href="{{route('admin-vaksinasi-status:create')}}"><i class="fa fa-plus-circle"></i></a>
                            <a href="{{route('admin-vaksinasi:index')}}"><i class="fa fa-undo"></i></a>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <div class="mb-4">
        {{-- <h6 class="text-uppercase">Solid</h6> --}}
        <!-- Solid divider -->
        <hr class="solid">
    </div>
    
    {{-- Senarai Jenis Vaksin DataTable --}}
    <div class="container mt-5">
        <div class="form-group">
            <div class="row">
                <div class="col-12">
                    <h4>Senarai Jenis Vaksin</h4>
                </div>
            </div>                            
        </div>
        <table class="table table-bordered vaksinasi-jenis-datatable">
            <thead>
                <tr>
                    <th>Bil</th>
                    {{-- <th>Kod</th> --}}
                    <th>Status</th>
                    <th>
                        <div class="sb-nav-link-icon">
                            Tindakan
                            <a href="{{route('admin-vaksinasi-jenis:create')}}"><i class="fa fa-plus-circle"></i></a>
                            <a href="{{route('admin-vaksinasi:index')}}"><i class="fa fa-undo"></i></a>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <div class="mb-4">
        {{-- <h6 class="text-uppercase">Solid</h6> --}}
        <!-- Solid divider -->
        <hr class="solid">
    </div>
    
</div>

<script type="text/javascript">

//vaksinasi-status-datatable
    $(function()
    {
    var table = $('.vaksinasi-status-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url : '{{ route('admin-vaksinasi-status:list') }}'
            },
        language: {url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json"},
        columns:
        [
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

//vaksinasi-jenis-datatable
$(function()
    {
    var table = $('.vaksinasi-jenis-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url : '{{ route('admin-vaksinasi-jenis:list') }}'
            },
        language: {url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json"},
        columns:
        [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_vaksin', name: 'nama_vaksin'},
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