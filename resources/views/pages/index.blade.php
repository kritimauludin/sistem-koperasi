@extends('partials.template')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Anggota</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $countAnggota }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Angsuran</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countAngsuran }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Simpanan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $countSimpanan }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-box fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pinjaman</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $countPinjaman }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12 mb-2">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pinjaman</h6>
                </div>
                <div class="card-body">
                    <canvas id="monthlyPinjamanBarChart"></canvas>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Data Anggota</h6>
                </div>
                <div class="card-body">
                    <canvas id="jenisChart"></canvas>
                </div>
            </div>
        </div>



        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Data Simpanan</h6>
                </div>
                <div class="card-body">
                    <canvas id="myPieChart"></canvas>
                </div>
            </div>
        </div>


    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('jenisChart').getContext('2d');
            var jenisChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Anggota Baru', 'Anggota Lama'],
                    datasets: [{
                        data: [{{ $anggotaBaruCount }}, {{ $anggotaLamaCount }}],
                        backgroundColor: ['#36A2EB', '#FF6384'],
                    }]
                },
            });
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('myPieChart').getContext('2d');

        @if (!$simpananDatas->isEmpty())
            var jenisChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Pokok', 'Wajib', 'Sukarela'],
                    datasets: [{
                        data: [{{ $totalPokok }}, {{ $totalWajib }}, {{ $totalSukarela }}],
                        backgroundColor: ['#36A2EB', '#FF6384', '#FFCE56'],
                    }]
                },
            });
        @else
            // Tampilkan pesan atau lakukan sesuatu jika data kosong
            console.log('Tidak ada data untuk ditampilkan.');
        @endif
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('monthlyPinjamanBarChart').getContext('2d');
        var monthlyPinjamanBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    'Januari', 'Februari', 'Maret', 'April',
                    'Mei', 'Juni', 'Juli', 'Agustus',
                    'September', 'Oktober', 'November', 'Desember'
                ],
                datasets: [{
                    label: 'Jumlah Pinjaman',
                    data: [
                        @foreach($monthlySums as $sum)
                            {{ $sum }},
                        @endforeach
                    ],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
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
    });
</script>
@endsection
