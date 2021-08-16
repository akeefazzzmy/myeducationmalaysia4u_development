@extends('admin.layouts.main')
@section('body')
<div class="container-fluid">
    <h1 class="mt-4"> Senarai Institusi</h1>
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
                        {{__('Senarai Institusi') }}
                        <div class="float-right">
                        {{-- <a href="{{Route('institusi.create')}}" class="btn btn-info"> + Tambah Institusi Baru</a> --}}
                        <a href="{{Route('institusi.create')}}" title="Tambah Institusi"><i class="fas fa-plus-circle fa-lg" style="color:blue"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Bil</th>
                                <th>Kod Institusi</th>
                                <th>Nama Institusi</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                            @foreach($senarai_inst as $key=>$institusi)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $institusi->Kod_Institusi }}</td>
                                <td>{{ $institusi->NamaInstitusi }}</td>
                                <td>
                                    @if($institusi->Kod_Status == '1')
                                        Aktif
                                    @elseif($institusi->Kod_Status == '0')
                                        Tidak Aktif
                                    @else
                                        Tiada Maklumat
                                    @endif
                                   </td>
                                <td>
                                    {{-- <a href="{{ route('institusi.lihat', $institusi)}}" class="btn btn-primary">Lihat</a> yang asal --}}
                                    {{-- <a href="{{ route('institusi.lihat', $institusi->Id)}}" class="btn btn-primary">Lihat</a> --}}
                                    <a href="{{ route('institusi.lihat', $institusi->Id)}}" title="Lihat Maklumat Institusi"><i class="fas fa-eye fa-lg"></i></a>
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
