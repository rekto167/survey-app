@extends('layouts-admin.main')
@section('title', 'Dashboard')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate This Chart</a>
</div>
<div class="container">
    <div class="card">
        <div class="card-body">
            <canvas id="myChart" width="25" height="25"></canvas>
        </div>
    </div>
</div>
@push('javascript-tambahan')
    <script src="{{ asset('charts/chart.min.js') }}"></script>
    <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var dataEmotSatu = {!! json_encode($dataEmotSatu) !!};
    var dataEmotDua = {!! json_encode($dataEmotDua) !!};
    var dataEmotTiga = {!! json_encode($dataEmotTiga) !!};
    var dataEmotEmpat = {!! json_encode($dataEmotEmpat) !!};
    var dataEmotLima = {!! json_encode($dataEmotLima) !!};
    var days = {!! json_encode($days) !!};
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: days,
            datasets: [
            {
                label: 'Emot Sangat Buruk',
                data: dataEmotSatu,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(153, 0, 87, 132)',
                ],
                borderWidth: 1
            },
            {
                label: 'Emot Buruk',
                data: dataEmotDua,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 0, 0, 1)',
                ],
                borderWidth: 1
            },
            {
                label: 'Emot Sedang',
                data: dataEmotTiga,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 173, 0, 132)',
                ],
                borderWidth: 1
            },
            {
                label: 'Emot Bagus',
                data: dataEmotEmpat,
                backgroundColor: [
                    'rgba(0, 255, 255, 0.5)',
                ],
                borderColor: [
                    'rgba(0, 255, 255, 1)',
                ],
                borderWidth: 1
            },
            {
                label: 'Emot Sangat Bagus',
                data: dataEmotLima,
                backgroundColor: [
                    'rgba(0, 255, 13, 0.5)',
                ],
                borderColor: [
                    'rgba(0, 255, 13, 1)',
                ],
                borderWidth: 1
            },

        ]
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
@endsection