@extends('layouts.em.main')

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
                    @if(session()->has('alert-message'))
                        <div class="alert {{session()->get('alert-type')}}">
                            {{session()->get('alert-message')}}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            {{ __('Ruangan dashboard') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection