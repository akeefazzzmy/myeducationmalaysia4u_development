@extends('admin.layouts.main')
@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Carian Pelajar</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Carian</li>
    </ol>
    <div class="row">
            <div class="container">
                <div class="row justify-content">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{ __('Carian Maklumat Pelajar') }}</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="card-body">
                                {{-- <form action="{{ route('pelajar.list')}}" method="POST" enctype="multipart/form-data">
                                 @csrf
                                 <div class="form-group row">
                                    <label for="no_kpPelajar" class="col-sm-3 col-form-label">NO KAD PENGENALAN</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" maxlength="12" name="no_kpPelajar" value="{{ request()->get('no_kpPelajar') }}" required>
                                    </div>
                                    @error('no_kpPelajar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                    <button type="submit" class="btn btn-primary">Cari Pelajar</button>
                                    </div>
                                </form> --}}
                                <form action="{{ route('pelajar.list')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                       <label for="no_kpPelajar" class="col-sm-3 col-form-label">NO KAD PENGENALAN</label>
                                       <div class="col-sm-4">
                                           <input class="form-control" type="text" maxlength="12" name="no_kpPelajar" required>
                                       </div>
                                       @error('no_kpPelajar')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                       <button type="submit" class="btn btn-primary">Cari Pelajar</button>
                                       </div>
                                   </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
