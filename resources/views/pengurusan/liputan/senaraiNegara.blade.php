@extends('admin.layouts.main')
@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Senarai Negara Bawah Liputan ({{auth()->user()->Kod_Negara}})</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Charts</li>
    </ol>
    <div class="row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">                
                    @if(auth()->user()->Kod_Capaian == '02'){{-- Pegawai BEM --}}
                        @include('pengurusan.liputan.senaraiNegara-Bem')
                    
                    @elseif(auth()->user()->Kod_Capaian == '03'){{-- EM --}}
                        @include('pengurusan.liputan.senaraiNegara-Em')

                    @elseif(auth()->user()->Kod_Capaian == '05'){{-- Kedutaan --}}
                        @include('pengurusan.liputan.senaraiNegara-Duta')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
