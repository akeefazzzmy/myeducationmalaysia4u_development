{{-- @if(auth()->user()->Kod_Capaian != '04')
@else --}}

@extends('std.layouts.main')
@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Dashboard Pelajar</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard Pelajar</li>
    </ol>
    <div class="row">
            <div class="container">
                <div class="row justify-content">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{ __('Dashboard Pelajar') }}</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}

                                    </div>
                                @endif
                                {{ __('Anda berjaya Log Masuk!') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @endif --}}
