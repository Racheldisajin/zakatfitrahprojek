@extends('layouts.app')

@section('title', 'Detail Muzakki - Sistem Zakat Fitrah')

@section('content')
<!-- Main Content -->
<div class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-secondary-dark">Detail Muzakki</h1>
                <p class="mt-2 text-secondary-DEFAULT">Informasi lengkap tentang muzakki</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('muzakki.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-secondary-DEFAULT font-medium rounded-lg transition duration-300">
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
                        <h2 class="text-lg font-medium text-secondary-dark mb-4">Informasi Muzakki</h2>
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-sm font-medium text-secondary-DEFAULT">ID Muzakki</h3>
                                <p class="mt-1 text-secondary-dark">{{ $muzakki->id_muzakki }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-secondary-DEFAULT">Nama Muzakki</h3>
                                <p class="mt-1 text-secondary-dark">{{ $muzakki->nama_muzakki }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-secondary-DEFAULT">Alamat</h3>
                                <p class="mt-1 text-secondary-dark">
                                    @if($muzakki->alamat)
                                        {{ $muzakki->alamat }}
                                    @else
                                        <span class="text-gray-400 italic">Tidak ada alamat</span>
                                    @endif
                                </p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-secondary-DEFAULT">Jumlah Tanggungan</h3>
                                <p class="mt-1 text-secondary-dark">{{ $muzakki->jumlah_tanggungan }} orang</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-secondary-DEFAULT">Tanggal Ditambahkan</h3>
                                <p class="mt-1 text-secondary-dark">{{ $muzakki->created_at->format('d F Y, H:i') }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-secondary-DEFAULT">Terakhir Diperbarui</h3>
                                <p class="mt-1 text-secondary-dark">{{ $muzakki->updated_at->format('d F Y, H:i') }}</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-lg font-medium text-secondary-dark mb-4">Keterangan</h2>
                        <div class="bg-gray-50 rounded-lg p-4 h-full">
                            <p class="text-secondary-dark">
                                @if($muzakki->keterangan)
                                    {{ $muzakki->keterangan }}
                                @else
                                    <span class="text-gray-400 italic">Tidak ada keterangan</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-gray-200 mt-8 pt-6">
                    <h2 class="text-lg font-medium text-secondary-dark mb-4">Riwayat Pembayaran Zakat</h2>
                    
                    @if($pembayaranZakat->count() > 0)
                        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Tanggal</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Jumlah Tanggungan</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Jenis Bayar</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Jumlah Bayar</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Status</th>
                                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-secondary-DEFAULT uppercase tracking-wider">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($pembayaranZakat as $bayar)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary-dark">{{ $bayar->created_at->format('d M Y, H:i') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary-dark">{{ $bayar->jumlah_tanggungan }} orang</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary-dark">
                                                @if($bayar->jenis_bayar == 'beras')
                                                    <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-700">Beras</span>
                                                @else
                                                    <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">Uang</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary-dark">
                                                @if($bayar->jenis_bayar == 'beras')
                                                    {{ $bayar->bayar_beras }} kg
                                                @else
                                                    Rp{{ number_format($bayar->bayar_uang, 0, ',', '.') }}
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">Lunas</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                                <a href="{{ route('bayarzakat.show', $bayar->id_zakat) }}" class="text-blue-600 hover:text-blue-900 font-medium">Detail</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                    <div class="bg-gray-50 rounded-lg p-6 text-center">
                        <p class="text-secondary-DEFAULT">Data pembayaran zakat akan muncul di sini setelah muzakki melakukan pembayaran.</p>
                        <a href="{{ route('bayarzakat.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-800 text-white font-medium rounded-lg transition duration-300 shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Catat Pembayaran Baru
                        </a>
                    </div>
                    @endif
                </div>
                
                <div class="mt-8 flex justify-between items-center">
                    <button type="button" onclick="showDeleteModal('delete-modal')" class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        Hapus Muzakki
                    </button>
                    <a href="{{ route('muzakki.edit', $muzakki->id_muzakki) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-800 text-white font-medium rounded-lg transition duration-300 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                        Edit Muzakki
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="delete-modal" class="fixed inset-0 z-50 overflow-y-auto hidden">
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
                <button type="button" onclick="hideDeleteModal('delete-modal')" class="w-full sm:w-auto inline-flex justify-center items-center px-5 py-2.5 mt-3 sm:mt-0 sm:mr-3 rounded-md border border-gray-300 shadow-sm bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200">
                    <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
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
            const modal = document.getElementById('delete-modal');
            if (!modal.classList.contains('hidden')) {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        }
    });
</script>
@endpush 