@extends('layouts.app')
@section('content')
<div class="mt-2 mb-4">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
        <div style="margin-left: 20px;">
            <x-page-title>
                Bienvenido de nuevo, {{ Auth('admin')->User()->firstName }}
                {{ Auth('admin')->User()->lastName }}!
            </x-page-title>
            <button class="mr-2 btn btn-success d-lg-inline" onclick="activarNoti()" id="botonNoti">Activar Sonido de
                notidifaciones</button>
        </div>
        @if (Auth('admin')->User()->type == 'Super Admin' || Auth('admin')->User()->type == 'Admin')
            <div class="py-2 ml-md-auto py-md-0">
                <a href="{{ route('mdeposits') }}" class="mr-2 btn btn-success d-lg-inline">Depósitos</a>
                <a href="{{ route('mwithdrawals') }}" class="mr-2 btn btn-danger d-lg-inline">Retiros</a>
                <a href="{{ route('manageusers') }}" class="btn btn-secondary d-none d-lg-inline">Usuarios</a>
            </div>
        @endif
    </div>
</div>

<div class="mt-2 mb-4">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
        <div style="margin-left: 20px;">
            <h5>Estado del servicio (<span id="estadoServicio"></span>)</h5>
        </div>
        <div class="py-2 ml-md-auto py-md-0" id="botonesEstado">
            <!--<a href="{{ route('mdeposits') }}" class="mr-2 btn btn-success d-lg-inline">Depósitos</a>
            <a href="{{ route('mwithdrawals') }}" class="mr-2 btn btn-danger d-lg-inline">Retiros</a>-->
        </div>
    </div>
</div>

<x-admin.alert />

<div class="row">
    <div class="col-sm">

        <script>

            async function activarNoti() {
                alert('Sonido activado');
                document.getElementById('botonNoti').setAttribute('style', 'display: none !important;');
            }

            let audioContext;

            // Inicializar AudioContext tras una interacción
            document.addEventListener('click', () => {
                if (!audioContext) {
                    audioContext = new (window.AudioContext || window.webkitAudioContext)();
                    console.log("AudioContext inicializado tras interacción.");
                }
            });

            async function playSound(cantidadRetiros, cantidadDepositos) {

                if (!audioContext) return;

                const response = await fetch("{{ asset('assets/sound/sonido.mp3') }}");
                const arrayBuffer = await response.arrayBuffer();
                const audioBuffer = await audioContext.decodeAudioData(arrayBuffer);

                const source = audioContext.createBufferSource();
                source.buffer = audioBuffer;
                source.connect(audioContext.destination);

                audioContext.resume().then(() => {
                    source.start(0);
                    console.log("Sonido reproducido automáticamente.");
                }).catch((error) => {
                    console.error("No se pudo reproducir automáticamente:", error);
                });
            }
        </script>

        <livewire:notificaciones />

    </div>
</div>

<div class="row">
    <div class="col-sm">

        <!-- Beginning of  Dashboard Stats  -->
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="flaticon-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Total users</p>
                                    <h4 class="card-title">{{ number_format($numberOfUsers) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="flaticon-interface-6"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Active Subscribers</p>
                                    <h4 class="card-title">{{ $subscribers }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                    <i class="flaticon-graph"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Total withdrawals</p>
                                    <h4 class="card-title">
                                        {{ $settings->currency }}{{ number_format($total_withdrawn) }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                    <i class="flaticon-success"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Total deposits</p>
                                    <h4 class="card-title">
                                        {{ $settings->currency }}{{ number_format($total_deposited) }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-danger bubble-shadow-small">
                                    <i class="flaticon-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Blocked users</p>
                                    <h4 class="card-title">{{ $blockedusers }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-warning bubble-shadow-small">
                                    <i class="flaticon-interface-6"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Active users</p>
                                    <h4 class="card-title">{{ $active_users }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-danger bubble-shadow-small">
                                    <i class="flaticon-graph"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Pending withdrawals</p>
                                    <h4 class="card-title">
                                        {{ $settings->currency }}{{ number_format($chart_pendwithdraw) }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="flaticon-success"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Pending deposits</p>
                                    <h4 class="card-title">
                                        {{ $settings->currency }}{{ number_format($chart_pendepsoit) }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Dashboard Stats  -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title">Users Statistics</div>
                        <div>
                            <p>{{ now()->format('Y') }}</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title fw-mediumbold">Latest users</div>
                        <div class="card-list">
                            @forelse ($latestUsers as $user)
                                <a href="{{ route('viewuser', ['id' => $user->id]) }}">
                                    <div class="item-list shadow-sm d-flex">
                                        <div class="info-user ml-3 text-decoration-none">
                                            <div class="username font-weight-bolder">{{ $user->name }}</div>
                                            <div class="status">{{ $user->email }}</div>
                                        </div>
                                        <div>
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </div>
                                </a>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Transactions</div>
                        <div class="overflow-auto">
                            <canvas id="myChart" height="100" class=""></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('dash/js/plugin/chart.js/chart.min.js') }}"></script>
    <script>
        //var data = @json($usersData);
        var userStats = {{ Illuminate\Support\Js::from($usersData) }};

        var lineChart = document.getElementById('lineChart').getContext('2d');
        var myLineChart = new Chart(lineChart, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Users registration",
                    borderColor: "#1d7af3",
                    pointBorderColor: "#FFF",
                    pointBackgroundColor: "#1d7af3",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 1,
                    pointRadius: 4,
                    backgroundColor: 'transparent',
                    fill: true,
                    borderWidth: 2,
                    data: userStats
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 10,
                        fontColor: '#1d7af3',
                    }
                },
                tooltips: {
                    bodySpacing: 4,
                    mode: "nearest",
                    intersect: 0,
                    position: "nearest",
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10
                },
                layout: {
                    padding: {
                        left: 15,
                        right: 15,
                        top: 15,
                        bottom: 15
                    }
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Processed Deposit', 'Pending Deposit', 'Processed Withdrawal', 'Pending Withdrawal'],
                datasets: [{
                    label: "# Transactions statistics in {{ $settings->currency }}",
                    data: [
                        "{{ $total_deposited }}",
                        "{{ $chart_pendepsoit }}",
                        "{{ $total_withdrawn }}",
                        "{{ $chart_pendwithdraw }}",
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush

<script>

    async function verEstadoServicio() {

        fetch('{{ route('dataservicio') }}', {
            method: 'GET',
            mode: 'no-cors',
        })
            .then(response => response.json())
            .then(data => {

                if(data.activo == 1){

                    document.getElementById('estadoServicio').innerHTML = 'Online';
                    document.getElementById('botonesEstado').innerHTML = '<form method="post" action="{{ route('updateservicio') }}">@csrf<input type="hidden" name="activo" value="0"><button type="submit" class="mr-2 btn btn-danger d-lg-inline">Desactivar</button></form>'
                }else{

                    document.getElementById('estadoServicio').innerHTML = 'Offline';
                    document.getElementById('botonesEstado').innerHTML = '<form method="post" action="{{ route('updateservicio') }}">@csrf<input type="hidden" name="activo" value="1"><button type="submit" class="mr-2 btn btn-success d-lg-inline">Activar</button></form>'
                }
            })
            .catch(error => console.error('Error:', error));
    }

    window.location.onload = verEstadoServicio();
</script>