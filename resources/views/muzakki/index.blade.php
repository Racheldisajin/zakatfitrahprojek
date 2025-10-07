@extends('layouts.app')

@section('title', 'Daftar Muzakki - Sistem Zakat Fitrah')

@section('content')
<!-- Main Content -->
<div class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-secondary-dark">Daftar Muzakki</h1>
                <p class="mt-2 text-secondary-DEFAULT">Kelola data muzakki (pembayar zakat)</p>
            </div>
            <div>
                <a href="{{ route('muzakki.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-800 text-white font-medium rounded-lg transition duration-300 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Tambah Muzakki
                </a>
            </div>
        </div>

        <!-- Search and Filter Bar -->
        <div class="mb-6 bg-white rounded-xl shadow-custom p-4">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="relative flex-grow max-w-2xl">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" id="search-muzakki" class="block w-full p-3 pl-10 text-sm text-gray-900 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Cari nama muzakki...">
                </div>
                
                <div class="flex items-center gap-4">
                    <select id="tanggungan-filter" class="px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent text-sm">
                        <option value="">Semua Tanggungan</option>
                        <option value="1">1 Orang</option>
                        <option value="2">2 Orang</option>
                        <option value="3">3 Orang</option>
                        <option value="4">4 Orang</option>
                        <option value="5+">5+ Orang</option>
                    </select>
                    
                    <button type="button" id="reset-filter" class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-secondary-DEFAULT font-medium rounded-lg transition duration-300 text-sm">
                        <i class="fas fa-sync-alt mr-2"></i>Reset
                    </button>
                </div>
            </div>
        </div>

        <!-- Session Status -->
        @if (session('success'))
        <div class="mb-6">
            <div class="bg-accent-light border-l-4 border-accent-DEFAULT text-accent-dark p-4 rounded-lg" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        </div>
        @endif
        
        <!-- Data Table -->
        <div class="bg-white rounded-xl shadow-custom overflow-hidden">
            @if($muzakkis->isEmpty())
            <div class="p-8 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <p class="mt-4 text-lg font-medium text-secondary-DEFAULT">Belum ada data muzakki</p>
                <p class="text-secondary-DEFAULT">Silahkan tambahkan data muzakki baru.</p>
                <a href="{{ route('muzakki.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-800 text-white font-medium rounded-lg transition duration-300 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Tambah Muzakki
                </a>
            </div>
            @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">No</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Nama</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Jumlah Tanggungan</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Alamat</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="muzakki-table-body">
                        @foreach($muzakkis as $index => $muzakki)
                        <tr class="muzakki-row" data-tanggungan="{{ $muzakki->jumlah_tanggungan }}" data-id="{{ $muzakki->id_muzakki }}"
                            style="{{ $index >= 5 ? 'display: none;' : '' }}">
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="text-sm text-gray-900 nomor-urut">{{ $index + 1 }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="text-sm text-gray-900">{{ $muzakki->nama_muzakki }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $muzakki->jumlah_tanggungan > 4 ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                    {{ $muzakki->jumlah_tanggungan }} orang
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                {{ $muzakki->alamat ?: 'Belum diisi' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <div class="flex justify-center space-x-3">
                                    <a href="{{ route('muzakki.show', $muzakki->id_muzakki) }}" class="text-blue-600 hover:text-blue-800 transition duration-300" title="Lihat Detail">
                                        <i class="fas fa-eye text-lg"></i>
                                    </a>
                                    <a href="{{ route('muzakki.edit', $muzakki->id_muzakki) }}" class="text-blue-600 hover:text-blue-800 transition duration-300" title="Edit">
                                        <i class="fas fa-edit text-lg"></i>
                                    </a>
                                    <button type="button" onclick="showDeleteModal('delete-modal-{{ $muzakki->id_muzakki }}')" class="text-red-600 hover:text-red-800 transition duration-300" title="Hapus">
                                        <i class="fas fa-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="text-sm text-gray-500">
                    Menampilkan <span class="font-medium">5</span> dari <span class="font-medium">{{ $muzakkis->count() }}</span> data
                    <span id="tanggungan-info" class="hidden"> (Tanggungan: <span class="font-medium"></span>)</span>
                </div>
                
                <div class="inline-flex shadow-sm bg-white rounded-md">
                    <button type="button" id="prev-page" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                        <i class="fas fa-chevron-left mr-2"></i>
                        Sebelumnya
                    </button>
                    
                    <div class="relative inline-flex items-center px-4 py-2 text-sm text-gray-700 bg-white border-t border-b border-gray-300">
                        <span id="current-page">1</span>
                        <span>/</span>
                        <span id="total-pages">{{ ceil($muzakkis->count() / 5) }}</span>
                    </div>
                    
                    <button type="button" id="next-page" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"{{ $muzakkis->count() <= 5 ? ' disabled' : '' }}>
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
@foreach($muzakkis as $muzakki)
<div id="delete-modal-{{ $muzakki->id_muzakki }}" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4 sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        
        <div class="relative inline-block w-full max-w-md bg-white rounded-lg shadow-xl overflow-hidden transform transition-all sm:max-w-md" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <!-- Header dengan ikon -->
            <div class="bg-red-50 px-6 py-6 text-center">
                <div class="mx-auto flex items-center justify-center h-14 w-14 rounded-full bg-white mb-4 shadow">
                    <svg class="h-7 w-7 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900">
                    Konfirmasi Hapus Data
                </h3>
            </div>
            
            <!-- Content area -->
            <div class="bg-white px-6 py-6">
                <div class="text-center mb-5">
                    <p class="text-base text-gray-600 mb-2">
                        Anda akan menghapus data muzakki:
                    </p>
                    <p class="text-lg font-semibold text-gray-900">
                        {{ $muzakki->nama_muzakki }}
                    </p>
                </div>
                
                <!-- Warning alert -->
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-5">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-yellow-700">
                                Tindakan ini tidak dapat dibatalkan. Semua data terkait muzakki ini akan dihapus secara permanen dari sistem.
                            </p>
                        </div>
                    </div>
                </div>
                
                <p class="text-base text-center text-gray-500">
                    Apakah Anda yakin ingin melanjutkan?
                </p>
            </div>
            
            <!-- Action buttons -->
            <div class="bg-gray-50 px-6 py-4 sm:flex sm:flex-row-reverse border-t border-gray-100">
                <form action="{{ route('muzakki.destroy', $muzakki->id_muzakki) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full sm:w-auto inline-flex justify-center items-center px-5 py-2.5 rounded-md border border-transparent shadow-sm bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-200">
                        <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Hapus Data
                    </button>
                </form>
                <button type="button" onclick="hideDeleteModal('delete-modal-{{ $muzakki->id_muzakki }}')" class="w-full sm:w-auto inline-flex justify-center items-center px-5 py-2.5 mt-3 sm:mt-0 sm:mr-3 rounded-md border border-gray-300 shadow-sm bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200">
                    <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Batal
                </button>
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
        const searchInput = document.getElementById('search-muzakki');
        const rows = document.querySelectorAll('.muzakki-row');
        const tanggunganFilter = document.getElementById('tanggungan-filter');
        const resetFilterBtn = document.getElementById('reset-filter');
        const prevPageBtn = document.getElementById('prev-page');
        const nextPageBtn = document.getElementById('next-page');
        const currentPageEl = document.getElementById('current-page');
        const totalPagesEl = document.getElementById('total-pages');
        
        let currentPage = 1;
        const itemsPerPage = 5;
        const totalItems = {{ $muzakkis->count() }};
        const totalPages = Math.ceil(totalItems / itemsPerPage);
        
        if (totalPagesEl) totalPagesEl.textContent = totalPages;
        
        // Pagination function
        function showPage(page) {
            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            
            let displayCount = 0;
            let visibleRows = [];
            
            // Mengumpulkan baris yang sesuai dengan filter
            rows.forEach(row => {
                if (!row.classList.contains('hidden-by-filter') && 
                    !row.classList.contains('hidden-by-search')) {
                    visibleRows.push(row);
                }
            });
            
            // Menyembunyikan semua baris terlebih dahulu
            rows.forEach(row => {
                row.style.display = 'none';
            });
            
            // Menampilkan baris yang sesuai dengan halaman saat ini
            for (let i = start; i < end && i < visibleRows.length; i++) {
                visibleRows[i].style.display = '';
                
                // Update nomor urut
                const numCell = visibleRows[i].querySelector('.nomor-urut');
                if (numCell) numCell.textContent = i + 1;
                
                displayCount++;
            }
            
            // Update page controls
            if (currentPageEl) currentPageEl.textContent = page;
            
            // Hitung jumlah halaman berdasarkan hasil filter
            const filteredTotalPages = Math.ceil(visibleRows.length / itemsPerPage);
            
            // Update total pages display
            if (totalPagesEl) totalPagesEl.textContent = filteredTotalPages > 0 ? filteredTotalPages : 1;
            
            if (prevPageBtn) {
                prevPageBtn.disabled = page === 1;
            }
            
            if (nextPageBtn) {
                nextPageBtn.disabled = page >= filteredTotalPages || visibleRows.length === 0;
            }
            
            // Update count display
            const countDisplay = document.querySelector('.text-sm.text-gray-500 span.font-medium:first-child');
            if (countDisplay) {
                countDisplay.textContent = Math.min(displayCount, itemsPerPage);
            }
            
            const totalDisplay = document.querySelector('.text-sm.text-gray-500 span.font-medium:last-child');
            if (totalDisplay) {
                totalDisplay.textContent = visibleRows.length;
            }
        }
        
        // Fungsi untuk memeriksa apakah suatu baris harus ditampilkan berdasarkan filter
        function applyFilters() {
            const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
            const selectedTanggungan = tanggunganFilter ? tanggunganFilter.value : '';
            const selectedTanggunganText = tanggunganFilter ? tanggunganFilter.options[tanggunganFilter.selectedIndex].text : '';
            
            // Update tanggungan info
            const tanggunganInfo = document.getElementById('tanggungan-info');
            if (tanggunganInfo) {
                if (selectedTanggungan) {
                    tanggunganInfo.classList.remove('hidden');
                    const tanggunganName = tanggunganInfo.querySelector('span.font-medium');
                    if (tanggunganName) {
                        tanggunganName.textContent = selectedTanggunganText;
                    }
                } else {
                    tanggunganInfo.classList.add('hidden');
                }
            }
            
            rows.forEach(row => {
                const textContent = row.textContent.toLowerCase();
                const tanggungan = row.getAttribute('data-tanggungan');
                
                const matchesSearch = searchTerm === '' || textContent.includes(searchTerm);
                let matchesTanggungan = selectedTanggungan === '';
                
                if (selectedTanggungan === '5+') {
                    // Tanggungan 5 orang atau lebih
                    matchesTanggungan = parseInt(tanggungan) >= 5;
                } else if (selectedTanggungan !== '') {
                    // Tanggungan sesuai dengan nilai yang dipilih
                    matchesTanggungan = tanggungan === selectedTanggungan;
                }
                
                if (matchesSearch) {
                    row.classList.remove('hidden-by-search');
                } else {
                    row.classList.add('hidden-by-search');
                }
                
                if (matchesTanggungan) {
                    row.classList.remove('hidden-by-filter');
                } else {
                    row.classList.add('hidden-by-filter');
                }
            });
            
            currentPage = 1;
            showPage(currentPage);
        }
        
        // Search filter
        if (searchInput) {
            searchInput.addEventListener('input', applyFilters);
        }
        
        // Tanggungan filter
        if (tanggunganFilter) {
            tanggunganFilter.addEventListener('change', applyFilters);
        }
        
        // Reset filter
        if (resetFilterBtn) {
            resetFilterBtn.addEventListener('click', function() {
                if (searchInput) searchInput.value = '';
                if (tanggunganFilter) tanggunganFilter.value = '';
                
                // Sembunyikan info tanggungan
                const tanggunganInfo = document.getElementById('tanggungan-info');
                if (tanggunganInfo) {
                    tanggunganInfo.classList.add('hidden');
                }
                
                rows.forEach(row => {
                    row.classList.remove('hidden-by-search', 'hidden-by-filter');
                });
                
                currentPage = 1;
                showPage(currentPage);
            });
        }
        
        // Pagination controls
        if (prevPageBtn) {
            prevPageBtn.addEventListener('click', function() {
                if (currentPage > 1) {
                    currentPage--;
                    showPage(currentPage);
                }
            });
        }
        
        if (nextPageBtn) {
            nextPageBtn.addEventListener('click', function() {
                if (currentPage < totalPages) {
                    currentPage++;
                    showPage(currentPage);
                }
            });
        }
        
        // Initialize display
        showPage(1);
        
        // Aktifkan tombol navigasi jika ada data lebih dari satu halaman
        if (nextPageBtn && totalItems > itemsPerPage) {
            nextPageBtn.disabled = false;
        }
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