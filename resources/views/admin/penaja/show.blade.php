@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Papar Penaja</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fas fa-donate"></i></div><a href="{{route('admin-penaja:index')}}">Senarai Penaja</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div>Papar Penaja</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Penaja Show') }}</div>                

                    <div class="card-body">
                            <div class="form-group">
                                <label>Kod</label>
                                <input type="text" name="kod" class="form-control" value="{{$penaja->kod_penaja}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Singkatan Penaja</label>
                                <input type="text" name="singkatan" class="form-control" value="{{$penaja->singkatan}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Penaja</label>
                                <input type="text" name="nama" class="form-control" value="{{$penaja->keterangan}}" readonly>
                            </div>
                            <div class="form-group">
                                <table class="table">
                                    <label>Pelajar Yang Ditaja</label>
                                    <tr>
                                        <th>Bil</th>
                                        <th>Pelajar</th>
                                        <th>Institusi</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group">
                                <table class="table">
                                    <label>Pelajar Yang Ditaja</label>
                                    <tr>
                                        <th>Bil</th>
                                        <th>Pelajar</th>
                                        <th>Institusi</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group">
                                <a href="{{route('admin-penaja:index')}}" class="btn btn-secondary">Kembali</a>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection