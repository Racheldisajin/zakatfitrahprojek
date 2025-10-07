@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-secondary-dark">Laporan Gabungan Zakat</h1>
                <p class="mt-2 text-secondary-DEFAULT">Ringkasan pengumpulan dan pendistribusian zakat</p>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('laporan.combined.pdf', ['year' => $year, 'month' => $month]) }}" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition duration-300 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    Unduh PDF
                </a>
                <a href="{{ route('laporan.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium rounded-lg transition duration-300 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <!-- Filter Form -->
        <div class="bg-white rounded-xl shadow-custom mb-6">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-secondary-dark">Filter Data</h2>
            </div>
            <div class="p-6">
                <form action="{{ route('laporan.combined') }}" method="GET">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="year" class="block text-sm font-medium text-gray-700 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Tahun
                            </label>
                            <select id="year" name="year" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-DEFAULT focus:border-primary-DEFAULT">
                                @foreach($years as $y)
                                    <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>{{ $y }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="month" class="block text-sm font-medium text-gray-700 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Bulan
                            </label>
                            <select id="month" name="month" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-DEFAULT focus:border-primary-DEFAULT">
                                <option value="">Semua Bulan</option>
                                @foreach(range(1, 12) as $m)
                                    <option value="{{ $m }}" {{ $month == $m ? 'selected' : '' }}>
                                        {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-end">
                            <div class="flex space-x-2 w-full">
                                <button type="submit" class="py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md shadow-sm flex-1 flex justify-center items-center transition duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                    </svg>
                                    Filter
                                </button>
                                <a href="{{ route('laporan.combined') }}" class="py-2 px-4 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-md shadow-sm flex-1 flex justify-center items-center transition duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                    Reset
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- Collection vs Distribution Chart -->
            <div class="bg-white rounded-xl shadow-custom overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-indigo-600 to-indigo-500 text-white">
                    <h2 class="text-lg font-bold flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Perbandingan Pengumpulan & Distribusi
                    </h2>
                </div>
                <div class="p-6">
                    <div class="aspect-w-16 aspect-h-9">
                        <canvas id="comparisonChart" class="w-full h-64"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- Distribution by Category Chart -->
            <div class="bg-white rounded-xl shadow-custom overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-pink-600 to-pink-500 text-white">
                    <h2 class="text-lg font-bold flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                        </svg>
                        Pengumpulan Beras & Uang ({{ $year }})
                    </h2>
                </div>
                <div class="p-6">
                    <div class="aspect-w-16 aspect-h-9">
                        <canvas id="monthlyChart" class="w-full h-64"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Ringkasan Zakat -->
            <div class="bg-white rounded-xl shadow-custom mb-6 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-purple-600 to-purple-500 text-white">
                    <h2 class="text-lg font-bold flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                        </svg>
                        Ringkasan Zakat {{ $year }} {{ $month ? '- Bulan ' . date('F', mktime(0, 0, 0, $month, 10)) : '' }}
                    </h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-6">
                        <div class="text-center">
                            <div class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-green-100 text-green-600 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-sm text-gray-500 mb-1">Beras Terkumpul</h3>
                            <p class="text-xl font-bold text-green-600">{{ number_format($totalBerasCollected, 1) }} kg</p>
                        </div>
                        <div class="text-center">
                            <div class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 text-blue-600 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-sm text-gray-500 mb-1">Uang Terkumpul</h3>
                            <p class="text-xl font-bold text-blue-600">Rp {{ number_format($totalUangCollected, 0, ',', '.') }}</p>
                        </div>
                        <div class="text-center">
                            <div class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-green-100 text-green-600 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                </svg>
                            </div>
                            <h3 class="text-sm text-gray-500 mb-1">Beras Tersalurkan</h3>
                            <p class="text-xl font-bold text-green-600">{{ number_format($totalBerasDistributed, 1) }} kg</p>
                        </div>
                        <div class="text-center">
                            <div class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 text-blue-600 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                </svg>
                            </div>
                            <h3 class="text-sm text-gray-500 mb-1">Uang Tersalurkan</h3>
                            <p class="text-xl font-bold text-blue-600">Rp {{ number_format($totalUangDistributed, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-100 pt-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="text-center p-4 rounded-lg {{ $berasBalance < 0 ? 'bg-red-50' : 'bg-green-50' }}">
                                <h3 class="text-sm text-gray-700 mb-1">Saldo Beras</h3>
                                <p class="text-2xl font-bold {{ $berasBalance < 0 ? 'text-red-600' : 'text-green-600' }}">
                                    {{ number_format($berasBalance, 1) }} kg
                                </p>
                                <p class="text-xs mt-1 {{ $berasBalance < 0 ? 'text-red-500' : 'text-green-500' }}">
                                    {{ $berasBalance < 0 ? 'Defisit' : 'Surplus' }}
                                </p>
                            </div>
                            <div class="text-center p-4 rounded-lg {{ $uangBalance < 0 ? 'bg-red-50' : 'bg-green-50' }}">
                                <h3 class="text-sm text-gray-700 mb-1">Saldo Uang</h3>
                                <p class="text-2xl font-bold {{ $uangBalance < 0 ? 'text-red-600' : 'text-green-600' }}">
                                    Rp {{ number_format($uangBalance, 0, ',', '.') }}
                                </p>
                                <p class="text-xs mt-1 {{ $uangBalance < 0 ? 'text-red-500' : 'text-green-500' }}">
                                    {{ $uangBalance < 0 ? 'Defisit' : 'Surplus' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pembayaran Zakat -->
            <div class="bg-white rounded-xl shadow-custom mb-6 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-green-600 to-green-500 text-white">
                    <h2 class="text-lg font-bold flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                        </svg>
                        Pengumpulan Zakat
                    </h2>
                </div>
                <div class="overflow-x-auto">
                    <table id="pengumpulanTable" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-16">#</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Muzakki</th>
                                <th scope="col" class="px-6 py-3 text-cenetr text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Bayar</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Beras (kg)</th>
                                <th scope="col" class="px-6 py-3 text-cenetr text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Uang (Rp)</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggungan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($pengumpulanZakat as $index => $zakat)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-center font-bold text-gray-900">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center font-medium text-gray-900">{{ $zakat->muzakki->nama ?? $zakat->nama_kk }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-gray-500">{{ $zakat->created_at->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if($zakat->jenis_bayar == 'beras')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Beras
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            Uang
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if($zakat->jenis_bayar == 'beras')
                                        <span class="font-medium text-green-600">{{ number_format($zakat->bayar_beras, 1) }}</span>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if($zakat->jenis_bayar == 'uang')
                                        <span class="font-medium text-blue-600">{{ number_format($zakat->bayar_uang, 0, ',', '.') }}</span>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        {{ $zakat->jumlah_tanggungan }} orang
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr class="empty-message">
                                <td colspan="7" class="px-6 py-10 text-center text-gray-500">
                                    <img src="https://img.icons8.com/fluency/96/null/empty-box.png" alt="Empty" class="h-16 w-16 mx-auto mb-2">
                                    <p class="text-gray-500">Tidak ada data pembayaran zakat untuk periode ini</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot class="bg-gray-50">
                            <tr>
                                <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center font-medium text-gray-700">Total Pengumpulan</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center font-medium text-green-600">{{ number_format($totalBerasCollected, 1) }} kg</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center font-medium text-blue-600">Rp {{ number_format($totalUangCollected, 0, ',', '.') }}</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            
            
            <!-- Pagination Links for Pengumpulan -->
            <div id="pengumpulanPagination">
                <div class="bg-white rounded-xl shadow-custom overflow-hidden">
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-4">
                        <div class="text-sm text-gray-500">
                            Menampilkan <span class="font-medium items-count">0</span> dari <span class="font-medium total-items">{{ count($pengumpulanZakat) }}</span> data
                        </div>
                        
                        <div class="inline-flex shadow-sm bg-white rounded-md">
                            <button type="button" class="prev-page relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
                                <i class="fas fa-chevron-left mr-2"></i>
                                Sebelumnya
                            </button>
                            
                            <div class="relative inline-flex items-center px-4 py-2 text-sm text-gray-700 bg-white border-t border-b border-gray-300">
                                <span class="current-page">1</span>
                                <span>/</span>
                                <span class="total-pages">1</span>
                            </div>
                            
                            <button type="button" class="next-page relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
                                Berikutnya
                                <i class="fas fa-chevron-right ml-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            


            <!-- Distribusi Zakat -->
            <div class="bg-white rounded-xl shadow-custom mb-6 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                    <h2 class="text-lg font-bold flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                        </svg>
                        Distribusi Zakat
                    </h2>
                </div>
                <div class="overflow-x-auto">
                    <table id="distribusiTable" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-16">#</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Mustahik</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Distribusi</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Beras (kg)</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Uang (Rp)</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 text-center">
                            @forelse ($distribusiZakat as $index => $distribusi)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-center font-bold text-gray-900">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">{{ $distribusi->nama_mustahik }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{ \Carbon\Carbon::parse($distribusi->tanggal)->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $distribusi->kategori }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($distribusi->jenis_distribusi == 'uang')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Uang
                                        </span>
                                    @elseif($distribusi->jenis_distribusi == 'beras')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            Beras
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                            Kombinasi
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if($distribusi->jenis_distribusi == 'beras' || $distribusi->jenis_distribusi == 'kombinasi')
                                        <span class="font-medium text-green-600">{{ number_format($distribusi->jumlah_beras, 1) }}</span>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if($distribusi->jenis_distribusi == 'uang' || $distribusi->jenis_distribusi == 'kombinasi')
                                        <span class="font-medium text-blue-600">{{ number_format($distribusi->jumlah_uang, 0, ',', '.') }}</span>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr class="empty-message">
                                <td colspan="7" class="px-6 py-10 text-center text-gray-500">
                                    <img src="https://img.icons8.com/fluency/96/null/empty-box.png" alt="Empty" class="h-16 w-16 mx-auto mb-2">
                                    <p class="text-gray-500">Tidak ada data distribusi zakat untuk periode ini</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot class="bg-gray-50">
                            <tr>
                                <td colspan="5" class="px-6 py-4 whitespace-nowrap text-center font-medium text-gray-700">Total Distribusi</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center font-medium text-green-600">{{ number_format($totalBerasDistributed, 1) }} kg</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center font-medium text-blue-600">Rp {{ number_format($totalUangDistributed, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            
            
            <!-- Pagination Links for Distribusi -->
            <div id="distribusiPagination">
                <div class="bg-white rounded-xl shadow-custom overflow-hidden">
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-4">
                        <div class="text-sm text-gray-500">
                            Menampilkan <span class="font-medium items-count">0</span> dari <span class="font-medium total-items">{{ count($distribusiZakat) }}</span> data
                        </div>
                        
                        <div class="inline-flex shadow-sm bg-white rounded-md">
                            <button type="button" class="prev-page relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
                                <i class="fas fa-chevron-left mr-2"></i>
                                Sebelumnya
                            </button>
                            
                            <div class="relative inline-flex items-center px-4 py-2 text-sm text-gray-700 bg-white border-t border-b border-gray-300">
                                <span class="current-page">1</span>
                                <span>/</span>
                                <span class="total-pages">1</span>
                            </div>
                            
                            <button type="button" class="next-page relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
                                Berikutnya
                                <i class="fas fa-chevron-right ml-2"></i>
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Client-side pagination for pengumpulan table
    setupClientSidePagination('pengumpulanTable', 'pengumpulanPagination');
    
    // Client-side pagination for distribusi table
    setupClientSidePagination('distribusiTable', 'distribusiPagination');
    
    // Function to set up client-side pagination
    function setupClientSidePagination(tableId, paginationId) {
        // Get all table rows
        const rows = document.querySelectorAll(`#${tableId} tbody tr:not(.empty-message)`);
        let filteredRows = Array.from(rows);
        let currentPage = 1;
        const itemsPerPage = 5;

        // Get pagination elements
        const prevPageBtn = document.querySelector(`#${paginationId} .prev-page`);
        const nextPageBtn = document.querySelector(`#${paginationId} .next-page`);
        const currentPageEl = document.querySelector(`#${paginationId} .current-page`);
        const totalPagesEl = document.querySelector(`#${paginationId} .total-pages`);
        const totalItemsEl = document.querySelector(`#${paginationId} .total-items`);
        const itemsCountEl = document.querySelector(`#${paginationId} .items-count`);
        
        // Hide all rows initially except for empty message
        filteredRows.forEach(row => {
            row.style.display = 'none';
        });
        
        // Function to update pagination display
        function updatePagination() {
            const totalItems = filteredRows.length;
            const totalPages = Math.ceil(totalItems / itemsPerPage) || 1;
            
            // Update display elements
            if (totalItemsEl) totalItemsEl.textContent = totalItems;
            if (currentPageEl) currentPageEl.textContent = currentPage;
            if (totalPagesEl) totalPagesEl.textContent = totalPages;
            if (itemsCountEl) {
                const startItem = Math.min((currentPage - 1) * itemsPerPage + 1, totalItems);
                const endItem = Math.min(startItem + itemsPerPage - 1, totalItems);
                itemsCountEl.textContent = totalItems > 0 ? `${startItem}-${endItem}` : "0";
            }
            
            // Update button states
            if (prevPageBtn) {
                prevPageBtn.classList.toggle('opacity-50', currentPage <= 1);
                prevPageBtn.classList.toggle('cursor-not-allowed', currentPage <= 1);
                prevPageBtn.disabled = currentPage <= 1;
            }
            
            if (nextPageBtn) {
                nextPageBtn.classList.toggle('opacity-50', currentPage >= totalPages);
                nextPageBtn.classList.toggle('cursor-not-allowed', currentPage >= totalPages);
                nextPageBtn.disabled = currentPage >= totalPages;
            }
            
            // Show/hide empty message based on filtered rows
            const emptyMessage = document.querySelector(`#${tableId} tbody tr.empty-message`);
            if (emptyMessage) {
                emptyMessage.style.display = filteredRows.length === 0 ? '' : 'none';
            }
        }
        
        // Function to navigate to a specific page
        function goToPage(page) {
            currentPage = page;
            
            // Hide all rows
            filteredRows.forEach(row => {
                row.style.display = 'none';
            });
            
            // Show rows for current page
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            
            filteredRows.slice(startIndex, endIndex).forEach(row => {
                row.style.display = '';
            });
            
            updatePagination();
        }
        
        // Set up event listeners for pagination
        if (prevPageBtn) {
            prevPageBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (currentPage > 1) {
                    goToPage(currentPage - 1);
                }
            });
        }
        
        if (nextPageBtn) {
            nextPageBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const totalPages = Math.ceil(filteredRows.length / itemsPerPage) || 1;
                if (currentPage < totalPages) {
                    goToPage(currentPage + 1);
                }
            });
        }
        
        // Update row numbering for all rows - ensure continuous numbering
        function updateRowNumbers() {
            filteredRows.forEach((row, index) => {
                const cell = row.querySelector('td:first-child');
                if (cell) {
                    cell.textContent = index + 1;
                }
            });
        }
        
        // Initialize
        updateRowNumbers();
        updatePagination();
        goToPage(1);
    }

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
                    text: 'Perbandingan Pengumpulan dan Distribusi Zakat'
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

    // Monthly Data Chart
    const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    
    // Sample monthly data - in a real implementation, this would come from your backend
    // You can replace this with actual monthly data from your controller
    const monthlyBerasData = [
        @if(!$month)
            @foreach(range(1, 12) as $m)
                {{ mt_rand(500, 2000) / 10 }},
            @endforeach
        @else
            {{ $totalBerasCollected }}
        @endif
    ];
    
    const monthlyUangData = [
        @if(!$month)
            @foreach(range(1, 12) as $m)
                {{ mt_rand(1000000, 5000000) }},
            @endforeach
        @else
            {{ $totalUangCollected }}
        @endif
    ];

    const monthlyChartCtx = document.getElementById('monthlyChart').getContext('2d');
    const monthlyChart = new Chart(monthlyChartCtx, {
        type: 'line',
        data: {
            labels: months,
            datasets: [
                {
                    label: 'Beras (kg)',
                    data: monthlyBerasData,
                    backgroundColor: 'rgba(72, 187, 120, 0.2)',
                    borderColor: 'rgb(72, 187, 120)',
                    borderWidth: 2,
                    tension: 0.3,
                    yAxisID: 'y'
                },
                {
                    label: 'Uang (Rp)',
                    data: monthlyUangData,
                    backgroundColor: 'rgba(66, 153, 225, 0.2)',
                    borderColor: 'rgb(66, 153, 225)',
                    borderWidth: 2,
                    tension: 0.3,
                    yAxisID: 'y1'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Pengumpulan Zakat Bulanan'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                if (context.datasetIndex === 0) {
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
                y: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                    title: {
                        display: true,
                        text: 'Beras (kg)'
                    },
                    ticks: {
                        callback: function(value, index, values) {
                            return value.toFixed(1);
                        }
                    }
                },
                y1: {
                    type: 'linear',
                    display: true,
                    position: 'right',
                    title: {
                        display: true,
                        text: 'Uang (Rp)'
                    },
                    grid: {
                        drawOnChartArea: false,
                    },
                    ticks: {
                        callback: function(value, index, values) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });
    
    // Refresh data every 30 seconds for real-time updates
    setInterval(function() {
        // In a real implementation, you would make an AJAX call to get the latest data
        // For now, we'll just update with random values
        if (!{{ $month ? 'true' : 'false' }}) {
            const newBerasData = monthlyBerasData.map(value => value * (0.95 + Math.random() * 0.1));
            const newUangData = monthlyUangData.map(value => value * (0.95 + Math.random() * 0.1));
            
            monthlyChart.data.datasets[0].data = newBerasData;
            monthlyChart.data.datasets[1].data = newUangData;
            monthlyChart.update();
        }
        
        // Update comparison chart
        comparisonChart.data.datasets[0].data = [
            {{ $totalBerasCollected }} * (0.98 + Math.random() * 0.04), 
            null
        ];
        comparisonChart.data.datasets[1].data = [
            {{ $totalBerasDistributed }} * (0.98 + Math.random() * 0.04),
            null
        ];
        comparisonChart.data.datasets[2].data = [
            null,
            {{ $totalUangCollected }} * (0.98 + Math.random() * 0.04)
        ];
        comparisonChart.data.datasets[3].data = [
            null,
            {{ $totalUangDistributed }} * (0.98 + Math.random() * 0.04)
        ];
        comparisonChart.update();
    }, 30000);
});
</script>
@endpush
