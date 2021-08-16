@extends('admin.layouts.main')
@section('body')
<div class="container-fluid">
    <h1 class="mt-4"> Senarai Penaja</h1>
    <div class="row">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                @if(session('danger'))
                <div class="alert alert-danger" role="alert">
                {{ session('danger') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        {{__('Senarai Penaja') }}
                        <div class="float-right">
                        {{-- <a href="" class="btn btn-info"> + Tambah Penaja Baru</a> --}}
                            {{-- <a href="{{Route('tajaan.create')}}" class="btn btn-info"> + Tambah Penaja Baru</a> --}}
                            <a href="{{Route('tajaan.create')}}" title="Tambah Penaja"><i class="fas fa-plus-circle fa-lg" style="color:blue"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Bil</th>
                                <th>Kod Penaja</th>
                                <th>Nama Penaja</th>
                                <th>Nama Singkatan</th>
                                <th>Tindakan</th>
                            </tr>
                            @foreach($senarai_tajaan as $key=>$penaja)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    @if($penaja->Kod_Penaja < 10)
                                        0{{$penaja->Kod_Penaja}}
                                    @else
                                        {{$penaja->Kod_Penaja}}
                                    @endif
                                </td>
                                <td>{{ $penaja->NamaPenaja }}</td>
                                <td>{{ $penaja->NamaSingkatan }}</td>
                                <td>
                                    {{-- <a href="{{ route('tajaan.lihat', $penaja)}}" class="btn btn-primary">Lihat</a> --}}
                                    <a href="{{ route('tajaan.lihat', $penaja)}}" title="Lihat Maklumat Penaja"><i class="fas fa-eye fa-lg"></i></a>
                                    {{-- <i class="fas fa-pencil fa-lg" style="color:red"></i> --}}
                                    <i class="fas fa-pencil-alt fa-lg" style="color:grey"></i>
                                    <i class="fas fa-trash fa-lg" style="color:red"></i>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
