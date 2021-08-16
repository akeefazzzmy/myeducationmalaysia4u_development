@extends('layouts.bem.main')

@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Profil Saya</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Kemaskini Kata Laluan</li>
    </ol>
    <div class="row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            <div class="card">
                <div class="card-header">{{ __('Kemaskini Kata Laluan') }}</div>

                <div class="card-body">
                <form action="{{ route('bem-update-password')}}" method="POST" enctype="multipart/form-data">
                 @csrf
                 <div class="form-group">
                        <label>Kata Laluan Baru</label>
                        <input class="form-control" type="password" name="password" required>
                         @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                     </div>
                     <div class="col text-center">
                    <button type="submit" class="btn btn-primary">Kemaskini Kata Laluan</button>
                     </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
