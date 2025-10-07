@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-secondary-dark">Laporan Distribusi Zakat</h1>
                <p class="mt-2 text-secondary-DEFAULT">Rincian data distribusi zakat fitrah</p>
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
                <form action="{{ route('laporan.distribusi') }}" method="GET">
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
                                <a href="{{ route('laporan.distribusi') }}" class="py-2 px-4 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-md shadow-sm flex-1 flex justify-center items-center transition duration-300">
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
        @if($distribusiZakat->isEmpty())
        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6 rounded-md">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-blue-700">
                        Tidak ada data distribusi zakat untuk periode yang dipilih.
                    </p>
                </div>
            </div>
        </div>
        @endif

        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-custom mb-6 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-secondary-dark flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary-DEFAULT" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Data Distribusi Zakat
                </h2>
                <div class="flex space-x-2">
                    <button class="py-1 px-3 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md shadow-sm transition duration-300 flex items-center" onclick="exportTableToExcel('distribusiTable', 'distribusi_zakat')">
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
                <table id="distribusiTable" class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-16">ID</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Mustahik</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Beras (kg)</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Uang (Rp)</th>
            </tr>
        </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($distribusiZakat as $index => $distribusi)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-center font-bold text-gray-900">{{ ($distribusiZakat->currentPage() - 1) * $distribusiZakat->perPage() + $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center font-medium text-gray-900">
                                {{ $distribusi->nama_mustahik }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $distribusi->kategori }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500 text-center">{{ \Carbon\Carbon::parse($distribusi->tanggal)->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                @if($distribusi->jumlah_beras > 0)
                                    <span class="font-medium text-green-600">{{ number_format($distribusi->jumlah_beras, 1) }}</span>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                @if($distribusi->jumlah_uang > 0)
                                    <span class="font-medium text-blue-600">{{ number_format($distribusi->jumlah_uang, 0, ',', '.') }}</span>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                                <img src="https://img.icons8.com/fluency/96/null/empty-box.png" alt="Empty" class="h-16 w-16 mx-auto mb-2">
                                <p class="text-gray-500">Tidak ada data distribusi zakat untuk periode ini</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot class="bg-gray-50">
                        <tr>
                            <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center font-medium text-gray-700">Total Distribusi</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center font-medium text-green-600">{{ number_format($totalBeras, 1) }} kg</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center font-medium text-blue-600">Rp {{ number_format($totalUang, 0, ',', '.') }}</td>
            </tr>
                    </tfoot>
                </table>
            </div>
       

        <!-- Pagination Links -->
            <div class="bg-white rounded-xl shadow-custom overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-4">
                    <div class="text-sm text-gray-500">
                        Menampilkan <span class="font-medium">{{ $distribusiZakat->count() }}</span> dari <span class="font-medium">{{ $distribusiZakat->total() }}</span> data
                        <span id="jenis-info" class="hidden"> (Jenis: <span class="font-medium"></span>)</span>
                    </div>
                    
                    <div class="inline-flex shadow-sm bg-white rounded-md">
                        <a href="{{ $distribusiZakat->appends(request()->except('page'))->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 {{ !$distribusiZakat->onFirstPage() ? '' : 'opacity-50 cursor-not-allowed' }}">
                            <i class="fas fa-chevron-left mr-2"></i>
                            Sebelumnya
                        </a>
                        
                        <div class="relative inline-flex items-center px-4 py-2 text-sm text-gray-700 bg-white border-t border-b border-gray-300">
                            <span>{{ $distribusiZakat->currentPage() }}</span>
                            <span>/</span>
                            <span>{{ $distribusiZakat->lastPage() }}</span>
                        </div>
                        
                        <a href="{{ $distribusiZakat->appends(request()->except('page'))->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 {{ $distribusiZakat->hasMorePages() ? '' : 'opacity-50 cursor-not-allowed' }}">
                            Berikutnya
                            <i class="fas fa-chevron-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- Ringkasan Distribusi -->
            <div class="bg-white rounded-xl shadow-custom overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-purple-600 to-purple-500 text-white">
                    <h2 class="text-lg font-bold flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                        </svg>
                        Ringkasan Distribusi
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
                            <h3 class="text-sm text-gray-500 mb-1">Total Beras Didistribusikan</h3>
                            <p class="text-2xl font-bold text-green-600">{{ number_format($totalBeras, 1) }} kg</p>
                        </div>
                        <div class="text-center">
                            <div class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 text-blue-600 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-sm text-gray-500 mb-1">Total Uang Didistribusikan</h3>
                            <p class="text-2xl font-bold text-blue-600">Rp {{ number_format($totalUang, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistik Per Kategori -->
            <div class="bg-white rounded-xl shadow-custom overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-blue-600 to-indigo-500 text-white">
                    <h2 class="text-lg font-bold flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Statistik Per Kategori
                    </h2>
                </div>
                <div class="p-6">
                    @if($distribusiZakat->isEmpty())
                    <div class="text-center py-6">
                        <p class="text-gray-500">Tidak ada data distribusi untuk ditampilkan</p>
                    </div>
                    @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                                    <th scope="col" class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                                    <th scope="col" class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Beras (kg)</th>
                                    <th scope="col" class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Uang (Rp)</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @php
                                $kategoriStats = $distribusiZakat->groupBy('kategori');
                                @endphp
                                
                                @foreach($kategoriStats as $kategoriName => $items)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-4 py-2 whitespace-nowrap text-sm font-medium text-gray-900">{{ $kategoriName }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-center">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            {{ $items->count() }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-right font-medium text-green-600">
                                        {{ number_format($items->sum('jumlah_beras'), 1) }}
                                    </td>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-right font-medium text-blue-600">
                                        {{ number_format($items->sum('jumlah_uang'), 0, ',', '.') }}
                                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all table rows
        const rows = document.querySelectorAll('#distribusiTable tbody tr');
        let filteredRows = Array.from(rows);
        let currentPage = 1;
        const itemsPerPage = 5;

        // Get pagination elements
        const prevPageBtn = document.querySelector('[href*="previousPageUrl"]');
        const nextPageBtn = document.querySelector('[href*="nextPageUrl"]');
        const currentPageEl = document.querySelector('.inline-flex .text-sm.text-gray-700 span:first-child');
        const totalPagesEl = document.querySelector('.inline-flex .text-sm.text-gray-700 span:last-child');
        
        // Function to update pagination
        function updatePagination() {
            const totalItems = filteredRows.length;
            const totalPages = Math.ceil(totalItems / itemsPerPage) || 1;
            
            // Update total items display
            const totalItemsEl = document.querySelector('.text-sm.text-gray-500 span:last-child');
            if (totalItemsEl) {
                totalItemsEl.textContent = totalItems;
            }
            
            // Update current page display
            if (currentPageEl) {
                currentPageEl.textContent = currentPage;
            }
            
            // Update total pages display
            if (totalPagesEl) {
                totalPagesEl.textContent = totalPages;
            }
            
            // Update prev/next buttons
            if (prevPageBtn) {
                prevPageBtn.classList.toggle('opacity-50', currentPage <= 1);
                prevPageBtn.classList.toggle('cursor-not-allowed', currentPage <= 1);
            }
            
            if (nextPageBtn) {
                nextPageBtn.classList.toggle('opacity-50', currentPage >= totalPages);
                nextPageBtn.classList.toggle('cursor-not-allowed', currentPage >= totalPages);
            }
        }
        
        // Function to navigate to a specific page
        function goToPage(page) {
            currentPage = page;
            
            // Hide all rows
            rows.forEach(row => {
                row.style.display = 'none';
            });
            
            // Show rows for current page
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            
            filteredRows.slice(startIndex, endIndex).forEach(row => {
                row.style.display = '';
            });
            
            updatePagination();
            
            // Update row numbers
            filteredRows.forEach((row, index) => {
                const numberCell = row.querySelector('td:first-child');
                if (numberCell) {
                    numberCell.textContent = index + 1;
                }
            });
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
        
        // Initialize first page
        goToPage(1);
    });

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
    var printContents = document.getElementById("distribusiTable").outerHTML;
    var originalContents = document.body.innerHTML;
    
    document.body.innerHTML = '<div style="max-width: 1200px; margin: 0 auto; padding: 20px;"><h2 style="text-align: center; margin-bottom: 20px;">Laporan Distribusi Zakat {{ $year }} {{ $month ? "- Bulan " . date("F", mktime(0, 0, 0, $month, 1)) : "" }}</h2>' + printContents + '</div>';
    
    window.print();
    
    document.body.innerHTML = originalContents;
}
</script>
@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush
