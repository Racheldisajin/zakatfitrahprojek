@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header dengan styling yang ditingkatkan -->
        <div class="mb-8 flex flex-col md:flex-row md:justify-between md:items-center">
            <div class="mb-4 md:mb-0">
                <h1 class="text-3xl font-bold text-secondary-dark">
                    <span class="inline-block border-b-4 border-primary-DEFAULT pb-1">Tambah Mustahik</span>
                </h1>
                <p class="mt-2 text-secondary-DEFAULT text-opacity-80">Formulir untuk menambahkan data penerima zakat baru ke dalam sistem</p>
            </div>
            <div>
                <a href="{{ route('mustahik.index') }}" class="inline-flex items-center px-5 py-2.5 bg-white border border-gray-200 shadow-sm hover:bg-gray-50 text-secondary-DEFAULT font-medium rounded-lg transition duration-300">
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
                <h2 class="text-lg font-semibold text-secondary-dark">Informasi Mustahik</h2>
                <p class="text-sm text-gray-500">Isi formulir berikut dengan data yang lengkap dan valid</p>
            </div>

            <!-- Form Content -->
            <div class="p-6">
                <form action="{{ route('mustahik.store') }}" method="POST" id="mustahik-form" class="space-y-8">
                    @csrf
                    <!-- Tambahkan hidden field untuk memastikan session terjaga -->
                    <input type="hidden" name="session_key" value="{{ auth()->check() ? auth()->id() : '' }}">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                        <!-- Form Section 1 -->
                        <div class="flex flex-col h-full justify-between">
                            <div class="mb-6">
                                <label for="nama" class="block text-sm font-medium text-secondary-DEFAULT mb-2">
                                    Nama Mustahik <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}" 
                                        class="pl-10 block w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-transparent transition duration-200" 
                                        placeholder="Masukkan nama lengkap" required>
                                </div>
                                @error('nama')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6 mt-5">
                                <label for="nik" class="block text-sm font-medium text-secondary-DEFAULT mb-2">
                                    Nomor Induk Kependudukan
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" name="nik" id="nik" value="{{ old('nik') }}" 
                                        class="pl-10 block w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-transparent transition duration-200" 
                                        placeholder="Contoh: 1234567890123456">
                                </div>
                                <p class="text-xs text-gray-500 mt-1">NIK terdiri dari 16 digit angka</p>
                                @error('nik')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-auto">
                                <label for="alamat" class="block text-sm font-medium text-secondary-DEFAULT mb-2">
                                    Alamat Lengkap
                                </label>
                                <div class="relative">
                                    <div class="absolute top-3 left-3 flex items-start pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <textarea name="alamat" id="alamat" rows="3" 
                                        class="pl-10 block w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-transparent transition duration-200" 
                                        placeholder="Masukkan alamat lengkap termasuk RT/RW">{{ old('alamat') }}</textarea>
                                </div>
                                @error('alamat')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Form Section 2 -->
                        <div class="flex flex-col h-full justify-between">
                            <div class="mb-6">
                                <label for="kategori" class="block text-sm font-medium text-secondary-DEFAULT mb-2">
                                    Kategori Mustahik <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                        </svg>
                                    </div>
                                    <select name="kategori" id="kategori" 
                                        class="pl-10 block w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-transparent transition duration-200 appearance-none bg-no-repeat" 
                                        style="background-image: url('data:image/svg+xml;charset=US-ASCII,<svg width=\"20\" height=\"20\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 20 20\" fill=\"%236B7280\"><path fill-rule=\"evenodd\" d=\"M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z\" clip-rule=\"evenodd\" /></svg>'); background-position: right 1rem center; background-size: 1.5em 1.5em;"
                                        required>
                                        <option value="">-- Pilih kategori mustahik --</option>
                                        @foreach($kategori as $kat)
                                            <option value="{{ $kat->nama_kategori }}" data-hak="{{ $kat->jumlah_hak }}" {{ old('kategori') == $kat->nama_kategori ? 'selected' : '' }}>
                                                {{ $kat->nama_kategori }} ({{ $kat->jumlah_hak }}%)
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Kategori menentukan persentase dari total zakat yang akan diterima</p>
                                @error('kategori')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="hak" class="block text-sm font-medium text-secondary-DEFAULT mb-2">
                                    Persentase Hak <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="number" name="hak" id="hak" value="{{ old('hak') }}" 
                                        class="pl-10 block w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50 cursor-not-allowed text-secondary-DEFAULT focus:outline-none" 
                                        readonly>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <span class="text-gray-500">%</span>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Nilai persentase ini diisi otomatis berdasarkan kategori</p>
                                @error('hak')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-auto">
                                <label for="keterangan" class="block text-sm font-medium text-secondary-DEFAULT mb-2">
                                    Keterangan Tambahan
                                </label>
                                <div class="relative">
                                    <div class="absolute top-3 left-3 flex items-start pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <textarea name="keterangan" id="keterangan" rows="3" 
                                        class="pl-10 block w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-transparent transition duration-200" 
                                        placeholder="Tambahkan informasi pendukung jika diperlukan">{{ old('keterangan') }}</textarea>
                                </div>
                                @error('keterangan')
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Simpan Data Mustahik
                        </button>
                        <button type="reset" class="w-full sm:w-auto px-6 py-3 bg-gray-100 hover:bg-gray-200 text-secondary-DEFAULT font-medium rounded-lg transition duration-300 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 100-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
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
                        Untuk informasi lebih lanjut tentang kategori mustahik dan jumlah hak, silakan hubungi admin atau buka halaman bantuan.
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900">
                    Konfirmasi Simpan Data
                </h3>
            </div>
            
            <!-- Content area -->
            <div class="bg-white px-6 py-6">
                <div class="text-center mb-5">
                    <p class="text-base text-gray-600 mb-2">
                        Anda akan menyimpan data mustahik baru:
                    </p>
                    <p id="confirm-name" class="text-lg font-semibold text-gray-900">
                        -
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
                                Pastikan data yang Anda masukkan sudah benar. Data ini akan disimpan ke dalam sistem.
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
                    Simpan Data
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const kategoriSelect = document.getElementById('kategori');
        const hakInput = document.getElementById('hak');
        const form = document.getElementById('mustahik-form');
        
        // Add event listener to the confirmation button in modal
        document.getElementById('confirm-save-button').addEventListener('click', function() {
            try {
                // Pastikan semua elemen form terisi dengan benar
                const formData = new FormData(form);
                
                // Debug - log form action dan method
                console.log('Form action:', form.action);
                console.log('Form method:', form.method);
                
                // Verifikasi CSRF token
                const csrfToken = document.querySelector('input[name="_token"]');
                if (!csrfToken) {
                    console.error('CSRF token tidak ditemukan!');
                    // Tambahkan CSRF token jika tidak ada
                    const token = document.createElement('input');
                    token.type = 'hidden';
                    token.name = '_token';
                    token.value = '{{ csrf_token() }}';
                    form.appendChild(token);
                }
                
                // Pastikan user masih terautentikasi
                if ('{{ auth()->check() }}' !== '1') {
                    console.error('User tidak terautentikasi!');
                    alert('Sesi login Anda telah berakhir. Silakan login kembali.');
                    window.location.href = '{{ route("login") }}';
                    return;
                }
                
                // Submit form langsung tanpa redirect
                form.submit();
            } catch (error) {
                console.error('Error saat submit form:', error);
                alert('Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
            }
        });

        // Set initial value if kategori is already selected
        if (kategoriSelect.value) {
            const selectedOption = kategoriSelect.options[kategoriSelect.selectedIndex];
            const hakValue = selectedOption.getAttribute('data-hak');
            if (hakValue) {
                hakInput.value = hakValue;
            }
        }

        kategoriSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const hakValue = selectedOption.getAttribute('data-hak');
            
            // Animate the change with a quick highlight effect
            hakInput.classList.add('bg-blue-50');
            setTimeout(() => {
                hakInput.classList.remove('bg-blue-50');
            }, 500);
            
            if (hakValue) {
                hakInput.value = hakValue;
            } else {
                hakInput.value = '';
            }
        });
    });
    
    // Show save confirmation modal
    function showSaveModal() {
        // Get form values
        const nameInput = document.getElementById('nama');
        
        // Validate form (basic validation)
        let isValid = true;
        const requiredFields = document.querySelectorAll('[required]');
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('border-red-500', 'ring-1', 'ring-red-500');
                field.focus();
                isValid = false;
            } else {
                field.classList.remove('border-red-500', 'ring-1', 'ring-red-500');
            }
        });
        
        if (!isValid) return;
        
        // Update modal with form data
        document.getElementById('confirm-name').textContent = nameInput.value;
        
        // Show modal
        document.getElementById('save-modal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }
    
    // Hide save modal
    function hideSaveModal() {
        document.getElementById('save-modal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
    
    // Close modal when clicking outside
    document.addEventListener('click', function(event) {
        const modal = document.getElementById('save-modal');
        if (event.target === modal) {
            hideSaveModal();
        }
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            const modal = document.getElementById('save-modal');
            if (!modal.classList.contains('hidden')) {
                hideSaveModal();
            }
        }
    });
</script>
@endsection