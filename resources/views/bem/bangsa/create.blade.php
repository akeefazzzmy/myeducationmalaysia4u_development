@extends('layouts.bem.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Daftar Bangsa</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-flag-checkered"></i></div><a href="{{route('bem-bangsa:index')}}">Bangsa</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-plus-circle"></i></div>Daftar Bangsa</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Bangsa') }}</div>                

                    <div class="card-body">
                        <form action="{{route('bem-bangsa:store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">                        
                                <label>Kod</label>
                                <input type="text" name="kod" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Bangsa</label>
                                <input type="text" name="nama" class="form-control">
                            </div>                        
                            <div class="form-group">
                                <a href="{{route('bem-bangsa:index')}}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection