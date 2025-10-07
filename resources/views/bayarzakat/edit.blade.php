@extends('layouts.app')

@section('title', 'Edit Pembayaran Zakat - Sistem Zakat Fitrah')

@section('content')
<!-- Main Content -->
<div class="py-12 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header dengan styling yang ditingkatkan -->
        <div class="mb-8 flex flex-col md:flex-row md:justify-between md:items-center">
            <div class="mb-4 md:mb-0">
                <h1 class="text-3xl font-bold text-secondary-dark">
                    <span class="inline-block border-b-4 border-primary-DEFAULT pb-1">Edit Pembayaran Zakat</span>
                </h1>
                <p class="mt-2 text-secondary-DEFAULT text-opacity-80">Formulir untuk memperbarui data pembayaran zakat dalam sistem</p>
            </div>
            <div>
                <a href="{{ route('bayarzakat.index') }}" class="inline-flex items-center px-5 py-2.5 bg-white border border-gray-200 shadow-sm hover:bg-gray-50 text-secondary-DEFAULT font-medium rounded-lg transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Kembali ke Daftar
                </a>
            </div>
        </div>

        <!-- Form Card dengan desain yang lebih menarik -->
        <div class="bg-white rounded-xl shadow-custom overflow-hidden border border-gray-100">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-secondary-dark">Informasi Pembayaran Zakat</h2>
                <p class="text-sm text-gray-500">Perbarui formulir ini dengan data yang lengkap dan valid</p>
            </div>

            <!-- Form Content -->
            <div class="p-6">
                <form action="{{ route('bayarzakat.update', $bayarzakat->id_zakat) }}" method="POST" x-data="{ jenisBayar: '{{ $bayarzakat->jenis_bayar }}' }" class="space-y-8" id="bayarzakat-form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id_zakat" value="{{ $bayarzakat->id_zakat }}">
                    
                    @if ($errors->any())
                    <div class="mb-6">
                        <div class="bg-red-50 border-l-4 border-red-500 text-red-800 p-4 rounded-lg" role="alert">
                            <p class="font-medium">Terjadi kesalahan:</p>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                        <!-- Form Section 1: Data Muzakki -->
                        <div class="flex flex-col h-full justify-between">
                            <div class="mb-6">
                                <label for="nama_kk" class="block text-sm font-medium text-secondary-DEFAULT mb-2">
                                    Nama Muzakki <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" name="nama_kk" id="nama_kk" value="{{ old('nama_kk', $bayarzakat->nama_kk) }}" 
                                        class="pl-10 block w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-transparent transition duration-200" 
                                        required>
                                    <input type="hidden" name="id_muzakki" id="id_muzakki" value="{{ old('id_muzakki', $bayarzakat->id_muzakki) }}">
                                </div>
                                @error('nama_kk')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="jumlah_tanggungan" class="block text-sm font-medium text-secondary-DEFAULT mb-2">
                                    Jumlah Tanggungan <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                        </svg>
                                    </div>
                                    <input type="number" name="jumlah_tanggungan" id="jumlah_tanggungan" value="{{ old('jumlah_tanggungan', $bayarzakat->jumlah_tanggungan) }}" min="1" 
                                        class="pl-10 block w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-transparent transition duration-200" 
                                        required>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Jumlah orang yang ditanggung termasuk diri sendiri</p>
                                @error('jumlah_tanggungan')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Form Section 2: Jenis dan Jumlah Pembayaran -->
                        <div class="space-y-8">
                            <div>
                                <label class="block text-sm font-medium text-secondary-DEFAULT mb-3">
                                    Jenis Pembayaran <span class="text-red-500">*</span>
                                </label>
                                <div class="flex space-x-6 mt-4">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="jenis_bayar" value="uang" x-model="jenisBayar" class="h-5 w-5 text-blue-600 focus:ring-blue-500" {{ $bayarzakat->jenis_bayar == 'uang' ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">Uang</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="jenis_bayar" value="beras" x-model="jenisBayar" class="h-5 w-5 text-blue-600 focus:ring-blue-500" {{ $bayarzakat->jenis_bayar == 'beras' ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">Beras</span>
                                    </label>
                                </div>
                                @error('jenis_bayar')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div x-show="jenisBayar == 'uang'" class="mt-12 pt-9">
                                <label for="bayar_uang" class="block text-sm font-medium text-secondary-DEFAULT mb-2">
                                    Jumlah Uang (Rp) <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="number" name="bayar_uang" id="bayar_uang" value="{{ old('bayar_uang', $bayarzakat->bayar_uang) }}" 
                                        class="pl-10 block w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-transparent transition duration-200" 
                                        placeholder="Masukkan jumlah dalam Rupiah">
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Contoh: 50000 untuk Rp 50.000</p>
                                @error('bayar_uang')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div x-show="jenisBayar == 'beras'" class="mt-12 pt-9">
                                <label for="bayar_beras" class="block text-sm font-medium text-secondary-DEFAULT mb-2">
                                    Jumlah Beras (kg) <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="number" name="bayar_beras" id="bayar_beras" value="{{ old('bayar_beras', $bayarzakat->bayar_beras) }}" step="0.1" 
                                        class="pl-10 block w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-transparent transition duration-200" 
                                        placeholder="Masukkan jumlah dalam kilogram">
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Contoh: 2.5 untuk 2,5 kg</p>
                                @error('bayar_beras')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Required Fields Info -->
                    <div class="pt-2">
                        <p class="text-sm text-gray-500">
                            <span class="text-red-500">*</span> Menandakan kolom yang wajib diisi
                        </p>
                    </div>

                    <!-- Form Actions -->
                    <div class="pt-6 border-t border-gray-200 flex flex-col sm:flex-row-reverse gap-3">
                        <button type="button" onclick="showSaveModal()" class="w-full sm:w-auto px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-300 shadow-md flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Perbarui Data Pembayaran
                        </button>
                        <button type="reset" class="w-full sm:w-auto px-6 py-3 bg-gray-100 hover:bg-gray-200 text-secondary-DEFAULT font-medium rounded-lg transition duration-300 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.662A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                            </svg>
                            Reset Formulir
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Help Section -->
        <div class="mt-6 bg-blue-50 rounded-lg p-4 border border-blue-100">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1v-3a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h4 class="text-sm font-medium text-blue-800">Bantuan Pengisian Formulir</h4>
                    <p class="mt-1 text-sm text-blue-700">
                        Untuk informasi lebih lanjut tentang pengisian data pembayaran zakat, silakan hubungi admin atau buka halaman bantuan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Simpan -->
<div id="save-modal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4 sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        
        <div class="relative inline-block w-full max-w-md bg-white rounded-lg shadow-xl overflow-hidden transform transition-all sm:max-w-md" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <!-- Header dengan ikon -->
            <div class="bg-blue-50 px-6 py-6 text-center">
                <div class="mx-auto flex items-center justify-center h-14 w-14 rounded-full bg-white mb-4 shadow">
                    <svg class="h-7 w-7 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900">
                    Konfirmasi Perbarui Data
                </h3>
            </div>
            
            <!-- Content area -->
            <div class="bg-white px-6 py-6">
                <div class="text-center mb-5">
                    <p class="text-base text-gray-600 mb-2">
                        Anda akan memperbarui data pembayaran zakat untuk:
                    </p>
                    <p id="confirm-name" class="text-lg font-semibold text-gray-900">
                        {{ $bayarzakat->nama_kk }}
                    </p>
                </div>
                
                <!-- Confirmation alert -->
                <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-5">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1v-3a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-blue-700">
                                Pastikan data yang Anda masukkan sudah benar. Perubahan akan disimpan ke dalam sistem.
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
                <button type="button" id="confirm-save-button" class="w-full sm:w-auto inline-flex justify-center items-center px-5 py-2.5 rounded-md border border-transparent shadow-sm bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200">
                    <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Perbarui Data
                </button>
                <button type="button" onclick="hideSaveModal()" class="w-full sm:w-auto inline-flex justify-center items-center px-5 py-2.5 mt-3 sm:mt-0 sm:mr-3 rounded-md border border-gray-300 shadow-sm bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200">
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
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM Content Loaded');
        
        // Debug form values
        const form = document.getElementById('bayarzakat-form');
        console.log('Form element:', form);
        console.log('Form action:', form.action);
        console.log('Form method:', form.method);
        
        // Add submit event listener directly to the form
        form.addEventListener('submit', function(e) {
            console.log('Form submit event triggered');
        });
        
        // Fungsi untuk mengupdate perhitungan berdasarkan jumlah tanggungan
        function hitungPembayaran(jumlahTanggungan) {
            // Memastikan jumlah tanggungan adalah angka
            jumlahTanggungan = parseInt(jumlahTanggungan) || 0;
            
            // Nilai per orang
            const uangPerOrang = 45000; // Rp 45.000 per orang
            const berasPerOrang = 2.5;  // 2,5 kg per orang
            
            // Menghitung total (termasuk kepala keluarga)
            const totalOrang = jumlahTanggungan;
            const totalUang = totalOrang * uangPerOrang;
            const totalBeras = totalOrang * berasPerOrang;
            
            // Mengisi form
            document.getElementById("bayar_uang").value = totalUang;
            document.getElementById("bayar_beras").value = totalBeras;
        }
        
        // Event listener untuk perubahan jumlah tanggungan
        document.getElementById("jumlah_tanggungan").addEventListener('change', function() {
            hitungPembayaran(this.value);
        });
        
        // Mengaitkan event click untuk tombol konfirmasi simpan
        const confirmSaveButton = document.getElementById('confirm-save-button');
        if (confirmSaveButton) {
            confirmSaveButton.addEventListener('click', function(e) {
                console.log("Confirm save button clicked");
                
                // Submit form programmatically
                if (form) {
                    console.log("Submitting form...");
                    try {
                        form.submit();
                    } catch (error) {
                        console.error("Error submitting form:", error);
                    }
                } else {
                    console.error("Form not found");
                }
            });
        }
        
        // Initialize with current jumlah_tanggungan value if available
        const initialTanggungan = document.getElementById("jumlah_tanggungan").value;
        if (initialTanggungan) {
            hitungPembayaran(initialTanggungan);
        }
    });
    
    // Show save modal
    function showSaveModal() {
        console.log("showSaveModal called");
        
        // Get form values
        const nameInput = document.getElementById('nama_kk');
        const tanggunganInput = document.getElementById('jumlah_tanggungan');
        const jenisBayar = document.querySelector('input[name="jenis_bayar"]:checked');
        
        // Validate form
        let isValid = true;
        
        if (!nameInput.value.trim()) {
            nameInput.focus();
            nameInput.classList.add('border-red-500', 'ring-1', 'ring-red-500');
            isValid = false;
        } else {
            nameInput.classList.remove('border-red-500', 'ring-1', 'ring-red-500');
        }
        
        if (!tanggunganInput.value.trim() || tanggunganInput.value < 1) {
            tanggunganInput.focus();
            tanggunganInput.classList.add('border-red-500', 'ring-1', 'ring-red-500');
            isValid = false;
        } else {
            tanggunganInput.classList.remove('border-red-500', 'ring-1', 'ring-red-500');
        }
        
        if (!jenisBayar) {
            // Elemen jenis_uang tidak ada di markup, jadi kita fokus ke radio button pertama
            document.querySelector('input[name="jenis_bayar"]').focus();
            isValid = false;
        }
        
        if (!isValid) {
            console.log("Form validation failed");
            return; // Don't proceed if form is invalid
        }
        
        // Check bayar_uang or bayar_beras based on jenisBayar
        if (jenisBayar.value === 'uang') {
            const bayarUang = document.getElementById('bayar_uang');
            if (!bayarUang.value || bayarUang.value <= 0) {
                bayarUang.focus();
                bayarUang.classList.add('border-red-500', 'ring-1', 'ring-red-500');
                console.log("Invalid uang value");
                return;
            }
        } else {
            const bayarBeras = document.getElementById('bayar_beras');
            if (!bayarBeras.value || bayarBeras.value <= 0) {
                bayarBeras.focus();
                bayarBeras.classList.add('border-red-500', 'ring-1', 'ring-red-500');
                console.log("Invalid beras value");
                return;
            }
        }
        
        // Update modal with form data
        document.getElementById('confirm-name').textContent = nameInput.value;
        
        // Show modal
        const modal = document.getElementById('save-modal');
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
        
        console.log("Save modal displayed");
    }
    
    // Hide save modal
    function hideSaveModal() {
        document.getElementById('save-modal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
        console.log("Save modal hidden");
    }
    
    // Close modal when clicking outside
    document.addEventListener('click', function(event) {
        const modal = document.getElementById('save-modal');
        if (event.target === modal) {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            const modal = document.getElementById('save-modal');
            if (!modal.classList.contains('hidden')) {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        }
    });
</script>
@endpush 