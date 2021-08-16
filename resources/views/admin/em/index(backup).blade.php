@extends('layouts.admin.main')

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
                    {{ __('Education Malaysia') }}

                    <div class="float-right">
                        {{-- <form action="{{route('Education Malaysia:index')}}" method="GET">
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
                    {{ __('Education Malaysia index') }} <a href="{{route('admin-em:create')}}" class="btn btn-light">Create</a>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Bil</th>
                                <th>Singkatan/Kod</th>
                                <th>Nama</th>
                                <th>Kod Negara</th>
                                <th>Tindakan</th>
                            @foreach($ems as $key=>$em)                        
                            </tr>
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$em->kod_em}}</td>
                                <td>{{$em->keterangan}}</td>
                                <td>{{$em->kod_negara_em}}</td>
                                <td>
                                    <a href="{{route('admin-em:show', $em)}}" class="btn btn-primary">Show</a>
                                    <a href="{{route('admin-em:edit', $em)}}" class="btn btn-success">Edit</a>
                                    <a onclick="return confirm('Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti mahu menghapuskan rekod yang dipilih?')" href="{{route('admin-em:destroy', $em)}}" class="btn btn-danger">Delete</a>
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
