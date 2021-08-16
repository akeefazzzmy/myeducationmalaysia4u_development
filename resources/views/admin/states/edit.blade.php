@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Kemaskini <i>States</i></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-city"></i></div><a href="{{route('admin-states:index')}}"><i>States</i></a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-edit"></i></div>Kemaskini <i>States</i></li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">{{ __('States Edit') }}</div>--}}
                    <div class="card-header"><i>{{ __('States') }}</i> : {{$states->keterangan}}</div>

                    <div class="card-body">
                        <form method="POST">@csrf

                            {{-- <div class="form-group">
                                <label>Kod</label>
                                <input type="text" name="kod" class="form-control" value="{{$states->kod_states}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>States</label>
                                <input type="text" name="nama" class="form-control" value="{{$states->keterangan}}">
                            </div>
                            <div class="form-group">
                                <label>Negara</label>
                                <select name="negara" class="form-control">
                                    @foreach($senaraiNegara as $key => $negara)
                                        <option value="{{$negara->id}}">{{$negara->keterangan}}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            {{--  --}}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label>Kod <i>States</i> : {{$states->kod_states}}</label><br>
                                        <label><i>States</i> : {{$states->keterangan}}</label><br>
                                        {{-- <label>Dikemaskini Pada : {{$states->updated_at->format('d/m/Y')}}</label><br>
                                        <label>Dikemaskini Oleh : {{$states->no_kp_kemaskini}}</label> --}}
                                    </div>

                                    <div class="col-4">
                                        <input type="text" name="kod" class="form-control" value="{{$states->kod_states}}" hidden>
                                        <label><i>States</i></label>
                                        <input type="text" name="nama" class="form-control" value="{{$states->keterangan}}">
                                    </div>

                                    <div class="col-4">
                                        <label>Negara : {{$states->kod_negara}}</label>
                                        <select name="negara" class="form-control negara">
                                                <option value="{{$states->negara->kod_negara}}" selected>{{$states->negara->keterangan}}</option>
                                                <option disabled>---</option>
                                            @foreach($senaraiNegara as $key => $negara)
                                                <option value="{{$negara->kod_negara}}">{{$negara->kod_negara}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <a href="{{route('admin-states:index')}}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-success">Kemaskini</button><BR>
                                <label>Tarikh : {{date('d/m/Y')}}</label>
                            </div>
                            {{--  --}}


                            {{-- <div class="form-group">
                                <a href="{{route('admin-states:index')}}" class="btn btn-secondary">Kembali</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Kemaskini</button>
                            </div> --}}
                            
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection