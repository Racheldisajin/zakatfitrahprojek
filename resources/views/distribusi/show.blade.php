@extends('layouts.app')

@section('title', 'Detail Distribusi Zakat - Sistem Zakat Fitrah')

@section('content')
<!-- Main Content -->
<div class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-secondary-dark">Detail Distribusi Zakat</h1>
                <p class="mt-2 text-secondary-DEFAULT">Informasi lengkap tentang distribusi zakat</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('distribusi.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-secondary-DEFAULT font-medium rounded-lg transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <!-- Data Card -->
        <div class="bg-white rounded-xl shadow-custom overflow-hidden">
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h2 class="text-lg font-medium text-secondary-dark mb-4">Informasi Mustahik</h2>
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-sm font-medium text-secondary-DEFAULT">ID Distribusi</h3>
                                <p class="mt-1 text-secondary-dark">{{ $distribusi->id_distribusi }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-secondary-DEFAULT">Nama Mustahik</h3>
                                <p class="mt-1 text-secondary-dark">{{ $distribusi->nama_mustahik }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-secondary-DEFAULT">Kategori</h3>
                                <p class="mt-1">
                                    <span class="px-3 py-1 text-sm font-medium rounded-full bg-secondary-light text-secondary-dark">
                                        {{ $distribusi->kategori }}
                                    </span>
                                </p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-secondary-DEFAULT">Alamat</h3>
                                <p class="mt-1 text-secondary-dark">{{ $distribusi->alamat ?: 'Tidak diisi' }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-secondary-DEFAULT">Kontak</h3>
                                <p class="mt-1 text-secondary-dark">{{ $distribusi->kontak ?: 'Tidak diisi' }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h2 class="text-lg font-medium text-secondary-dark mb-4">Detail Distribusi</h2>
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-sm font-medium text-secondary-DEFAULT">Jenis Distribusi</h3>
                                <p class="mt-1">
                                    @if($distribusi->jenis_distribusi == 'uang')
                                        <span class="px-3 py-1 text-sm font-medium rounded-full bg-green-100 text-green-700">Uang Tunai</span>
                                    @elseif($distribusi->jenis_distribusi == 'beras')
                                        <span class="px-3 py-1 text-sm font-medium rounded-full bg-blue-100 text-blue-700">Beras</span>
                                    @else
                                        <span class="px-3 py-1 text-sm font-medium rounded-full bg-purple-100 text-purple-700">Kombinasi (Uang & Beras)</span>
                                    @endif
                                </p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-secondary-DEFAULT">Jumlah Distribusi</h3>
                                <p class="mt-1 text-secondary-dark">
                                    @if($distribusi->jenis_distribusi == 'uang')
                                        Rp {{ number_format($distribusi->jumlah_uang, 0, ',', '.') }}
                                    @elseif($distribusi->jenis_distribusi == 'beras')
                                        {{ number_format($distribusi->jumlah_beras, 1, ',', '.') }} kg
                                    @else
                                        <span class="block">Uang: Rp {{ number_format($distribusi->jumlah_uang, 0, ',', '.') }}</span>
                                        <span class="block mt-1">Beras: {{ number_format($distribusi->jumlah_beras, 1, ',', '.') }} kg</span>
                                    @endif
                                </p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-secondary-DEFAULT">Tanggal Distribusi</h3>
                                <p class="mt-1 text-secondary-dark">{{ \Carbon\Carbon::parse($distribusi->tanggal)->format('d F Y') }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-secondary-DEFAULT">Tanggal Dibuat</h3>
                                <p class="mt-1 text-secondary-dark">{{ $distribusi->created_at->format('d F Y, H:i') }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-secondary-DEFAULT">Terakhir Diperbarui</h3>
                                <p class="mt-1 text-secondary-dark">{{ $distribusi->updated_at->format('d F Y, H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-gray-200 mt-8 pt-6">
                    <h2 class="text-lg font-medium text-secondary-dark mb-4">Keterangan Tambahan</h2>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-gray-700">{{ $distribusi->keterangan ?: 'Tidak ada keterangan tambahan.' }}</p>
                    </div>
                </div>
                
                <div class="mt-8 flex justify-end">
                    <div class="flex space-x-3">
                        <a href="{{ route('distribusi.edit', $distribusi->id_distribusi) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-300 shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            Edit Data
                        </a>
                        <button type="button" onclick="showDeleteModal('delete-modal')" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition duration-300 shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            Hapus Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div id="delete-modal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-gray-900 bg-opacity-50 flex items-center justify-center">
    <div class="relative mx-auto max-w-md bg-white rounded-lg shadow-lg p-6">
        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-red-500 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            
            <h3 class="text-xl font-medium text-gray-900 mb-2">Konfirmasi Hapus</h3>
            <p class="text-gray-500 mb-6">
                Apakah Anda yakin ingin menghapus distribusi zakat untuk <span class="font-medium text-gray-700">{{ $distribusi->nama_mustahik }}</span>?
            </p>
            
            <div class="flex justify-center space-x-3">
                <button type="button" onclick="hideDeleteModal('delete-modal')" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium rounded-lg">
                    Batal
                </button>
                
                <form action="{{ route('distribusi.destroy', $distribusi->id_distribusi) }}" method="POST" class="inline">
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
@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script>
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
        const modal = document.getElementById('delete-modal');
        if (event.target === modal) {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            const visibleModal = document.querySelector('#delete-modal:not(.hidden)');
            if (visibleModal) {
                visibleModal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        }
    });
</script>
@endpush 