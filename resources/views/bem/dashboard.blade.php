{{-- same like bem but no "add user" fx --}}
{{-- @extends('layouts.bem.main')

@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
            <div class="container">
                <div class="row justify-content">
                    <div class="col-md-12">
                        @if(session()->has('alert-message'))
                            <div class="alert {{session()->get('alert-type')}}">
                                {{session()->get('alert-message')}}
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                {{ __('Ruangan dashboard') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

@extends('layouts.bem.main')

@section('body')
<div class="container-fluid">
    {{-- <h1 class="mt-4">Dashboard</h1>
    <div class="dropdown-divider"></div> --}}
    <ol class="breadcrumb mb-4">
        {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
        <li class="breadcrumb-item active">Pengurusan Kod</li>
    </ol>
    <div class="row">
        <div class="container">
            <div class="row justify-content">
                <div class="col-md-6">
                    @if(session()->has('alert-message'))
                        <div class="alert {{session()->get('alert-type')}}">
                            {{session()->get('alert-message')}}
                        </div>
                    @endif
                    {{-- <div class="card"> --}}<div>
                        <div class="card-body">
                            <h1>{{ __('Penaja') }}</h1>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                            <body>

                            <canvas id="penajaChart" style="width:100%;max-width:600px"></canvas>

                            <script>
                            var xValues = ["GAMUDA", "MB", "STAR", "KWS", "ShellMAS"];
                            var yValues = [55, 49, 44, 24, 15];
                            var barColors = ["red", "green","blue","orange","brown"];

                            new Chart("penajaChart", {
                            type: "bar",
                            data: {
                                labels: xValues,
                                datasets: [{
                                backgroundColor: barColors,
                                data: yValues
                                }]
                            },
                            options: {
                                legend: {display: false},
                                title: {
                                display: true,
                                text: "Top Penaja Pengajian Pelajar"
                                }
                            }
                            });
                            </script>
                            </body>
                            <h3><a href="#">Butiran Lanjut</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    @if(session()->has('alert-message'))
                        <div class="alert {{session()->get('alert-type')}}">
                            {{session()->get('alert-message')}}
                        </div>
                    @endif
                    <div>
                        <div class="card-body">
                            <h1>{{ __('Negara') }}</h1>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                            <body>

                            <canvas id="negaraChart" style="width:100%;max-width:600px"></canvas>

                            <script>
                            var xValues = ["Negara A", "Negara B", "Negara C", "Negara D", "Negara E"];
                            var yValues = [55, 49, 44, 24, 15];
                            var barColors = ["red", "green","blue","orange","brown"];

                            new Chart("negaraChart", {
                            type: "bar",
                            data: {
                                labels: xValues,
                                datasets: [{
                                backgroundColor: barColors,
                                data: yValues
                                }]
                            },
                            options: {
                                legend: {display: false},
                                title: {
                                display: true,
                                text: "Top Negara Pengajian Pelajar"
                                }
                            }
                            });
                            </script>
                            </body>
                            <h3><a href="#">Butiran Lanjut</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    @if(session()->has('alert-message'))
                        <div class="alert {{session()->get('alert-type')}}">
                            {{session()->get('alert-message')}}
                        </div>
                    @endif
                    <div>
                        <div class="card-body">
                            <h1><i>{{ __('States') }}</i></h1>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                            <body>

                            <canvas id="statesChart" style="width:100%;max-width:600px"></canvas>

                            <script>
                            var xValues = ["State A", "State B", "State C", "State D", "State E"];
                            var yValues = [55, 49, 44, 24, 15];
                            var barColors = ["red", "green","blue","orange","brown"];

                            new Chart("statesChart", {
                            type: "bar",
                            data: {
                                labels: xValues,
                                datasets: [{
                                backgroundColor: barColors,
                                data: yValues
                                }]
                            },
                            options: {
                                legend: {display: false},
                                title: {
                                display: true,
                                text: "Top States Pengajian Pelajar"
                                }
                            }
                            });
                            </script>
                            </body>
                            <h3><a href="#">Butiran Lanjut</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    @if(session()->has('alert-message'))
                        <div class="alert {{session()->get('alert-type')}}">
                            {{session()->get('alert-message')}}
                        </div>
                    @endif
                    <div>
                        <div class="card-body">
                            <h1>{{ __('Institusi') }}</h1>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                            <body>

                            <canvas id="institusiChart" style="width:100%;max-width:600px"></canvas>

                            <script>
                            var xValues = ["University A", "University B", "University C", "University D", "University E"];
                            var yValues = [55, 49, 44, 24, 15];
                            var barColors = ["red", "green","blue","orange","brown"];

                            new Chart("institusiChart", {
                            type: "bar",
                            data: {
                                labels: xValues,
                                datasets: [{
                                backgroundColor: barColors,
                                data: yValues
                                }]
                            },
                            options: {
                                legend: {display: false},
                                title: {
                                display: true,
                                text: "Top Institusi Pengajian Pelajar"
                                }
                            }
                            });
                            </script>
                            </body>
                            <h3><a href="#">Butiran Lanjut</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    @if(session()->has('alert-message'))
                        <div class="alert {{session()->get('alert-type')}}">
                            {{session()->get('alert-message')}}
                        </div>
                    @endif
                    <div>
                        <div class="card-body">
                            <h1>{{ __('Program Pengajian') }}</h1>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                            <body>

                            <canvas id="programPengajianChart" style="width:100%;max-width:600px"></canvas>

                            <script>
                            var xValues = ["Program A", "Program B", "Program C", "Program D", "Program E"];
                            var yValues = [350, 230, 240, 521, 500];
                            var barColors = ["red", "green","blue","orange","brown"];

                            new Chart("programPengajianChart", {
                            type: "bar",
                            data: {
                                labels: xValues,
                                datasets: [{
                                backgroundColor: barColors,
                                data: yValues
                                }]
                            },
                            options: {
                                legend: {display: false},
                                title: {
                                display: true,
                                text: "Top Program Pengajian Pelajar"
                                }
                            }
                            });
                            </script>
                            </body>
                            <h3><a href="#">Butiran Lanjut</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    @if(session()->has('alert-message'))
                        <div class="alert {{session()->get('alert-type')}}">
                            {{session()->get('alert-message')}}
                        </div>
                    @endif
                        <div class="card-body">
                            <h1>{{ __('Status Pengajian Pelajar') }}</h1>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                            <body>

                            <canvas id="statusPengajianPelajarChart" style="width:100%;max-width:600px"></canvas>

                            <script>
                            // var xValues = ["Aktif", "Tidak Aktif", "Berhenti", "Gagal & Diberhentikan", "Meninggal Dunia"];
                            // var yValues = [771, 480, 240, 350, 0];
                            var xValues = ["Aktif", "Tidak Aktif"];
                            var yValues = [771, 480];
                            var barColors = ["red", "green","blue","orange","brown"];

                            new Chart("statusPengajianPelajarChart", {
                            type: "bar",
                            data: {
                                labels: xValues,
                                datasets: [{
                                backgroundColor: barColors,
                                data: yValues
                                }]
                            },
                            options: {
                                legend: {display: false},
                                title: {
                                display: true,
                                text: "Status Pengajian Pelajar"
                                }
                            }
                            });
                            </script>
                            </body>
                            <h3><a href="#">Butiran Lanjut</a></h3>
                        </div>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection