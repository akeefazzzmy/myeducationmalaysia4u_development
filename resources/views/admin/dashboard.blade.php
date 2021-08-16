@extends('layouts.admin.main')

@section('body')
<div class="container-fluid">
    {{-- <h1 class="mt-4">Dashboard</h1>
    <div class="dropdown-divider"></div> --}}
    <div class="row">
        <div class="container">
            <div class="row justify-content">
                <div class="col-md-12">
                    @if(session()->has('alert-message'))
                        <div class="alert {{session()->get('alert-type')}}">
                            {{session()->get('alert-message')}}
                        </div>
                    @endif
                    {{-- <div class="card"> --}}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="dropdown-divider"></div> --}}
    <div class="row">
        <div class="container">
            <div class="row justify-content">
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
                            <h3><a href="{{route('admin-negara:index')}}">Butiran Lanjut</a></h3>
                        </div>
                    </div>
                </div>
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
                            <h3><a href="{{route('admin-penaja:index')}}">Butiran Lanjut</a></h3>
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
                            <h1>{{ __('Bidang Pengajian') }}</h1>
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
                                text: "Top Bidang Pengajian Pelajar"
                                }
                            }
                            });
                            </script>
                            </body>
                            <h3><a href="{{route('admin-states:index')}}">Butiran Lanjut</a></h3>
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
                            <h1>{{ __('Tahap Pengajian') }}</h1>
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
                                text: "Top Tahap Pengajian Pengajian Pelajar"
                                }
                            }
                            });
                            </script>
                            </body>
                            <h3><a href="{{route('admin-institusi:index')}}">Butiran Lanjut</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection