@extends('layouts.em.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Pengajian Pelajar</h1>
    <ol class="breadcrumb mb-4">
        {{-- <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengajian Pelajar</li> --}}
        <li class="breadcrumb-item active">Pengurusan Maklumat</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-certificate"></i></div>Pengajian Pelajar</li>
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
                            {{-- <form action="{{route('em-pengajianpelajar:index')}}" method="GET">@csrf --}}
                            <form method="POST" enctype="multipart/form-data">@csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nombor KP</label>
                                    <div class="col-sm-4">
                                        {{-- <input class="form-control" type="text" maxlength="12" name="nokp" value="{{ request()->get('NoKadPengenalanPelajar') }}" required> --}}
                                        <input class="form-control" type="text" maxlength="12" name="nokp" required>
                                    </div>
                                    @error('NoKadPengenalanPelajar')
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
</div>

<script>
                    
</script>
@endsection
