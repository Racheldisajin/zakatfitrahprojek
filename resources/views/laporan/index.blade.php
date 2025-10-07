@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-secondary-dark">Laporan Zakat</h1>
                <p class="mt-2 text-secondary-DEFAULT">Ringkasan dan laporan zakat tahun {{ $currentYear }}</p>
            </div>
            <div>
                <a href="{{ route('laporan.combined.pdf') }}" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition duration-300 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    Unduh Laporan Lengkap
                </a>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Muzakki Card -->
            <div class="bg-white rounded-xl shadow-custom overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-secondary-dark">Total Muzakki</h3>
                            <p class="text-3xl font-bold text-primary-DEFAULT">{{ $totalMuzakki }}</p>
                        </div>
                    </div>
                    <div class="mt-2 pt-2 border-t border-gray-100">
                        <p class="text-sm text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Jumlah pembayar zakat
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Total Mustahik Card -->
            <div class="bg-white rounded-xl shadow-custom overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="bg-yellow-50 p-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-secondary-dark">Total Mustahik</h3>
                            <p class="text-3xl font-bold text-primary-DEFAULT">{{ $totalMustahik }}</p>
                        </div>
                    </div>
                    <div class="mt-2 pt-2 border-t border-gray-100">
                        <p class="text-sm text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Jumlah penerima zakat
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Saldo Beras Card -->
            <div class="bg-white rounded-xl shadow-custom overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="bg-indigo-100 p-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"  d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-secondary-dark">Sisa Beras</h3>
                            <p class="text-3xl font-bold text-primary-DEFAULT">{{ number_format($berasBalance, 1) }} <span class="text-sm font-normal">kg</span></p>
                        </div>
                    </div>
                    <div class="mt-2 pt-2 border-t border-gray-100">
                        <p class="text-sm {{ $berasBalance < 0 ? 'text-red-500' : 'text-green-500' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M{{ $berasBalance < 0 ? '13 17l-5-5m0 0l5-5m-5 5h12' : '5 13l5-5m0 0l-5-5m5 5H7' }}" />
                            </svg>
                            {{ $berasBalance < 0 ? 'Defisit' : 'Surplus' }} beras
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Saldo Uang Card -->
            <div class="bg-white rounded-xl shadow-custom overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="bg-green-100 p-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-secondary-dark">Sisa Uang</h3>
                            <p class="text-2xl font-bold text-primary-DEFAULT">Rp {{ number_format($uangBalance, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="mt-2 pt-2 border-t border-gray-100">
                        <p class="text-sm {{ $uangBalance < 0 ? 'text-red-500' : 'text-green-500' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M{{ $uangBalance < 0 ? '13 17l-5-5m0 0l5-5m-5 5h12' : '5 13l5-5m0 0l-5-5m5 5H7' }}" />
                            </svg>
                            {{ $uangBalance < 0 ? 'Defisit' : 'Surplus' }} dana
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Report Type Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Pengumpulan Zakat Card -->
            <div class="bg-white rounded-xl shadow-custom overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-green-600 to-green-500 text-white">
                    <h2 class="text-xl font-bold flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Pengumpulan Zakat
                    </h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="text-center">
                            <div class="inline-block p-3 bg-green-100 rounded-full mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-sm text-gray-500 mb-1">Beras Terkumpul</h3>
                            <p class="text-xl font-bold text-green-600">{{ number_format($totalBerasCollected, 1) }} kg</p>
                        </div>
                        <div class="text-center">
                            <div class="inline-block p-3 bg-green-100 rounded-full mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-sm text-gray-500 mb-1">Uang Terkumpul</h3>
                            <p class="text-xl font-bold text-green-600">Rp {{ number_format($totalUangCollected, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <a href="{{ route('laporan.pengumpulan') }}" class="block w-full px-4 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg text-center transition duration-300 shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Lihat Laporan Pengumpulan
                    </a>
                </div>
            </div>
            
            <!-- Distribusi Zakat Card -->
            <div class="bg-white rounded-xl shadow-custom overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                    <h2 class="text-xl font-bold flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                        </svg>
                        Distribusi Zakat
                    </h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="text-center">
                            <div class="inline-block p-3 bg-blue-100 rounded-full mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-sm text-gray-500 mb-1">Beras Tersalurkan</h3>
                            <p class="text-xl font-bold text-blue-600">{{ number_format($totalBerasDistributed, 1) }} kg</p>
                        </div>
                        <div class="text-center">
                            <div class="inline-block p-3 bg-blue-100 rounded-full mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-sm text-gray-500 mb-1">Uang Tersalurkan</h3>
                            <p class="text-xl font-bold text-blue-600">Rp {{ number_format($totalUangDistributed, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <a href="{{ route('laporan.distribusi') }}" class="block w-full px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-center transition duration-300 shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Lihat Laporan Distribusi
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Combined Report Card -->
        <div class="bg-white rounded-xl shadow-custom overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-purple-600 to-purple-500 text-white">
                <h2 class="text-xl font-bold flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    Laporan Gabungan
                </h2>
            </div>
            <div class="p-6">
                <div class="aspect-w-16 aspect-h-9 h-64 mb-6">
                    <canvas id="comparisonChart"></canvas>
                </div>
                <div class="text-center">
                                        <p class="text-gray-600 mb-6">Laporan gabungan menampilkan data pengumpulan dan distribusi zakat dalam satu laporan lengkap.</p>
                    <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3 justify-center">
                        <a href="{{ route('laporan.combined') }}" class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-lg text-center transition duration-300 shadow flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Lihat Laporan Gabungan
                        </a>
                        <a href="{{ route('laporan.combined.pdf') }}" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg text-center transition duration-300 shadow flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                            Unduh PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Data for Comparison Chart
    const comparisonChartCtx = document.getElementById('comparisonChart').getContext('2d');
    const comparisonChart = new Chart(comparisonChartCtx, {
        type: 'bar',
        data: {
            labels: ['Beras', 'Uang'],
            datasets: [
                {
                    label: 'Pengumpulan Beras (kg)',
                    data: [{{ $totalBerasCollected }}, null],
                    backgroundColor: 'rgba(72, 187, 120, 0.7)',
                    borderColor: 'rgb(72, 187, 120)',
                    borderWidth: 1,
                    yAxisID: 'y-beras'
                },
                {
                    label: 'Distribusi Beras (kg)',
                    data: [{{ $totalBerasDistributed }}, null],
                    backgroundColor: 'rgba(72, 187, 120, 0.3)',
                    borderColor: 'rgb(72, 187, 120)',
                    borderWidth: 1,
                    yAxisID: 'y-beras'
                },
                {
                    label: 'Pengumpulan Uang (Rp)',
                    data: [null, {{ $totalUangCollected }}],
                    backgroundColor: 'rgba(66, 153, 225, 0.7)',
                    borderColor: 'rgb(66, 153, 225)',
                    borderWidth: 1,
                    yAxisID: 'y-uang'
                },
                {
                    label: 'Distribusi Uang (Rp)',
                    data: [null, {{ $totalUangDistributed }}],
                    backgroundColor: 'rgba(66, 153, 225, 0.3)',
                    borderColor: 'rgb(66, 153, 225)',
                    borderWidth: 1,
                    yAxisID: 'y-uang'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'Perbandingan Pengumpulan dan Distribusi Zakat {{ $currentYear }}'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                if (context.datasetIndex <= 1) {
                                    label += context.parsed.y.toFixed(1) + ' kg';
                                } else {
                                    label += 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                                }
                            }
                            return label;
                        }
                    }
                }
            },
            scales: {
                x: {
                    stacked: false,
                },
                'y-beras': {
                    type: 'linear',
                    position: 'left',
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Beras (kg)',
                        color: 'rgb(72, 187, 120)'
                    },
                    ticks: {
                        callback: function(value, index, values) {
                            return value.toFixed(1) + ' kg';
                        },
                        color: 'rgb(72, 187, 120)'
                    },
                    grid: {
                        drawOnChartArea: true,
                    }
                },
                'y-uang': {
                    type: 'linear',
                    position: 'right',
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Uang (Rp)',
                        color: 'rgb(66, 153, 225)'
                    },
                    ticks: {
                        callback: function(value, index, values) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        },
                        color: 'rgb(66, 153, 225)'
                    },
                    grid: {
                        drawOnChartArea: false,
                    }
                }
            }
        }
    });
});
</script>
@endpush
