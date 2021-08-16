@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Senarai Education Malaysia') }}</div>
                <div class="card">
                <form action="" method="GET" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                    <div class="form-group row">

                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Education Malaysia') }}</label>
                        <div class="dropdown">
                                <select name="EM" class="form-control">
                               @foreach($senarai_EM as $em)
                                   <option value="  {{ $em->Kod_EM }}"> {{ $em->NamaEM}}</option>
                                @endforeach
                                 </select>
                            @error('EM')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card">
                        <button class="btn btn-primary" type="submit">Cari</button>
                        </div>
                    </div>
                    </div>
                    </form>

                    <table class="table">
                        <tr>
                            <th>Negara di bawah Liputan</th>

                        </tr>
                        @foreach($senarai_Liputan as $liput)
                        <tr>
                        <td>{{$liput->Kod_NegaraLiputan}}</td>
                        {{-- <td>{{$liput->negara->Keterangan}}</td> --}}
                        </tr>
                        @endforeach
                </div>


                </table>
            </div>
         </div>
        </div>
    </div>
@endsection

