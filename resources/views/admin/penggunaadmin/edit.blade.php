@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Kemaskini Admin</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>Pengguna Sistem</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fas fa-user"></i></div><a href="{{route('admin-penggunaAdmin:index')}}">Admin</a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-edit"></i></div>Kemaskini Admin</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Admin Edit') }}</div>                

                    <div class="card-body">
                        <form method="POST">
                            @csrf
                            <div class="form-group">
                                <label>No KP</label>
                                <input type="text" name="no_kp" class="form-control" value="{{$user->no_kp}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Admin</label>
                                <input type="text" name="nama" class="form-control" value="{{$user->name}}">
                            </div>
                            <div class="form-group">
                                <label>Emel</label>
                                <input type="text" name="emel" class="form-control" value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <label>No Tel</label>
                                <input type="text" name="no_tel" class="form-control" value="{{$user->no_tel}}">
                            </div>
                            <div class="form-group">
                                <label>Capaian Pengguna</label>
                                <select class="form-control capaianUser" name="capaianUser">
                                    <option value="{{$user->capaian_id}}" selected>{{$user->capaian->keterangan}}</option>
                                    <option disabled>---</option>
                                    @foreach($senaraiCapaian as $key=>$capaian)
                                    <option value="{{$capaian->id}}">{{$capaian->keterangan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group emDiv" hidden>
                                <label>Education Malaysia</label>
                                    <select class="form-control emSelect" name="em">
                                        {{-- <option value="{{$user->em_id}}" selected>{{$user->em->keterangan}}</option> --}}
                                        <option disabled>---</option>
                                        @foreach($senaraiEM as $key=>$em)
                                        <option value="{{$em->id}}">{{$em->keterangan}}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="form-group">
                                <label>Status Pengguna</label>
                                <select class="form-control" name="statusUser">
                                    <option value="{{$user->status_users_id}}" selected>{{$user->status_users->keterangan}}</option>
                                    <option disabled>---</option>
                                    @foreach($senaraiStatus as $key=>$status)
                                    <option value="{{$status->id}}">{{$status->keterangan}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="container">
                                <div class="row">
                                  <div class="col">
                                    <div class="form-group">
                                        <a href="{{route('admin-penggunaAdmin:index')}}" class="btn btn-secondary">Kembali</a>
                                    </div>
                                  </div>
                                  <div class="col">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Kemaskini</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
    $('.capaianUser').on('change', function()
    {
        var capaian = $('.capaianUser').val();
        // console.log(capaian);
        
        if(capaian == 3)
        {
            // console.log('keluar 3');
            $('.emDiv').prop('hidden', false);
        }
        else
        {
            // console.log('keluar lain');
            $('.emDiv').prop('hidden', true);
            // $('.emSelect').val(null);
        }
    });

</script>

@endsection