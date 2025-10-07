@extends('layouts.app')

@section('title', 'Tambah Distribusi Zakat - Sistem Zakat Fitrah')

@section('content')
<!-- Main Content -->
<div class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-secondary-dark">Tambah Distribusi Zakat</h1>
                    <p class="mt-2 text-secondary-DEFAULT">Distribusikan zakat fitrah kepada mustahik yang berhak</p>
                </div>
                <div>
                    <a href="{{ route('distribusi.index') }}" class="inline-flex items-center px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-secondary-dark font-medium rounded-lg transition duration-300 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        <!-- Notification -->
        @if(session('error'))
        <div class="mb-6">
            <div class="bg-red-100 border-l-4 border-red-600 text-red-700 p-4 rounded-lg" role="alert">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        </div>
        @endif

        <!-- Info Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-custom p-6 border-l-4 border-green-500">
                <div class="flex items-center">
                    <div class="bg-primary-light p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-secondary-dark">Dana Zakat Tersedia</h2>
                        <p class="text-3xl font-bold text-primary-DEFAULT">
                            Rp {{ number_format($danaTersedia ?? 0, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-custom p-6 border-l-4 border-indigo-500">
                <div class="flex items-center">
                    <div class="bg-secondary-light p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-secondary-dark">Beras Zakat Tersedia</h2>
                        <p class="text-3xl font-bold text-secondary-DEFAULT">
                            {{ number_format($berasTersedia ?? 0, 1, ',', '.') }} kg
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-custom overflow-hidden">
            <div class="p-6">
                <h2 class="text-xl font-semibold text-secondary-dark mb-6">Formulir Distribusi Zakat</h2>

                <form action="{{ route('distribusi.store') }}" method="POST">
                    @csrf
                    
                    <!-- Header Informasi Mustahik -->
                    <div class="bg-blue-50 p-4 rounded-lg mb-6">
                        <h3 class="text-lg font-medium text-secondary-dark">Informasi Mustahik</h3>
                        <p class="text-sm text-gray-600">Isi formulir berikut dengan data yang lengkap dan valid</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <!-- Nama Mustahik -->
                        <div>
                            <label for="nama_mustahik" class="block text-sm font-medium text-secondary-dark mb-2">Nama Mustahik <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" name="nama_mustahik" id="nama_mustahik" value="{{ old('nama_mustahik') }}" class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-transparent" placeholder="Masukkan nama lengkap" required>
                                <input type="hidden" name="id_mustahik" id="id_mustahik" value="{{ old('id_mustahik') }}">
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Ketik minimal 2 karakter untuk pencarian otomatis</p>
                            @error('nama_mustahik')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kategori Mustahik -->
                        <div>
                            <label for="kategori" class="block text-sm font-medium text-secondary-dark mb-2">Kategori Mustahik <span class="text-red-500">*</span></label>
                            <select name="kategori" id="kategori" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-transparent" required>
                                <option value="" disabled selected>-- Pilih kategori mustahik --</option>
                                @foreach($kategoriMustahik as $kat)
                                <option value="{{ $kat->nama_kategori }}" data-hak="{{ $kat->jumlah_hak }}" data-jumlah="{{ $jumlahOrangPerKategori[$kat->nama_kategori] ?? 1 }}" {{ old('kategori') == $kat->nama_kategori ? 'selected' : '' }}>
                                    {{ $kat->nama_kategori }} ({{ $kat->jumlah_hak }}%)
                                </option>
                                @endforeach
                            </select>
                            <p class="text-xs text-gray-500 mt-1">Kategori menentukan persentase dari total zakat yang akan diterima</p>
                            @error('kategori')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <!-- NIK Mustahik -->
                        <div>
                            <label for="nik" class="block text-sm font-medium text-secondary-dark mb-2">Nomor Induk Kependudukan</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" name="nik" id="nik" value="{{ old('nik') }}" class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-transparent" placeholder="Contoh: 1234567890123456">
                            </div>
                            <p class="text-xs text-gray-500 mt-1">NIK terdiri dari 16 digit angka</p>
                            @error('nik')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Persentase Hak -->
                        <div>
                            <label for="hak" class="block text-sm font-medium text-secondary-dark mb-2">Persentase Hak <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="number" name="hak" id="hak" value="{{ old('hak') }}" class="w-full pl-10 pr-10 py-2.5 border border-gray-200 rounded-lg bg-gray-50 cursor-not-allowed text-secondary-DEFAULT focus:outline-none" readonly>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <span class="text-gray-500">%</span>
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Nilai persentase ini diisi otomatis berdasarkan kategori</p>
                            @error('hak')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <!-- Alamat Mustahik -->
                        <div>
                            <label for="alamat" class="block text-sm font-medium text-secondary-dark mb-2">Alamat Lengkap</label>
                            <div class="relative">
                                <div class="absolute top-3 left-3 flex items-start pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <textarea name="alamat" id="alamat" rows="3" class="w-full pl-10 px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-transparent" placeholder="Masukkan alamat lengkap termasuk RT/RW">{{ old('alamat') }}</textarea>
                            </div>
                            @error('alamat')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Keterangan Tambahan -->
                        <div>
                            <label for="keterangan" class="block text-sm font-medium text-secondary-dark mb-2">Keterangan Tambahan</label>
                            <div class="relative">
                                <div class="absolute top-3 left-3 flex items-start pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <textarea name="keterangan" id="keterangan" rows="3" class="w-full pl-10 px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-transparent" placeholder="Tambahkan informasi pendukung jika diperlukan">{{ old('keterangan') }}</textarea>
                            </div>
                            @error('keterangan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Informasi Distribusi -->
                    <div class="bg-blue-50 p-4 rounded-lg mb-6 mt-10">
                        <h3 class="text-lg font-medium text-secondary-dark">Informasi Distribusi</h3>
                        <p class="text-sm text-gray-600">Pilih jenis dan jumlah distribusi zakat</p>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-secondary-dark mb-2">Jenis Distribusi <span class="text-red-500">*</span></label>
                        <div class="flex flex-wrap gap-4">
                            <label class="relative flex items-center p-3 rounded-md border border-gray-200 cursor-pointer hover:bg-gray-50 transition duration-300">
                                <input type="radio" name="jenis_distribusi" value="uang" class="h-5 w-5 text-primary-DEFAULT focus:ring-primary-DEFAULT" {{ old('jenis_distribusi') == 'uang' ? 'checked' : '' }} required>
                                <span class="ml-2 text-secondary-dark">Uang Tunai</span>
                            </label>
                            <label class="relative flex items-center p-3 rounded-md border border-gray-200 cursor-pointer hover:bg-gray-50 transition duration-300">
                                <input type="radio" name="jenis_distribusi" value="beras" class="h-5 w-5 text-primary-DEFAULT focus:ring-primary-DEFAULT" {{ old('jenis_distribusi') == 'beras' ? 'checked' : '' }}>
                                <span class="ml-2 text-secondary-dark">Beras</span>
                            </label>
                            <label class="relative flex items-center p-3 rounded-md border border-gray-200 cursor-pointer hover:bg-gray-50 transition duration-300">
                                <input type="radio" name="jenis_distribusi" value="kombinasi" class="h-5 w-5 text-primary-DEFAULT focus:ring-primary-DEFAULT" {{ old('jenis_distribusi') == 'kombinasi' ? 'checked' : '' }}>
                                <span class="ml-2 text-secondary-dark">Kombinasi (Uang & Beras)</span>
                            </label>
                        </div>
                        @error('jenis_distribusi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div id="distribusi-uang" class="mb-6 {{ old('jenis_distribusi') == 'beras' ? 'hidden' : '' }}">
                        <label for="jumlah_uang" class="block text-sm font-medium text-secondary-dark mb-2">Jumlah Uang (Rp) <span class="text-red-500 jumlah-required {{ old('jenis_distribusi') == 'beras' ? 'hidden' : '' }}">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <span class="text-gray-500">Rp</span>
                            </div>
                            <input type="text" name="jumlah_uang" id="jumlah_uang" value="{{ old('jumlah_uang') }}" class="w-full pl-12 pr-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-transparent" placeholder="0" {{ old('jenis_distribusi') == 'uang' || old('jenis_distribusi') == 'kombinasi' ? 'required' : '' }}>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">Maksimal: Rp {{ number_format($danaTersedia ?? 0, 0, ',', '.') }}</p>
                        @error('jumlah_uang')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div id="distribusi-beras" class="mb-6 {{ old('jenis_distribusi') == 'uang' ? 'hidden' : '' }}">
                        <label for="jumlah_beras" class="block text-sm font-medium text-secondary-dark mb-2">Jumlah Beras (kg) <span class="text-red-500 jumlah-required {{ old('jenis_distribusi') == 'uang' ? 'hidden' : '' }}">*</span></label>
                        <div class="relative">
                            <input type="number" name="jumlah_beras" id="jumlah_beras" value="{{ old('jumlah_beras') }}" step="0.1" min="0" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-transparent" placeholder="0.0" {{ old('jenis_distribusi') == 'beras' || old('jenis_distribusi') == 'kombinasi' ? 'required' : '' }}>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <span class="text-gray-500">kg</span>
                            </div>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">Maksimal: {{ number_format($berasTersedia ?? 0, 1, ',', '.') }} kg</p>
                        @error('jumlah_beras')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="tanggal" class="block text-sm font-medium text-secondary-dark mb-2">Tanggal Distribusi <span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-transparent" required>
                        @error('tanggal')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('distribusi.index') }}" class="px-6 py-2.5 bg-gray-100 hover:bg-gray-200 text-secondary-dark font-medium rounded-lg transition duration-300">
                            Batal
                        </a>
                        <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-300 shadow-md">
                            Simpan Distribusi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const jenisDistribusiRadios = document.querySelectorAll('input[name="jenis_distribusi"]');
        const distribusiUangDiv = document.getElementById('distribusi-uang');
        const distribusiBerasDiv = document.getElementById('distribusi-beras');
        const jumlahUangInput = document.getElementById('jumlah_uang');
        const jumlahBerasInput = document.getElementById('jumlah_beras');
        const kategoriSelect = document.getElementById('kategori');
        const hakInput = document.getElementById('hak');
        
        // Data stok yang tersedia
        const danaTersedia = {{ $danaTersedia ?? 0 }};
        const berasTersedia = {{ $berasTersedia ?? 0 }};
        
        // Mapping kategori ke jumlah orang (data dari backend)
        const jumlahOrangPerKategori = {
            @foreach($jumlahOrangPerKategori as $kategori => $jumlah)
                '{{ $kategori }}': {{ $jumlah }},
            @endforeach
        };
        
        // Field tersembunyi untuk menyimpan data jumlah orang
        let jumlahOrangKategori = 1;
        
        // Persentase default untuk kombinasi
        let persenUangDalamKategori = 50;
        let persenBerasDalamKategori = 50;
        
        // Tambahkan slider untuk distribusi kombinasi
        const kombinasiDiv = document.createElement('div');
        kombinasiDiv.classList.add('hidden', 'mt-4', 'mb-2');
        kombinasiDiv.id = 'kombinasi-slider';
        kombinasiDiv.innerHTML = `
            <div class="flex flex-col">
                <label class="block font-medium text-sm text-gray-700">Persentase Pembagian:</label>
                <div class="flex items-center mt-1">
                    <span class="text-sm mr-2">Beras: <span id="persen-beras">50</span>%</span>
                    <input type="range" id="slider-kombinasi" min="0" max="100" value="50" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                    <span class="text-sm ml-2">Uang: <span id="persen-uang">50</span>%</span>
                </div>
            </div>
        `;
        
        // Tambahkan slider setelah pilihan jenis distribusi
        const distribusiDiv = document.querySelector('.mb-6:has(input[name="jenis_distribusi"])');
        if (distribusiDiv) {
            distribusiDiv.insertAdjacentElement('afterend', kombinasiDiv);
            
            // Event listener untuk slider
            const slider = document.getElementById('slider-kombinasi');
            const persenBerasSpan = document.getElementById('persen-beras');
            const persenUangSpan = document.getElementById('persen-uang');
            
            if (slider && persenBerasSpan && persenUangSpan) {
                slider.addEventListener('input', function() {
                    persenBerasDalamKategori = parseInt(this.value);
                    persenUangDalamKategori = 100 - persenBerasDalamKategori;
                    
                    persenBerasSpan.textContent = persenBerasDalamKategori;
                    persenUangSpan.textContent = persenUangDalamKategori;
                    
                    // Recalculate if kategori is selected
                    if (kategoriSelect.value) {
                        hitungDistribusi();
                    }
                });
            }
        }
        
        // Tambahkan info jumlah orang di header formulir
        const kategoriDiv = kategoriSelect.closest('div');
        const infoJumlahOrangEl = document.createElement('div');
        infoJumlahOrangEl.id = 'info-jumlah-orang';
        infoJumlahOrangEl.className = 'mt-2 text-sm text-blue-600 font-medium';
        infoJumlahOrangEl.style.display = 'none';
        kategoriDiv.appendChild(infoJumlahOrangEl);
        
        // Ketika kategori berubah, update persentase hak dan hitung distribusi
        kategoriSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            
            if (selectedOption.value) {
                // Set jumlah orang berdasarkan kategori yang dipilih, bisa dari data-attribute jika ada
                if (selectedOption.dataset && selectedOption.dataset.jumlah) {
                    jumlahOrangKategori = parseInt(selectedOption.dataset.jumlah, 10);
                } else {
                    jumlahOrangKategori = jumlahOrangPerKategori[selectedOption.value] || 1;
                }
                
                // Tampilkan info jumlah orang
                const infoJumlahOrang = document.getElementById('info-jumlah-orang');
                if (infoJumlahOrang) {
                    infoJumlahOrang.textContent = `Terdapat ${jumlahOrangKategori} orang dalam kategori ${selectedOption.value}`;
                    infoJumlahOrang.style.display = 'block';
                }
                
                // Ambil persentase hak dari data-attribute jika ada, atau dari teks
                let persentaseHak;
                if (selectedOption.dataset && selectedOption.dataset.hak) {
                    // Ambil dari data-attribute (lebih akurat)
                    persentaseHak = parseInt(selectedOption.dataset.hak, 10);
                } else {
                    // Ekstrak dari teks opsi yang dipilih (fallback)
                    const match = selectedOption.textContent.match(/\((\d+)%\)/);
                    if (match && match[1]) {
                        persentaseHak = parseInt(match[1], 10);
                    } else {
                        persentaseHak = 0;
                    }
                }
                
                // Update field hak
                hakInput.value = persentaseHak;
                
                // Hitung distribusi
                hitungDistribusi();
            } else {
                hakInput.value = '';
                resetJumlahDistribusi();
                
                // Sembunyikan info jumlah orang
                const infoJumlahOrang = document.getElementById('info-jumlah-orang');
                if (infoJumlahOrang) {
                    infoJumlahOrang.style.display = 'none';
                }
            }
        });
        
        // Fungsi utama untuk menghitung distribusi
        function hitungDistribusi() {
            // Ambil persentase hak dari input
            const persentaseHak = parseInt(hakInput.value, 10) || 0;
            
            // Ambil jenis distribusi yang dipilih
            const jenisDistribusi = document.querySelector('input[name="jenis_distribusi"]:checked')?.value;
            if (!jenisDistribusi) return;
            
            // Pastikan jumlahOrangKategori selalu valid dan minimal 1
            // Jika ada 0 orang, set ke 1 untuk menghindari pembagian oleh nol
            const kategoriTerpilih = kategoriSelect.value;
            if (kategoriTerpilih) {
                const selectedOption = kategoriSelect.options[kategoriSelect.selectedIndex];
                jumlahOrangKategori = parseInt(selectedOption.dataset.jumlah, 10) || 
                                     jumlahOrangPerKategori[kategoriTerpilih] || 1;
            } else {
                jumlahOrangKategori = 1;
            }
            
            console.log("Jumlah orang dalam kategori:", jumlahOrangKategori);
            
            // Sesuai dengan 3 rumus yang diminta
            if (jenisDistribusi === 'uang') {
                // 1. Untuk uang saja
                const totalUangKategori = danaTersedia * (persentaseHak / 100);
                
                // Pastikan pembagian per orang benar
                const uangPerOrang = jumlahOrangKategori > 0 ? totalUangKategori / jumlahOrangKategori : totalUangKategori;
                
                console.log("Total uang kategori:", totalUangKategori);
                console.log("Uang per orang:", uangPerOrang);
                
                // Set nilai ke input - pastikan ini adalah nilai per orang
                jumlahUangInput.value = Math.round(uangPerOrang).toLocaleString('id-ID');
                
                // Update info
                const uangHelper = distribusiUangDiv.querySelector('p.mt-1.text-sm.text-gray-500');
                if (uangHelper) {
                    uangHelper.innerHTML = `
                        Maksimal: Rp ${number_format(danaTersedia, 0, ',', '.')} | 
                        Total kategori (${persentaseHak}%): Rp ${Math.round(totalUangKategori).toLocaleString('id-ID')} | 
                        Per orang: Rp ${Math.round(uangPerOrang).toLocaleString('id-ID')} × ${jumlahOrangKategori} orang
                    `;
                }
            } 
            else if (jenisDistribusi === 'beras') {
                // 2. Untuk beras saja
                const totalBerasKategori = berasTersedia * (persentaseHak / 100);
                
                // Pastikan pembagian per orang benar
                const berasPerOrang = jumlahOrangKategori > 0 ? totalBerasKategori / jumlahOrangKategori : totalBerasKategori;
                
                console.log("Total beras kategori:", totalBerasKategori);
                console.log("Beras per orang:", berasPerOrang);
                
                // Set nilai ke input - pastikan ini adalah nilai per orang
                jumlahBerasInput.value = berasPerOrang.toFixed(1);
                
                // Update info
                const berasHelper = distribusiBerasDiv.querySelector('p.mt-1.text-sm.text-gray-500');
                if (berasHelper) {
                    berasHelper.innerHTML = `
                        Maksimal: ${number_format(berasTersedia, 1, ',', '.')} kg | 
                        Total kategori (${persentaseHak}%): ${totalBerasKategori.toFixed(1)} kg | 
                        Per orang: ${berasPerOrang.toFixed(1)} kg × ${jumlahOrangKategori} orang
                    `;
                }
            }
            else if (jenisDistribusi === 'kombinasi') {
                // 3. Untuk kombinasi (uang dan beras)
                // Gunakan persentase dari slider
                
                // Hitung total untuk kategori dengan persentase masing-masing
                const totalUangKategori = danaTersedia * (persentaseHak / 100) * (persenUangDalamKategori / 100);
                const totalBerasKategori = berasTersedia * (persentaseHak / 100) * (persenBerasDalamKategori / 100);
                
                // Hitung per orang - pastikan pembagian benar
                const uangPerOrang = jumlahOrangKategori > 0 ? totalUangKategori / jumlahOrangKategori : totalUangKategori;
                const berasPerOrang = jumlahOrangKategori > 0 ? totalBerasKategori / jumlahOrangKategori : totalBerasKategori;
                
                console.log("Total uang kategori kombinasi:", totalUangKategori);
                console.log("Total beras kategori kombinasi:", totalBerasKategori);
                console.log("Uang per orang kombinasi:", uangPerOrang);
                console.log("Beras per orang kombinasi:", berasPerOrang);
                
                // Set nilai ke input - pastikan ini adalah nilai per orang
                jumlahUangInput.value = Math.round(uangPerOrang).toLocaleString('id-ID');
                jumlahBerasInput.value = berasPerOrang.toFixed(1);
                
                // Update info
                const uangHelper = distribusiUangDiv.querySelector('p.mt-1.text-sm.text-gray-500');
                if (uangHelper) {
                    uangHelper.innerHTML = `
                        Maksimal: Rp ${number_format(danaTersedia, 0, ',', '.')} | 
                        Total uang (${persentaseHak}% × ${persenUangDalamKategori}%): Rp ${Math.round(totalUangKategori).toLocaleString('id-ID')} | 
                        Per orang: Rp ${Math.round(uangPerOrang).toLocaleString('id-ID')} × ${jumlahOrangKategori} orang
                    `;
                }
                
                const berasHelper = distribusiBerasDiv.querySelector('p.mt-1.text-sm.text-gray-500');
                if (berasHelper) {
                    berasHelper.innerHTML = `
                        Maksimal: ${number_format(berasTersedia, 1, ',', '.')} kg | 
                        Total beras (${persentaseHak}% × ${persenBerasDalamKategori}%): ${totalBerasKategori.toFixed(1)} kg | 
                        Per orang: ${berasPerOrang.toFixed(1)} kg × ${jumlahOrangKategori} orang
                    `;
                }
            }
        }
        
        // Format number helper function
        function number_format(number, decimals, dec_point, thousands_sep) {
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function (n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }
        
        // Reset nilai jumlah distribusi
        function resetJumlahDistribusi() {
            jumlahUangInput.value = '';
            jumlahBerasInput.value = '';
            
            // Reset teks bantuan
            const uangHelper = distribusiUangDiv.querySelector('p.mt-1.text-sm.text-gray-500');
            if (uangHelper) {
                uangHelper.innerHTML = `Maksimal: Rp ${number_format(danaTersedia, 0, ',', '.')}`;
            }
            
            const berasHelper = distribusiBerasDiv.querySelector('p.mt-1.text-sm.text-gray-500');
            if (berasHelper) {
                berasHelper.innerHTML = `Maksimal: ${number_format(berasTersedia, 1, ',', '.')} kg`;
            }
        }
        
        // Format input uang dengan separator ribuan
        jumlahUangInput.addEventListener('input', function(e) {
            // Hapus semua karakter non-digit
            let value = this.value.replace(/\D/g, '');
            
            // Format dengan separator ribuan
            if (value) {
                value = parseInt(value, 10).toLocaleString('id-ID');
            }
            
            this.value = value;
        });
        
        // Toggle fields based on selected distribution type
        jenisDistribusiRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                const value = this.value;
                const sliderDiv = document.getElementById('kombinasi-slider');
                
                if (value === 'uang') {
                    distribusiUangDiv.classList.remove('hidden');
                    distribusiBerasDiv.classList.add('hidden');
                    if (sliderDiv) sliderDiv.classList.add('hidden');
                    jumlahUangInput.setAttribute('required', '');
                    jumlahBerasInput.removeAttribute('required');
                    
                    // Show/hide required asterisk
                    document.querySelectorAll('#distribusi-uang .jumlah-required').forEach(el => el.classList.remove('hidden'));
                    document.querySelectorAll('#distribusi-beras .jumlah-required').forEach(el => el.classList.add('hidden'));
                    
                } else if (value === 'beras') {
                    distribusiUangDiv.classList.add('hidden');
                    distribusiBerasDiv.classList.remove('hidden');
                    if (sliderDiv) sliderDiv.classList.add('hidden');
                    jumlahUangInput.removeAttribute('required');
                    jumlahBerasInput.setAttribute('required', '');
                    
                    // Show/hide required asterisk
                    document.querySelectorAll('#distribusi-uang .jumlah-required').forEach(el => el.classList.add('hidden'));
                    document.querySelectorAll('#distribusi-beras .jumlah-required').forEach(el => el.classList.remove('hidden'));
                    
                } else if (value === 'kombinasi') {
                    distribusiUangDiv.classList.remove('hidden');
                    distribusiBerasDiv.classList.remove('hidden');
                    if (sliderDiv) sliderDiv.classList.remove('hidden');
                    jumlahUangInput.setAttribute('required', '');
                    jumlahBerasInput.setAttribute('required', '');
                    
                    // Show all required asterisks
                    document.querySelectorAll('#distribusi-uang .jumlah-required').forEach(el => el.classList.remove('hidden'));
                    document.querySelectorAll('#distribusi-beras .jumlah-required').forEach(el => el.classList.remove('hidden'));
                }
                
                // Recalculate distribution amount when distribution type changes
                if (kategoriSelect.value) {
                    hitungDistribusi();
                }
            });
        });
        
        // Initialize based on preselected option (for validation errors)
        const selectedRadio = document.querySelector('input[name="jenis_distribusi"]:checked');
        if (selectedRadio) {
            selectedRadio.dispatchEvent(new Event('change'));
        }
        
        // Inisialisasi nilai hak berdasarkan kategori jika sudah dipilih
        if (kategoriSelect.value) {
            kategoriSelect.dispatchEvent(new Event('change'));
        }
    });

    // Autocomplete untuk nama mustahik
    $(function() {
        console.log("Inisialisasi autocomplete...");
        
        $("#nama_mustahik").autocomplete({
            source: function(request, response) {
                console.log("Mencari mustahik:", request.term);
                
                $.ajax({
                    url: "{{ route('mustahik.search') }}",
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    beforeSend: function() {
                        console.log("Mengirim request ke server...");
                    },
                    success: function(data) {
                        console.log("Data mustahik diterima:", data);
                        if (data.length === 0) {
                            console.log("Tidak ada data mustahik yang cocok");
                        }
                        response(data);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error saat pencarian:", error);
                        console.error("Status:", status);
                        console.error("Response:", xhr.responseText);
                        alert("Terjadi kesalahan saat mencari data mustahik: " + error);
                        response([]);
                    }
                });
            },
            minLength: 2,
            select: function(event, ui) {
                console.log("Mustahik dipilih:", ui.item);
                
                // Cek apakah mustahik sudah menerima distribusi
                if (ui.item.status_distribusi) {
                    alert("Mustahik " + ui.item.value + " sudah menerima distribusi zakat.");
                    return false;
                }
                
                // Set nilai ke form
                $("#nama_mustahik").val(ui.item.value);
                $("#id_mustahik").val(ui.item.id);
                $("#kategori").val(ui.item.kategori);
                
                // Isi data lain jika tersedia
                if (ui.item.alamat) {
                    $("#alamat").val(ui.item.alamat);
                }
                
                if (ui.item.nik) {
                    $("#nik").val(ui.item.nik);
                }
                
                // Isi persentase hak jika tersedia dari data, jika tidak gunakan dari kategori
                if (ui.item.hak) {
                    $("#hak").val(ui.item.hak);
                }
                
                // Trigger event change pada kategori untuk mengisi hak dan menghitung distribusi
                $("#kategori").trigger('change');
                
                return false;
            }
        }).autocomplete("instance")._renderItem = function(ul, item) {
            // Tampilan yang berbeda untuk mustahik yang sudah menerima distribusi
            let itemText = item.value + " - " + item.kategori;
            let $li = $("<li>");
            
            if (item.status_distribusi) {
                // Item dengan background abu-abu dan teks dicoret jika sudah menerima distribusi
                $li.append("<div class='ui-menu-item-wrapper ui-state-disabled' style='background-color: #f5f5f5; color: #999; text-decoration: line-through;'>" + 
                    itemText + " <span style='color: #e53e3e; font-size: 0.85em;'>(Sudah menerima)</span></div>");
            } else {
                $li.append("<div>" + itemText + "</div>");
            }
            
            return $li.appendTo(ul);
        };
    });
</script>
@endpush