@extends('admin.layouts.main')
@section('body')
<div class="container-fluid">
    <h1 class="mt-4"> Senarai Pengguna</h1>
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
                        {{-- {{__('Senarai Pengguna') }} --}}
                        <div class="float-right">
                            {{-- <a href="{{ route('admin.create') }}" class="btn btn-info"> + Tambah Pengguna Baru</a> --}}
                            <a href="{{ route('admin.create') }}" title="Tambah Pengguna"><i class="fas fa-plus-circle fa-lg" style="color:blue"></i></a>
                        </div>
                        <ul class="nav nav-pills navtab-bg">
                            <li class="nav-item">
                                <a href="#admin" data-toggle="tab" aria-expanded="true" class="nav-link ml-0 active">
                                    <i class="mdi mdi-face-profile mr-1"></i>Admin
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#pegBEM" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-settings-outline mr-1"></i>Pegawai BEM
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#em" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-settings-outline mr-1"></i>EM
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#kedutaan" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-settings-outline mr-1"></i>Kedutaan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#pelajar" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-settings-outline mr-1"></i>Pelajar
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    {{-- <div class="tab-content">
                    <div class="tab-pane show active" id="admin"> --}}
                    {{-- <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Bil</th>
                                <th>No Kad Pengenalan</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tahap Capaian</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                            @foreach($senarai_admin as $key=>$admin)
                            <tr> --}}
                                {{-- <td>{{ $key+1 }}</td> --}}
                                {{-- <td>{{ $admin->no_kp }}</td> --}}
                                {{-- <td>{{ $admin->Nama }}</td> --}}
                                {{-- <td>{{ $admin->Emel }}</td> --}}
                                {{-- <td>{{ $admin->capaian->Keterangan }}</td> --}}
                                {{-- <td>
                                    @if($admin->Kod_Status == '1')
                                    Aktif
                                    @elseif($admin->Kod_Status == '0')
                                    Tidak Aktif
                                    @else
                                    Tiada Maklumat
                                @endif
                                   </td>
                                <td> --}}
                                    {{-- <a href="{{ route('admin.show',$admin) }}" class="btn btn-primary">Lihat</a> --}}
                                    {{-- <a href="{{ route('admin.show',$admin) }}" title="Lihat Maklumat Pengguna"><i class="fas fa-eye fa-lg"></i></a> --}}
                                    {{-- <i class="fas fa-pencil fa-lg" style="color:red"></i> --}}
                                    {{-- <i class="fas fa-pencil-alt fa-lg" style="color:grey"></i>
                                    <i class="fas fa-trash fa-lg" style="color:red"></i>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div> --}}
                    {{-- </div>
                    </div> --}}

                    <div class="tab-content">
                        <div class="tab-pane show active" id="admin">
                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i>ADMIN</h5>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Bil</th>
                                        <th>No Kad Pengenalan</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Tahap Capaian</th>
                                        <th>Status</th>
                                        <th>Tindakan</th>
                                    </tr>
                                    @foreach($senarai_admin as $key=>$admin)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $admin->no_kp }}</td>
                                        <td>{{ $admin->Nama }}</td>
                                        <td>{{ $admin->Emel }}</td>
                                        <td>{{ $admin->capaian->Keterangan }}</td>
                                        <td>
                                            @if($admin->Kod_Status == '1')
                                            Aktif
                                            @elseif($admin->Kod_Status == '0')
                                            Tidak Aktif
                                            @else
                                            Tiada Maklumat
                                        @endif
                                           </td>
                                        <td>
                                            <a href="{{ route('admin.show', $admin) }}" title="Lihat Maklumat Pengguna"><i class="fas fa-eye fa-lg"></i></a>
                                            {{-- <i class="fas fa-pencil-alt fa-lg" style="color:grey"></i> --}}
                                            <a href="#" title="Hapus Rekod Pengguna"><i class="fas fa-trash fa-lg" onclick="myFunction()" style="color:red"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <script>
                            function myFunction()
                            {
                              alert("Data yang dipadam tidak dapat dikembalikan. Anda yakin untuk menghapuskan data yang dipilih?");
                            }
                            </script>
                        <!-- end ADMIN content-->
        
                        <div class="tab-pane" id="pegBEM">
                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i>Pegawai BEM</h5>
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <th>Bil</th>
                                            <th>No Kad Pengenalan</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Tahap Capaian</th>
                                            <th>Status</th>
                                            <th>Tindakan</th>
                                        </tr>
                                        @foreach($senarai_pegBEM as $key=>$admin)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $admin->no_kp }}</td>
                                            <td>{{ $admin->Nama }}</td>
                                            <td>{{ $admin->Emel }}</td>
                                            <td>{{ $admin->capaian->Keterangan }}</td>
                                            <td>
                                                @if($admin->Kod_Status == '1')
                                                Aktif
                                                @elseif($admin->Kod_Status == '0')
                                                Tidak Aktif
                                                @else
                                                Tiada Maklumat
                                            @endif
                                               </td>
                                            <td>
                                                <a href="{{ route('admin.show',$admin) }}" title="Lihat Maklumat Pengguna"><i class="fas fa-eye fa-lg"></i></a>
                                                {{-- <i class="fas fa-pencil-alt fa-lg" style="color:grey"></i> --}}
                                                <a href="#" title="Hapus Rekod Pengguna"><i class="fas fa-trash fa-lg" onclick="myFunction2()" style="color:red"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                        </div>
                        <script>
                            function myFunction2()
                            {
                              alert("Data yang dipadam tidak dapat dikembalikan. Anda yakin untuk menghapuskan data yang dipilih?");
                            }
                            </script>
                        <!-- end PEGBEM content-->

                        <div class="tab-pane" id="em">
                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i>EM</h5>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Bil</th>
                                        <th>No Kad Pengenalan</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Tahap Capaian</th>
                                        <th>Status</th>
                                        <th>Tindakan</th>
                                    </tr>
                                    @foreach($senarai_EM as $key=>$admin)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $admin->no_kp }}</td>
                                        <td>{{ $admin->Nama }}</td>
                                        <td>{{ $admin->Emel }}</td>
                                        <td>{{ $admin->capaian->Keterangan }}</td>
                                        <td>
                                            @if($admin->Kod_Status == '1')
                                            Aktif
                                            @elseif($admin->Kod_Status == '0')
                                            Tidak Aktif
                                            @else
                                            Tiada Maklumat
                                        @endif
                                           </td>
                                        <td>
                                            <a href="{{ route('admin.show',$admin) }}" title="Lihat Maklumat Pengguna"><i class="fas fa-eye fa-lg"></i></a>
                                            {{-- <i class="fas fa-pencil-alt fa-lg" style="color:grey"></i> --}}
                                            <a href="#" title="Hapus Rekod Pengguna"><i class="fas fa-trash fa-lg" onclick="myFunction3()" style="color:red"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <script>
                            function myFunction3()
                            {
                              alert("Data yang dipadam tidak dapat dikembalikan. Anda yakin untuk menghapuskan data yang dipilih?");
                            }
                            </script>
                        <!-- end EM content-->

                    <div class="tab-pane" id="kedutaan">
                        <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i>Kedutaan</h5>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Bil</th>
                                    <th>No Kad Pengenalan</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tahap Capaian</th>
                                    <th>Status</th>
                                    <th>Tindakan</th>
                                </tr>
                                @foreach($senarai_kedutaan as $key=>$admin)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $admin->no_kp }}</td>
                                    <td>{{ $admin->Nama }}</td>
                                    <td>{{ $admin->Emel }}</td>
                                    <td>{{ $admin->capaian->Keterangan }}</td>
                                    <td>
                                        @if($admin->Kod_Status == '1')
                                        Aktif
                                        @elseif($admin->Kod_Status == '0')
                                        Tidak Aktif
                                        @else
                                        Tiada Maklumat
                                    @endif
                                       </td>
                                    <td>
                                        <a href="{{ route('admin.show',$admin) }}" title="Lihat Maklumat Pengguna"><i class="fas fa-eye fa-lg"></i></a>
                                        {{-- <i class="fas fa-pencil-alt fa-lg" style="color:grey"></i> --}}
                                        <a href="#" title="Hapus Rekod Pengguna"><i class="fas fa-trash fa-lg" onclick="myFunction4()" style="color:red"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>

                    <script>
                        function myFunction4()
                        {
                          alert("Data yang dipadam tidak dapat dikembalikan. Anda yakin untuk menghapuskan data yang dipilih?");
                        }
                        </script>
                    <!-- end KEDUTAAN content-->

                    <div class="tab-pane" id="pelajar">
                        <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i>Pelajar</h5>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Bil</th>
                                    <th>No Kad Pengenalan</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tahap Capaian</th>
                                    <th>Status</th>
                                    <th>Tindakan</th>
                                </tr>
                                @foreach($senarai_pelajar as $key=>$admin)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $admin->no_kp }}</td>
                                    <td>{{ $admin->Nama }}</td>
                                    <td>{{ $admin->Emel }}</td>
                                    <td>{{ $admin->capaian->Keterangan }}</td>
                                    <td>
                                        @if($admin->Kod_Status == '1')
                                        Aktif
                                        @elseif($admin->Kod_Status == '0')
                                        Tidak Aktif
                                        @else
                                        Tiada Maklumat
                                    @endif
                                       </td>
                                    <td>
                                        <a href="{{ route('admin.show',$admin) }}" title="Lihat Maklumat Pengguna"><i class="fas fa-eye fa-lg"></i></a>
                                        {{-- <i class="fas fa-pencil-alt fa-lg" style="color:grey"></i> --}}
                                        <a href="#" title="Hapus Rekod Pengguna"><i class="fas fa-trash fa-lg" onclick="myFunction5()" style="color:red"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <script>
                        function myFunction5()
                        {
                          alert("Data yang dipadam tidak dapat dikembalikan. Anda yakin untuk menghapuskan data yang dipilih?");
                        }
                        </script>
                    <!-- end PELAJAR content-->
        
                    </div> <!-- end tab-content -->
                    
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
