@extends('admin.layouts.main')
@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Senarai Institusi Bawah Liputan ({{auth()->user()->Kod_Negara}})</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Charts</li>
    </ol>
    <div class="row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    @if(auth()->user()->Kod_Capaian == '03'){{-- EM --}}
                    {{--  --}}
                    <div class="card">
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <label>{{__('State Bawah Negara Liputan')}} ({{auth()->user()->Kod_Negara}})</label>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Kod State</th>
                                            <th>Kod Institusi</th>
                                            <th>Nama Institusi</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($institusi as $institusis)
                                        <tr>
                                            <td>{{$institusis->Kod_State}}</td>
                                            <td>{{$institusis->Kod_Institusi}}</td>
                                            <td>{{$institusis->NamaInstitusi}}</td>
                                            <td>
                                                <a href="#" title="Lihat"><i class="fas fa-eye fa-lg"></i></a>
                                                {{-- <i class="fas fa-pencil-alt fa-lg" style="color:grey"></i> --}}
                                                <a href="#" title="Hapus Rekod Pengguna"><i class="fas fa-trash fa-lg" onclick="myFunction()" style="color:red"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <script>
                        function myFunction()
                        {
                          alert("Data yang dipadam tidak dapat dikembalikan. Anda yakin untuk menghapuskan data yang dipilih?");
                        }
                        </script>
                    {{--  --}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
