@extends('layouts.app')

<!-- Add FontAwesome for the icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-secondary-dark">Laporan Pengumpulan Zakat</h1>
                <p class="mt-2 text-secondary-DEFAULT">Rincian data pengumpulan zakat fitrah</p>
            </div>
            <div>
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
                <form action="{{ route('laporan.pengumpulan') }}" method="GET">
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
                                <a href="{{ route('laporan.pengumpulan') }}" class="py-2 px-4 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-md shadow-sm flex-1 flex justify-center items-center transition duration-300">
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

        <!-- Alert if no data -->
        @if($pengumpulanZakat->isEmpty())
        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6 rounded-md">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-blue-700">
                        Tidak ada data pembayaran zakat untuk periode yang dipilih.
                    </p>
                </div>
            </div>
        </div>
        @endif

        <!-- Search and Filter Bar -->
        <div class="mb-6 bg-white rounded-xl shadow-custom p-4">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="relative flex-grow max-w-2xl">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" id="search-pengumpulan" class="block w-full p-3 pl-10 text-sm text-gray-900 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Cari nama muzakki...">
                </div>
                
                <div class="flex items-center gap-4">
                    <select id="jenis-bayar-filter" class="px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent text-sm">
                        <option value="">Semua Jenis</option>
                        <option value="uang">Uang</option>
                        <option value="beras">Beras</option>
                    </select>
                    
                    <button type="button" id="reset-filter" class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-secondary-DEFAULT font-medium rounded-lg transition duration-300 text-sm">
                        <i class="fas fa-sync-alt mr-2"></i>Reset
                    </button>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-custom mb-6 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-secondary-dark flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary-DEFAULT" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4" />
                    </svg>
                    Data Pembayaran Zakat
                </h2>
                <div class="flex space-x-2">
                    <button class="py-1 px-3 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md shadow-sm transition duration-300 flex items-center" onclick="exportTableToExcel('pengumpulanTable', 'pembayaran_zakat')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Excel
                    </button>
                    <button class="py-1 px-3 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md shadow-sm transition duration-300 flex items-center" onclick="printTable()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                        </svg>
                        Print
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table id="pengumpulanTable" class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider w-16">ID</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Nama Muzakki</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Tanggal</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Jenis Bayar</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Jumlah Beras (kg)</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Jumlah Uang (Rp)</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Tanggungan</th>
            </tr>
        </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="pengumpulan-table-body">
                        @forelse ($pengumpulanZakat as $index => $zakat)
                        <tr class="pengumpulan-row hover:bg-gray-50 transition-colors duration-200" 
                            data-jenis="{{ $zakat->jenis_bayar }}"
                            style="{{ $index >= 5 ? 'display: none;' : '' }}">
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-secondary-DEFAULT nomor-urut">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center font-medium text-secondary-dark">{{ $zakat->muzakki->nama ?? $zakat->nama_kk }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-secondary-DEFAULT">{{ $zakat->created_at->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                @if($zakat->jenis_bayar == 'beras')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-secondary-light text-secondary-dark">
                                        Beras
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-accent-light text-accent-dark">
                                        Uang
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                @if($zakat->jenis_bayar == 'beras')
                                    <span class="font-medium text-green-600">{{ number_format($zakat->bayar_beras, 1) }}</span>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                @if($zakat->jenis_bayar == 'uang')
                                    <span class="font-medium text-blue-600">{{ number_format($zakat->bayar_uang, 0, ',', '.') }}</span>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    {{ $zakat->jumlah_tanggungan }} orang
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-10 text-center text-gray-500">
                                <img src="https://img.icons8.com/fluency/96/null/empty-box.png" alt="Empty" class="h-16 w-16 mx-auto mb-2">
                                <p class="text-gray-500">Tidak ada data pembayaran zakat untuk periode ini</p>
                            </td>
            </tr>
                        @endforelse
        </tbody>
                    <tfoot class="bg-gray-50">
                        <tr>
                            <td colspan="4" class="px-6 py-4 whitespace-nowrap text-right font-medium text-gray-700">Total Pengumpulan</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right font-medium text-green-600">{{ number_format($totalBeras, 1) }} kg</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right font-medium text-blue-600">Rp {{ number_format($totalUang, 0, ',', '.') }}</td>
                            <td></td>
                        </tr>
                    </tfoot>
    </table>
            </div>
            
            <!-- Client-side Pagination -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="text-sm text-gray-500">
                    Menampilkan <span class="font-medium">5</span> dari <span class="font-medium" id="total-items">{{ $pengumpulanZakat->count() }}</span> data
                    <span id="jenis-info" class="hidden"> (Jenis: <span class="font-medium"></span>)</span>
                </div>
                
                <div class="inline-flex shadow-sm bg-white rounded-md">
                    <button type="button" id="prev-page" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                        <i class="fas fa-chevron-left mr-2"></i>
                        Sebelumnya
                    </button>
                    
                    <div class="relative inline-flex items-center px-4 py-2 text-sm text-gray-700 bg-white border-t border-b border-gray-300">
                        <span id="current-page">1</span>
                        <span>/</span>
                        <span id="total-pages">{{ ceil($pengumpulanZakat->count() / 5) }}</span>
                    </div>
                    
                    <button type="button" id="next-page" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"{{ $pengumpulanZakat->count() <= 5 ? ' disabled' : '' }}>
                        Berikutnya
                        <i class="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Ringkasan Pengumpulan -->
            <div class="bg-white rounded-xl shadow-custom overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-green-600 to-green-500 text-white">
                    <h2 class="text-lg font-bold flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                        </svg>
                        Ringkasan Pengumpulan
                    </h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center">
                            <div class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-green-100 text-green-600 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-sm text-gray-500 mb-1">Total Beras Terkumpul</h3>
                            <p class="text-2xl font-bold text-green-600">{{ number_format($totalBeras, 1) }} kg</p>
                        </div>
                        <div class="text-center">
                            <div class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 text-blue-600 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-sm text-gray-500 mb-1">Total Uang Terkumpul</h3>
                            <p class="text-2xl font-bold text-blue-600">Rp {{ number_format($totalUang, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistik -->
            <div class="bg-white rounded-xl shadow-custom overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-blue-600 to-indigo-500 text-white">
                    <h2 class="text-lg font-bold flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Statistik
                    </h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center">
                            <div class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 text-indigo-600 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <h3 class="text-sm text-gray-500 mb-1">Jumlah Muzakki</h3>
                            <p class="text-2xl font-bold text-indigo-600">{{ $pengumpulanZakat->count() }}</p>
                        </div>
                        <div class="text-center">
                            <div class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100 text-yellow-600 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <h3 class="text-sm text-gray-500 mb-1">Jumlah Tanggungan</h3>
                            <p class="text-2xl font-bold text-yellow-600">{{ $pengumpulanZakat->sum('jumlah_tanggungan') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Excel Export Function
function exportTableToExcel(tableID, filename = '') {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    } else {
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}

// Print Function
function printTable() {
    var printContents = document.getElementById("pengumpulanTable").outerHTML;
    var originalContents = document.body.innerHTML;
    
    document.body.innerHTML = '<div style="max-width: 1200px; margin: 0 auto; padding: 20px;"><h2 style="text-align: center; margin-bottom: 20px;">Laporan Pembayaran Zakat {{ $year }} {{ $month ? "- Bulan " . date("F", mktime(0, 0, 0, $month, 1)) : "" }}</h2>' + printContents + '</div>';
    
    window.print();
    
    document.body.innerHTML = originalContents;
}

// Pagination and Filtering Script
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.getElementById('search-pengumpulan');
    const jenisBayarFilter = document.getElementById('jenis-bayar-filter');
    const resetFilterBtn = document.getElementById('reset-filter');
    const prevPageBtn = document.getElementById('prev-page');
    const nextPageBtn = document.getElementById('next-page');
    const currentPageEl = document.getElementById('current-page');
    const totalPagesEl = document.getElementById('total-pages');
    const jenisInfoEl = document.getElementById('jenis-info');
    const jenisInfoTextEl = jenisInfoEl ? jenisInfoEl.querySelector('span') : null;
    
    const rows = document.querySelectorAll('.pengumpulan-row');
    let filteredRows = Array.from(rows);
    let currentPage = 1;
    const itemsPerPage = 5;
    
    // Fungsi untuk menerapkan filter dan search
    function applyFilters() {
        const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
        const jenisBayar = jenisBayarFilter ? jenisBayarFilter.value.toLowerCase() : '';
        
        // Reset tampilan
        if (jenisInfoEl) {
            jenisInfoEl.classList.add('hidden');
        }
        
        // Filter berdasarkan search dan jenis bayar
        filteredRows = Array.from(rows).filter(row => {
            const textContent = row.textContent.toLowerCase();
            const rowJenisBayar = row.dataset.jenis;
            
            const matchSearch = searchTerm === '' || textContent.includes(searchTerm);
            const matchJenis = jenisBayar === '' || rowJenisBayar === jenisBayar;
            
            return matchSearch && matchJenis;
        });
        
        // Tampilkan info filter jenis bayar jika ada
        if (jenisInfoEl && jenisBayar !== '') {
            jenisInfoEl.classList.remove('hidden');
            if (jenisInfoTextEl) {
                jenisInfoTextEl.textContent = jenisBayar.charAt(0).toUpperCase() + jenisBayar.slice(1);
            }
        }
        
        // Perbarui total halaman
        updatePagination();
        
        // Reset ke halaman pertama setelah filter berubah
        goToPage(1);
    }
    
    // Fungsi untuk memperbarui paginasi
    function updatePagination() {
        const totalItems = filteredRows.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage) || 1;
        
        // Update total items
        const totalItemsEl = document.getElementById('total-items');
        if (totalItemsEl) {
            totalItemsEl.textContent = totalItems;
        }
        
        if (totalPagesEl) {
            totalPagesEl.textContent = totalPages;
        }
        
        // Update tombol prev/next
        if (prevPageBtn) {
            prevPageBtn.disabled = currentPage <= 1;
        }
        
        if (nextPageBtn) {
            nextPageBtn.disabled = currentPage >= totalPages;
        }
    }
    
    // Fungsi untuk pindah ke halaman tertentu
    function goToPage(page) {
        currentPage = page;
        
        // Sembunyikan semua baris
        rows.forEach(row => {
            row.style.display = 'none';
        });
        
        // Tampilkan baris untuk halaman saat ini
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        
        filteredRows.slice(startIndex, endIndex).forEach(row => {
            row.style.display = '';
        });
        
        // Update UI paginasi
        if (currentPageEl) {
            currentPageEl.textContent = currentPage;
        }
        
        updatePagination();
        
        // Update nomor urut
        filteredRows.forEach((row, index) => {
            const nomorEl = row.querySelector('.nomor-urut');
            if (nomorEl) {
                nomorEl.textContent = index + 1;
            }
        });
    }
    
    // Setup event listeners
    if (searchInput) {
        searchInput.addEventListener('keyup', applyFilters);
    }
    
    if (jenisBayarFilter) {
        jenisBayarFilter.addEventListener('change', applyFilters);
    }
    
    if (resetFilterBtn) {
        resetFilterBtn.addEventListener('click', function() {
            if (searchInput) searchInput.value = '';
            if (jenisBayarFilter) jenisBayarFilter.value = '';
            applyFilters();
        });
    }
    
    if (prevPageBtn) {
        prevPageBtn.addEventListener('click', function() {
            if (currentPage > 1) {
                goToPage(currentPage - 1);
            }
        });
    }
    
    if (nextPageBtn) {
        nextPageBtn.addEventListener('click', function() {
            const totalPages = Math.ceil(filteredRows.length / itemsPerPage) || 1;
            if (currentPage < totalPages) {
                goToPage(currentPage + 1);
            }
        });
    }
    
    // Inisialisasi halaman pertama
    applyFilters();
});
</script>
@endsection
