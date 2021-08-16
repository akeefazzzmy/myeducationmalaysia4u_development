@extends('admin.layouts.main')
@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Senarai <i>State</i></h1>
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
                        {{__('Senarai State') }}
                        <div class="float-right">
                        {{-- <a href="{{Route('state.create')}}" class="btn btn-info"> + Tambah <i>State</i> Baru</a> --}}
                            <a href="{{Route('state.create')}}" title="Tambah State"><i class="fas fa-plus-circle fa-lg" style="color:blue"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Bil</th>
                                <th>Kod <i>State</i></th>
                                <th>Nama <i>State</i></th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                            @foreach($senarai_state as $key=>$state)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ $state->Kod_State }}</td>
                                <td>{{ $state->NamaState }}</td>
                                <td>
                                @if($state->Kod_Status == '1')
                                    Aktif
                                @elseif($state->Kod_Status == '0')
                                    Tidak Aktif
                                    @else
                                    Tiada Maklumat
                                @endif </td>
                                <td>
                                    {{-- <a href="{{ route('state.lihat', $state)}}" class="btn btn-primary">Lihat</a> --}}
                                    <a href="{{ route('state.lihat', $state)}}" title="Lihat Maklumat State"><i class="fas fa-eye fa-lg"></i></a>
                                    {{-- <i class="fas fa-pencil fa-lg" style="color:red"></i> --}}
                                    {{-- <i class="fas fa-pencil-alt fa-lg" style="color:grey"></i> --}}
                                    <a href="#" title="Hapus Rekod Pengguna"><i class="fas fa-trash fa-lg" onclick="myFunction()" style="color:red"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <script>
                        function myFunction()
                        {
                          alert("Data yang dipadam tidak dapat dikembalikan. Anda yakin untuk menghapuskan data yang dipilih?");
                        }
                        </script>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
