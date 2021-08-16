@extends('layouts.admin.main')

@section('body')

<div class="container-fluid">
    <h1 class="mt-4">Daftar <i>States</i></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-code"></i></div>Pengurusan Kod</li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-city"></i></div><a href="{{route('admin-states:index')}}"><i>States</i></a></li>
        <li class="breadcrumb-item active"><div class="sb-nav-link-icon"><i class="fa fa-plus-circle"></i></div>Daftar <i> States</i></li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session()->has('alert-message'))
                    <div class="alert {{session()->get('alert-type')}}">
                        {{session()->get('alert-message')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Daftar States') }}</div>                

                    <div class="card-body">
                        <form action="{{route('admin-states:store')}}" method="POST" enctype="multipart/form-data">@csrf
                            {{-- <div class="form-group">
                                <label>Kod em</label>
                                <input type="text" name="kod_em" class="form-control">
                            </div> --}}

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label>Negara</label>
                                        {{-- <input type="text" name="negara" class="form-control"> --}}
                                        <select name="negara" class="form-control negara">
                                                <option disabled selected>Sila pilih negara</option>
                                                <option disabled>---</option>
                                            @foreach($senaraiNegara as $key => $negara)
                                                <option value="{{$negara->kod_negara}}">{{$negara->keterangan}}</option>
                                            @endforeach                                
                                        </select>
                                    </div>                                  
                                </div>
                                <br>
                                <div class="append-label2"></div>
                                <div class="append-label1"></div>
                                <div class="append-states"></div>                      
                            </div>

                            
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="append-inputDaftarState"></div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <label>Kod States</label>
                                <input type="text" name="kod" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>States</label>
                                <input type="text" name="nama" class="form-control">
                            </div> --}}
                            
                            <div class="form-group">
                                <div class="row">
                                    <a href="{{route('admin-states:index')}}" class="btn btn-secondary">Kembali</a>
                                    <div class="append-daftar-button"></div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> --}}

<script>
    $('.negara').on('change', function()
    {
        $('.append-states').empty();

        var kod_negara = $('.negara').val();
        // console.log(kod_negara);
        $.get('{{route("admin-populateStates")}}', {'kod_negara':kod_negara}, function(response)
        {
            console.log(response);
            $('.append-states').empty();
            $('.append-daftar-button').empty();
            $('.append-label1').empty();
            $('.append-label2').empty();
            $('.append-inputDaftarState').empty();

            // var daftarButton = '<button type="submit" class="btn btn-primary">Daftar</button>';
            // $('.append-daftar-button').append(daftarButton);

            // console.log(response.length);
            // var label1 = '<label>Tiada</label>';
            // $('.append-label1').append(label1);

            // $.each(response, function()
            // {
            //     var states = '<p>'+this.keterangan+'</p>';
            //     $('.append-states').append(states);
            // });

            // $.each(response.length, function()
            // {
            //     console.log(this);
            //     if(this > 0)
            //     {
            //         var states = '<p>'+this.keterangan+'</p>';
            //         $('.append-states').append(states);
            //     }
            //     else
            //     {
            //         var states = '<p>kosong</p>';
            //         $('.append-states').append(states);
            //     }
            // });

            if(response.length > 0)
            {
                var inputDaftarState = 'States<input name="nama" class="form-control" placeholder="Sila masukkan state yang ingin didaftarkan"></input>';
                $('.append-inputDaftarState').append(inputDaftarState);

                var label2 = '<label><h1>Senarai <i>States</i></h1></label>';
                $('.append-label2').append(label2);

                $.each(response, function()
                {
                    var states = '<p>'+this.keterangan+'</p>';
                    $('.append-states').append(states);
                });

                var daftarButton = '<button type="submit" class="btn btn-primary">Daftar</button>';
                $('.append-daftar-button').append(daftarButton); 
            }
            else
            {
                var label2 = '<label>Senarai <i>States</i></label>';
                $('.append-label2').append(label2);

                var label1 = '<label>Tiada Maklumat State</label>';
                $('.append-label1').append(label1);
                
                var inputDaftarState = 'States<input name="nama" class="form-control" placeholder="Sila masukkan state yang ingin didaftarkan></input>';
                $('.append-inputDaftarState').append(inputDaftarState);

                var daftarButton = '<button type="submit" class="btn btn-primary">Daftar</button>';
                $('.append-daftar-button').append(daftarButton); 
            }

        });
    });
</script>

@endsection