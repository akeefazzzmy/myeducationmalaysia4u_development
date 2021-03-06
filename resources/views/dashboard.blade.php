@extends('admin.layouts.main')

@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
            <div class="container">
                <div class="row justify-content">
                    <div class="col-md-12">
                        <div class="card">
                        @if(auth()->user()->Kod_Capaian == '01')
                            <div class="card-header">{{ __('Dashboard For Admin') }}</div>
                        @elseif(auth()->user()->Kod_Capaian == '02')
                            <div class="card-header">{{ __('Dashboard For Pegawai BEM') }}</div>
                        @elseif(auth()->user()->Kod_Capaian == '03')
                            <div class="card-header">{{ __('Dashboard For Pegawai EM') }}</div>
                        @elseif(auth()->user()->Kod_Capaian == '05')
                            <div class="card-header">{{ __('Dashboard For Kedutaan') }}</div>
                        @endif
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                {{ __('You are logged in!') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @endif --}}