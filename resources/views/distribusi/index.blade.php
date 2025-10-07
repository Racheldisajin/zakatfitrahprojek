@extends('layouts.app')

@section('title', 'Distribusi Zakat - Sistem Zakat Fitrah')

@section('content')
<!-- Main Content -->
<div class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-secondary-dark">Distribusi Zakat</h1>
                <p class="mt-2 text-secondary-DEFAULT">Kelola dan pantau distribusi zakat fitrah kepada mustahik</p>
            </div>
            <div>
                <a href="{{ route('distribusi.create') }}" class="inline-flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-300 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Distribusi Baru
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
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <!-- Kiri atas -->
            <div class="bg-white rounded-xl shadow-custom p-6 border-l-4 border-green-500">
                <div class="flex items-center">
                    <div class="bg-green-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-gray-700">Total Dana Terkumpul</h2>
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
                        <h2 class="text-lg font-semibold text-gray-700">Total Beras Terkumpul</h2>
                        <p class="text-3xl font-bold text-secondary-DEFAULT">
                            {{ number_format(App\Models\BayarZakat::where('jenis_bayar', 'beras')->sum('bayar_beras'), 1, ',', '.') }} kg
                        </p>
                    </div>
                </div>
            </div>
            <!-- Kanan (tinggi, row-span-2) -->
            <div class="bg-white rounded-xl shadow-custom p-6 border-l-4 border-amber-500 row-span-2 flex flex-col justify-center">
                <div class="flex items-center">
                    <div class="bg-yellow-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-gray-700">Total Mustahik</h2>
                        <p class="text-3xl font-bold text-yellow-500">
                            {{ number_format($totalMustahik ?? 0, 0, ',', '.') }} orang
                        </p>
                    </div>
                </div>
            </div>
            <!-- Kiri bawah -->
            <div class="bg-white rounded-xl shadow-custom p-6 border-l-4 border-green-500">
                <div class="flex items-center">
                    <div class="bg-green-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0-2.08.402-2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-gray-700">Total Dana Tersalurkan</h2>
                        <p class="text-3xl font-bold text-green-500">
                            Rp {{ number_format($totalDanaTersalurkan ?? 0, 0, ',', '.') }}
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
                        <h2 class="text-lg font-semibold text-gray-700">Total Beras Tersalurkan</h2>
                        <p class="text-3xl font-bold text-indigo-500">
                            {{ number_format($totalBerasTersalurkan ?? 0, 1, ',', '.') }} kg
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Filter dan Pencarian -->
        <div class="mb-6 bg-white rounded-xl shadow-custom p-4">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="relative flex-grow max-w-2xl">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" id="search-distribusi" class="block w-full p-3 pl-10 text-sm text-gray-900 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Cari nama mustahik...">
                </div>
                
                <div class="flex items-center gap-4">
                    <select id="kategori-filter" class="px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent text-sm">
                        <option value="">Semua Kategori</option>
                        <option value="Fakir">Fakir (40%)</option>
                        <option value="Miskin">Miskin (40%)</option>
                        <option value="Amil">Amil (10%)</option>
                        <option value="Mualaf">Mualaf (2%)</option>
                        <option value="Riqab">Riqab (1%)</option>
                        <option value="Gharimin">Gharimin (1%)</option>
                        <option value="Fisabilillah">Fisabilillah (5%)</option>
                        <option value="Ibnu Sabil">Ibnu Sabil (1%)</option>
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
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Nama Mustahik</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Kategori</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Jenis Penerimaan</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Jumlah</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Tanggal</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="distribusi-table-body">
                        @if(count($distribusi) > 0)
                            @foreach($distribusi as $index => $item)
                            <tr class="distribusi-row">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500 nomor-urut-distribusi">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-900">{{ $item->nama_mustahik }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">{{ $item->kategori }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">
                                    @if($item->jenis_distribusi == 'uang')
                                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">Uang Tunai</span>
                                    @elseif($item->jenis_distribusi == 'beras')
                                        <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-700">Beras</span>
                                    @else
                                        <span class="px-2 py-1 text-xs rounded-full bg-purple-100 text-purple-700">Kombinasi</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">
                                    @if($item->jenis_distribusi == 'uang')
                                        Rp {{ number_format($item->jumlah_uang, 0, ',', '.') }}
                                    @elseif($item->jenis_distribusi == 'beras')
                                        {{ number_format($item->jumlah_beras, 1, ',', '.') }} kg
                                    @else
                                        Rp {{ number_format($item->jumlah_uang, 0, ',', '.') }} + {{ number_format($item->jumlah_beras, 1, ',', '.') }} kg
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                                    <div class="flex justify-center space-x-3">
                                        <a href="{{ route('distribusi.show', $item->id_distribusi) }}" class="text-blue-600 hover:text-blue-800 transition duration-300" title="Lihat Detail">
                                            <i class="fas fa-eye text-lg"></i>
                                        </a>
                                        <a href="{{ route('distribusi.edit', $item->id_distribusi) }}" class="text-blue-600 hover:text-blue-800 transition duration-300" title="Edit">
                                            <i class="fas fa-edit text-lg"></i>
                                        </a>
                                        <button type="button" onclick="showDeleteModal('delete-modal-{{ $item->id_distribusi }}')" class="text-red-600 hover:text-red-900" title="Hapus">
                                            <i class="fas fa-trash text-lg"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="px-6 py-10 text-center text-sm text-gray-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                        </svg>
                                        <p class="text-gray-500 text-lg font-medium mb-2">Belum Ada Distribusi Zakat</p>
                                        <p class="text-gray-400 max-w-md text-center">Data distribusi zakat akan muncul di sini setelah Anda mendistribusikan zakat kepada mustahik.</p>
                                        <a href="{{ route('distribusi.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-300 shadow-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                            </svg>
                                            Tambah Distribusi Baru
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination Frontend -->
            @if(count($distribusi) > 0)
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="text-sm text-gray-500">
                    Menampilkan <span class="font-medium">5</span> dari <span class="font-medium">{{ count($distribusi) }}</span> data
                </div>
                <div class="inline-flex shadow-sm bg-white rounded-md">
                    <button type="button" id="prev-page-distribusi" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                        <i class="fas fa-chevron-left mr-2"></i>
                        Sebelumnya
                    </button>
                    <div class="relative inline-flex items-center px-4 py-2 text-sm text-gray-700 bg-white border-t border-b border-gray-300">
                        <span id="current-page-distribusi">1</span>
                        <span>/</span>
                        <span id="total-pages-distribusi">{{ ceil(count($distribusi) / 5) }}</span>
                    </div>
                    <button type="button" id="next-page-distribusi" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed" {{ count($distribusi) <= 5 ? 'disabled' : '' }}>
                        Berikutnya
                        <i class="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Delete Modals -->
@if(count($distribusi) > 0)
    @foreach($distribusi as $item)
    <div id="delete-modal-{{ $item->id_distribusi }}" class="hidden fixed inset-0 z-50 overflow-y-auto bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="relative mx-auto max-w-md bg-white rounded-lg shadow-lg p-6">
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-red-500 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                
                <h3 class="text-xl font-medium text-gray-900 mb-2">Konfirmasi Hapus</h3>
                <p class="text-gray-500 mb-6">
                    Apakah Anda yakin ingin menghapus distribusi zakat untuk <span class="font-medium text-gray-700">{{ $item->nama_mustahik }}</span>?
                </p>
                
                <div class="flex justify-center space-x-3">
                    <button type="button" onclick="hideDeleteModal('delete-modal-{{ $item->id_distribusi }}')" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium rounded-lg">
                        Batal
                    </button>
                    
                    <form action="{{ route('distribusi.destroy', $item->id_distribusi) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg">
                            Hapus Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif

@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script>
document.addEventListener('DOMContentLoaded', function() {
    const rows = Array.from(document.querySelectorAll('.distribusi-row'));
    const prevBtn = document.getElementById('prev-page-distribusi');
    const nextBtn = document.getElementById('next-page-distribusi');
    const currentPageEl = document.getElementById('current-page-distribusi');
    const totalPagesEl = document.getElementById('total-pages-distribusi');
    const searchInput = document.getElementById('search-distribusi');
    const kategoriFilter = document.getElementById('kategori-filter');
    const resetBtn = document.getElementById('reset-filter');
    const itemsPerPage = 5;
    let currentPage = 1;
    let filteredRows = rows.slice();

    function applyFilters() {
        const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
        const kategori = kategoriFilter ? kategoriFilter.value.toLowerCase() : '';
        filteredRows = rows.filter(row => {
            const textContent = row.textContent.toLowerCase();
            const kategoriCell = row.children[2]?.textContent.toLowerCase() || '';
            const matchSearch = searchTerm === '' || textContent.includes(searchTerm);
            const matchKategori = kategori === '' || kategoriCell.includes(kategori);
            return matchSearch && matchKategori;
                });
        showPage(1);
        updateTotalPages();
    }

    function updateTotalPages() {
        const totalPages = Math.ceil(filteredRows.length / itemsPerPage) || 1;
        if (totalPagesEl) totalPagesEl.textContent = totalPages;
        if (nextBtn) nextBtn.disabled = currentPage >= totalPages;
        if (prevBtn) prevBtn.disabled = currentPage <= 1;
                }
                
    function showPage(page) {
        currentPage = page;
        const totalPages = Math.ceil(filteredRows.length / itemsPerPage) || 1;
        filteredRows.forEach((row, idx) => {
            row.style.display = (idx >= (currentPage - 1) * itemsPerPage && idx < currentPage * itemsPerPage) ? '' : 'none';
            // Update nomor urut
            const nomorEl = row.querySelector('.nomor-urut-distribusi');
            if (nomorEl) {
                nomorEl.textContent = ((currentPage - 1) * itemsPerPage) + (idx - (currentPage - 1) * itemsPerPage) + 1;
                        }
        });
        // Sembunyikan row yang tidak masuk filter
        rows.forEach(row => {
            if (!filteredRows.includes(row)) row.style.display = 'none';
        });
        if (currentPageEl) currentPageEl.textContent = currentPage;
        updateTotalPages();
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', function() {
            if (currentPage > 1) showPage(currentPage - 1);
        });
    }
    if (nextBtn) {
        nextBtn.addEventListener('click', function() {
            const totalPages = Math.ceil(filteredRows.length / itemsPerPage) || 1;
            if (currentPage < totalPages) showPage(currentPage + 1);
        });
    }
    if (searchInput) {
        searchInput.addEventListener('input', applyFilters);
    }
    if (kategoriFilter) {
        kategoriFilter.addEventListener('change', applyFilters);
                        }
    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            if (searchInput) searchInput.value = '';
            if (kategoriFilter) kategoriFilter.value = '';
            applyFilters();
        });
    }
    applyFilters();
});
// Fungsi global untuk modal hapus
function showDeleteModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
}
function hideDeleteModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
}
</script>
@endpush 