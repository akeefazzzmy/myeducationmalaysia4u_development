@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->has('alert-message'))
                <div class="alert {{session()->get('alert-type')}}">
                    {{session()->get('alert-message')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    {{ __('Maklumat Pengajian Pelajar') }}

                    <div class="float-right">
                        {{-- <form action="{{route('Maklumat Pengajian Pelajar:index')}}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" value="{{request()->get('search')}}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Query</button>
                                </div>
                            </div>
                        </form> --}}
                    </div>
                    
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('Maklumat Pengajian Pelajar index') }} <a href="#" class="btn btn-light">Create</a>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Bil</th>
                                <th>Profil Pelajar</th>
                                <th>Program Pengajian</th>
                                <th>Tahap Pengajian</th>
                                <th>Institusi Pengajian</th>
                                <th>Tindakan</th>
                            @foreach($pengajianPelajar as $key=>$pengajian)                        
                            </tr>
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$pengajian->profil_pelajar->users->name}}</td>
                                <td>{{$pengajian->program_pengajian->keterangan}}</td>
                                <td>{{$pengajian->program_pengajian->tahap_pengajian->keterangan}}</td>
                                <td>{{$pengajian->program_pengajian->institusi->keterangan}}</td>
                                <td>
                                    <a href="#" class="btn btn-primary">Show</a>
                                    <a href="#" class="btn btn-success">Edit</a>
                                    <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="#" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        {{-- {{$penajas->links()}} --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
