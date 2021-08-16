@extends('layouts.em.main')

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
                    {{ __('Penaja Pengajian') }}

                    <div class="float-right">
                        {{-- <form action="{{route('Penaja Pengajian:index')}}" method="GET">
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
                    {{ __('Penaja Pengajian index') }} <a href="#" class="btn btn-light">Create</a>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Bil</th>
                                <th>Program Pengajian</th>
                                <th>Penaja</th>
                                <th>Tindakan</th>
                            @foreach($senaraiPenajaPengajian as $key=>$penajaPengajian)                        
                            </tr>
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$penajaPengajian->pengajian_pelajar_id}}</td>
                                <td>{{$penajaPengajian->penaja_id}}</td>                                
                                <td>
                                    {{-- <a href="{{route('em-penajapengajian:show', $penajaPengajian)}}" class="btn btn-primary">Show</a> --}}
                                    {{-- <a href="{{route('em-penajapengajian:edit', $penajaPengajian)}}" class="btn btn-success">Edit</a> --}}
                                    {{-- <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="{{route('em-penajapengajian:destroy', $penajaPengajian)}}" class="btn btn-danger">Delete</a> --}}
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
