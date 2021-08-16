@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Papar <i>States</i></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-city"></i></div><a href="{{route('admin-states:index')}}"><i>States</i></a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div>Papar <i>States</i></li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">{{ __('States Show') }}</div>--}}
                    {{-- <div class="card-header">{{ __('Kod') }} : {{$states->kod_states}}</div> --}}
                    <div class="card-header"><i>{{ __('States') }}</i> : {{$states->keterangan}}</div>
                    
                    <div class="card-body">
                            {{-- <div class="form-group">
                                <label>Kod</label>
                                <input class="form-control" value="{{$states->kod_states}}" readonly>
                            </div> --}}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-2">
                                        <label>Kod <i>States</i></label>
                                        <input class="form-control" value="{{$states->kod_states}}" readonly>
                                    </div>
                                    <div class="col-2">
                                        {{-- <label>States</label>
                                        <input class="form-control" value="{{$states->keterangan}}" readonly> --}}
                                        <label>Negara</label>
                                        <input class="form-control" value="{{$states->negara->keterangan}}" readonly>
                                    </div>
                                    {{-- <div class="col-2">
                                        <label>Tarikh Diwujudkan</label>
                                        <input class="form-control" value="{{$states->created_at->format('d/m/Y')}}" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label>Tarikh Dikemaskini</label>
                                        <input class="form-control" value="{{$states->updated_at->format('d/m/Y')}}" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label>Diwujudkan Oleh</label>
                                        <input class="form-control" value="{{$states->no_kp_wujud}}" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label>Dikemaskini Oleh</label>
                                        <input class="form-control" value="{{$states->no_kp_kemaskini}}" readonly>
                                    </div> --}}
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label>Negara</label>
                                <input class="form-control" value="{{$states->negara->keterangan}}" readonly>
                            </div> --}}
                            <div class="form-group">
                                <a href="{{route('admin-states:index')}}" class="btn btn-secondary">Kembali</a>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection