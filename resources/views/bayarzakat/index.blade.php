@extends('layouts.app')

@section('title', 'Daftar Pembayaran Zakat - Sistem Zakat Fitrah')

@section('content')
<!-- Main Content -->
<div class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-secondary-dark">Daftar Pembayaran Zakat</h1>
                <p class="mt-2 text-secondary-DEFAULT">Kelola data pembayaran zakat fitrah</p>
            </div>
            <div>
                <a href="{{ route('bayarzakat.create') }}" class="inline-flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-300 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Catat Pembayaran
                </a>
            </div>
        </div>

        <!-- Notification -->
        @if(session('success'))
        <div class="mb-6">
            <div class="bg-accent-light border-l-4 border-accent-DEFAULT text-accent-dark p-4 rounded-lg" role="alert">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-accent-DEFAULT" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        </div>
        @endif

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-custom p-6 border-l-4 border-green-500">
                <div class="flex items-center">
                    <div class="bg-green-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-secondary-dark">Total Dana Terkumpul</h2>
                        <p class="text-3xl font-bold text-accent-DEFAULT">
                            Rp {{ number_format(App\Models\BayarZakat::where('jenis_bayar', 'uang')->sum('bayar_uang'), 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-custom p-6 border-l-4 border-indigo-500">
                <div class="flex items-center">
                    <div class="bg-secondary-light p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-secondary-dark">Total Beras Terkumpul</h2>
                        <p class="text-3xl font-bold text-secondary-DEFAULT">
                            {{ App\Models\BayarZakat::where('jenis_bayar', 'beras')->sum('bayar_beras') }} kg
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-custom p-6 border-l-4 border-green-500">
                <div class="flex items-center">
                    <div class="bg-green-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-secondary-dark">Dana Tersalurkan</h2>
                        <p class="text-3xl font-bold text-green-500">
                            Rp {{ number_format(App\Models\Distribusi::where('jenis_distribusi', 'uang')->sum('jumlah_uang'), 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-custom p-6 border-l-4 border-indigo-500">
                <div class="flex items-center">
                    <div class="bg-indigo-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-secondary-dark">Beras Tersalurkan</h2>
                        <p class="text-3xl font-bold text-indigo-500">
                            {{ number_format(App\Models\Distribusi::where('jenis_distribusi', 'beras')->sum('jumlah_beras'), 1, ',', '.') }} kg
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filter Bar -->
        <div class="mb-6 bg-white rounded-xl shadow-custom p-4">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="relative flex-grow max-w-2xl">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" id="search-bayarzakat" class="block w-full p-3 pl-10 text-sm text-gray-900 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Cari pembayaran zakat...">
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

        <!-- Table -->
        <div class="bg-white rounded-xl shadow-custom overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">No</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Nama KK</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Tanggungan</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Jenis Bayar</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Jumlah</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Tanggal</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="bayarzakat-table-body">
                        @if(count($zakatList) > 0)
                            @foreach($zakatList as $key => $zakat)
                            <tr class="bayarzakat-row" data-jenis="{{ $zakat->jenis_bayar }}"
                                style="{{ $key >= 5 ? 'display: none;' : '' }}">
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-secondary-DEFAULT nomor-urut">{{ $key + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-secondary-dark">{{ $zakat->nama_kk }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-secondary-DEFAULT">{{ $zakat->jumlah_tanggungan }} orang</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-secondary-DEFAULT">
                                    @if($zakat->jenis_bayar == 'uang')
                                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">Uang</span>
                                    @elseif($zakat->jenis_bayar == 'beras')
                                        <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-700">Beras</span>
                                    @else
                                        <span class="px-2 py-1 text-xs rounded-full bg-purple-100 text-purple-700">Kombinasi</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-secondary-DEFAULT">
                                    @if($zakat->jenis_bayar == 'uang')
                                        Rp {{ number_format($zakat->bayar_uang, 0, ',', '.') }}
                                    @else
                                        {{ $zakat->bayar_beras }} kg
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-secondary-DEFAULT">{{ $zakat->created_at->format('d/m/Y H:i') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <div class="flex justify-center space-x-3">
                                        <a href="{{ route('bayarzakat.show', $zakat->id_zakat) }}" class="text-blue-600 hover:text-blue-800 transition duration-300" title="Lihat Detail">
                                            <i class="fas fa-eye text-lg"></i>
                                        </a>
                                        <a href="{{ route('bayarzakat.edit', $zakat->id_zakat) }}" class="text-blue-600 hover:text-blue-800 transition duration-300" title="Edit">
                                            <i class="fas fa-edit text-lg"></i>
                                        </a>
                                        <button type="button" onclick="showDeleteModal('delete-modal-{{ $zakat->id_zakat }}')" class="text-red-600 hover:text-red-800 transition duration-300" title="Hapus">
                                            <i class="fas fa-trash text-lg"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-sm text-secondary-DEFAULT">Belum ada data pembayaran zakat</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            @if(count($zakatList) > 0)
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="text-sm text-gray-500">
                    Menampilkan <span class="font-medium">5</span> dari <span class="font-medium">{{ $zakatList->count() }}</span> data
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
                        <span id="total-pages">{{ ceil($zakatList->count() / 5) }}</span>
                    </div>
                    
                    <button type="button" id="next-page" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"{{ $zakatList->count() <= 5 ? ' disabled' : '' }}>
                        Berikutnya
                        <i class="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
@foreach($zakatList as $zakat)
<div id="delete-modal-{{ $zakat->id_zakat }}" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        
        <!-- Modal content -->
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all w-full max-w-md mx-auto z-10">
            <!-- Ikon di tengah atas -->
            <div class="mt-6 flex justify-center">
                <div class="h-12 w-12 rounded-full bg-red-100 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10zm-1.5-5.5a1.5 1.5 0 103 0 1.5 1.5 0 00-3 0zm.75-9.5a.75.75 0 011.5 0v6a.75.75 0 01-1.5 0v-6z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            
            <!-- Judul modal -->
            <h3 class="mt-3 text-center text-lg font-medium text-gray-900">
                Konfirmasi Hapus Data
            </h3>
            
            <!-- Pesan utama -->
            <div class="px-8 pt-2 pb-6">
                <p class="text-center text-sm text-gray-600">
                    Anda akan menghapus data pembayaran zakat:
                </p>
                <p class="mt-1 mb-4 text-center text-lg font-medium text-gray-900">
                    {{ $zakat->nama_kk }}
                </p>
                
                <!-- Peringatan dengan border merah -->
                <div class="mb-4 bg-red-50 border-l-4 border-red-500 p-4">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        <span class="ml-2 text-sm font-semibold text-red-800">Perhatian</span>
                    </div>
                    <p class="mt-2 text-sm text-red-700">
                    Data yang dihapus tidak dapat dikembalikan.
                    </p>
                </div>
                
                <!-- Detail pembayaran -->
                <div class="mb-5">
                    <div class="flex justify-between py-1.5">
                        <span class="text-sm text-gray-500">Jenis Pembayaran:</span>
                        <span class="text-sm font-medium text-gray-900">{{ ucfirst($zakat->jenis_bayar) }}</span>
                    </div>
                    <div class="flex justify-between py-1.5">
                        <span class="text-sm text-gray-500">Jumlah:</span>
                        <span class="text-sm font-medium text-gray-900">
                            @if($zakat->jenis_bayar == 'uang')
                                Rp {{ number_format($zakat->bayar_uang, 0, ',', '.') }}
                            @else
                                {{ $zakat->bayar_beras }} kg
                            @endif
                        </span>
                    </div>
                    <div class="flex justify-between py-1.5">
                        <span class="text-sm text-gray-500">Tanggal Pembayaran:</span>
                        <span class="text-sm font-medium text-gray-900">{{ $zakat->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                </div>
                
                <!-- Pertanyaan konfirmasi -->
                <p class="mb-5 text-center text-sm text-gray-600">
                    Apakah Anda yakin ingin menghapus data ini?
                </p>
                
                <!-- Tombol aksi -->
                <div class="flex justify-center gap-3">
                    <button type="button" onclick="hideDeleteModal('delete-modal-{{ $zakat->id_zakat }}')" class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none">
                        Batal
                    </button>
                    <form action="{{ route('bayarzakat.destroy', $zakat->id_zakat) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-red-700 focus:outline-none">
                            Hapus Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Search functionality
        const searchInput = document.getElementById('search-bayarzakat');
        const jenisBayarFilter = document.getElementById('jenis-bayar-filter');
        const resetFilterBtn = document.getElementById('reset-filter');
        const prevPageBtn = document.getElementById('prev-page');
        const nextPageBtn = document.getElementById('next-page');
        const currentPageEl = document.getElementById('current-page');
        const totalPagesEl = document.getElementById('total-pages');
        const jenisInfoEl = document.getElementById('jenis-info');
        const jenisInfoTextEl = jenisInfoEl ? jenisInfoEl.querySelector('span') : null;
        
        const rows = document.querySelectorAll('.bayarzakat-row');
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
    
    // Delete modal functions
    function showDeleteModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }
    
    function hideDeleteModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
    
    // Close modal when clicking outside
    document.addEventListener('click', function(event) {
        const modals = document.querySelectorAll('[id^="delete-modal-"]');
        modals.forEach(modal => {
            if (event.target === modal) {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        });
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            const visibleModal = document.querySelector('[id^="delete-modal-"]:not(.hidden)');
            if (visibleModal) {
                visibleModal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        }
    });
</script>
@endpush 