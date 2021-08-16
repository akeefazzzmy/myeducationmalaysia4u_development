@extends('layouts.bem.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Papar Liputan Education Malaysia</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-globe"></i></div><a href="{{route('bem-liputanEm:index')}}">Senarai Liputan Education Malaysia</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div>Papar Liputan Education Malaysia</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session()->has('alert-message'))
                    <div class="alert {{session()->get('alert-type')}}">
                        {{session()->get('alert-message')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Negara Liputan') }} {{$namaEM->keterangan}}</div>                

                    <div class="card-body">
                            {{-- <div class="form-group">
                                <label>Education Malaysia</label>
                                <input type="text" name="kod" class="form-control" value="{{$liputan->em->keterangan}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Negara</label>
                                <input type="text" name="nama" class="form-control" value="{{$liputan->negara->keterangan}}" readonly>
                            </div>
                            <div class="form-group">
                                <a href="{{route('bem-liputanEm:index')}}" class="btn btn-secondary">Kembali</a>
                            </div> --}}

                            <div class="form-group">
                                {{-- <p>{{$namaEM->keterangan}}</p> --}}
                            </div>
                            <div class="form-group">
                                @foreach($senaraiNegaraLiputanEm as $key=>$liputanEm)
                                <div class="sb-nav-link-icon">
                                    <p>{{$key+1}}) {{$liputanEm->negara->keterangan}}
                                        {{-- <a href="{{route('bem-liputanEm:edit', $liputanEm->id)}}"><i class="fa fa-edit" style="color:green"></i></a> --}}
                                        <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="{{route('bem-liputanEm:destroy', ['liputanEmID'=>$liputanEm->id, 'emID'=>$liputanEm->em_id])}}"><i class="fa fa-trash" style="color:red"></i></a>
                                    </p>
                                </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <a href="{{route('bem-liputanEm:index')}}" class="btn btn-secondary">Kembali</a>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection