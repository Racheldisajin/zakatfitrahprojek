@extends('layouts.app')

@section('title', 'Edit Distribusi Zakat - Sistem Zakat Fitrah')

@section('content')
<!-- Main Content -->
<div class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-secondary-dark">Edit Distribusi Zakat</h1>
                <p class="mt-2 text-secondary-DEFAULT">Perbarui data distribusi zakat</p>
            </div>
            <div>
                <a href="{{ route('distribusi.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-secondary-DEFAULT font-medium rounded-lg transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <!-- Alert untuk errors atau notifikasi -->
        @if($errors->any())
        <div class="mb-6">
            <div class="bg-red-50 border-l-4 border-red-500 text-red-800 p-4 rounded-lg" role="alert">
                <div class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <p class="font-medium">Terdapat beberapa kesalahan:</p>
                        <ul class="mt-1 ml-5 list-disc">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="mb-6">
            <div class="bg-red-50 border-l-4 border-red-500 text-red-800 p-4 rounded-lg" role="alert">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        </div>
        @endif

        <!-- Status Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <!-- Dana Tersedia -->
            <div class="bg-white rounded-xl shadow-custom p-6 border-l-4 border-green-500">
                <div class="flex items-center">
                    <div class="bg-green-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-gray-700">Dana Tersedia</h2>
                        <p class="text-3xl font-bold text-green-500">
                            Rp {{ number_format($danaTersedia, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Beras Tersedia -->
            <div class="bg-white rounded-xl shadow-custom p-6 border-l-4 border-indigo-500">
                <div class="flex items-center">
                    <div class="bg-indigo-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-gray-700">Beras Tersedia</h2>
                        <p class="text-3xl font-bold text-indigo-500">
                            {{ number_format($berasTersedia, 1, ',', '.') }} kg
                        </p>
                    </div>
                </div>
            </div>

            <!-- Total Kategori Mustahik -->
            <div class="bg-white rounded-xl shadow-custom p-6 border-l-4 border-amber-500">
                <div class="flex items-center">
                    <div class="bg-amber-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-gray-700">Total Kategori</h2>
                        <p class="text-3xl font-bold text-amber-500">
                            {{ count($kategoriMustahik) }} kategori
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-custom overflow-hidden">
            <div class="p-6">
                <form action="{{ route('distribusi.update', $distribusi->id_distribusi) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Kolom Kiri -->
                        <div>
                            <h2 class="text-lg font-medium text-secondary-dark mb-4">Informasi Mustahik</h2>
                            
                            <!-- Nama Mustahik -->
                            <div class="mb-4">
                                <label for="nama_mustahik" class="block text-sm font-medium text-secondary-DEFAULT mb-1">Nama Mustahik <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_mustahik" id="nama_mustahik" value="{{ old('nama_mustahik', $distribusi->nama_mustahik) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
                            </div>
                            
                            <!-- Kategori -->
                            <div class="mb-4">
                                <label for="kategori" class="block text-sm font-medium text-secondary-DEFAULT mb-1">Kategori <span class="text-red-500">*</span></label>
                                <select name="kategori" id="kategori" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
                                    <option value="">Pilih Kategori...</option>
                                    @foreach($kategoriMustahik as $kategori)
                                    <option value="{{ $kategori->nama_kategori }}" data-hak="{{ $kategori->jumlah_hak ?? 0 }}" data-jumlah="{{ $jumlahOrangPerKategori[$kategori->nama_kategori] ?? 1 }}" {{ old('kategori', $distribusi->kategori) == $kategori->nama_kategori ? 'selected' : '' }}>
                                        {{ $kategori->nama_kategori }} ({{ $kategori->jumlah_hak ?? 0 }}%)
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <!-- Alamat -->
                            <div class="mb-4">
                                <label for="alamat" class="block text-sm font-medium text-secondary-DEFAULT mb-1">Alamat</label>
                                <textarea name="alamat" id="alamat" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">{{ old('alamat', $distribusi->alamat) }}</textarea>
                            </div>
                            
                            <!-- Kontak/No HP -->
                            <div class="mb-4">
                                <label for="kontak" class="block text-sm font-medium text-secondary-DEFAULT mb-1">Kontak/No. HP</label>
                                <input type="text" name="kontak" id="kontak" value="{{ old('kontak', $distribusi->kontak) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            </div>
                        </div>
                        
                        <!-- Kolom Kanan -->
                        <div>
                            <h2 class="text-lg font-medium text-secondary-dark mb-4">Detail Distribusi</h2>
                            
                            <!-- Jenis Distribusi -->
                            <div class="mb-4">
                                <label for="jenis_distribusi" class="block text-sm font-medium text-secondary-DEFAULT mb-1">Jenis Distribusi <span class="text-red-500">*</span></label>
                                <div class="flex space-x-4">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="jenis_distribusi" value="uang" {{ old('jenis_distribusi', $distribusi->jenis_distribusi) == 'uang' ? 'checked' : '' }} class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                                        <span class="ml-2">Uang Tunai</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="jenis_distribusi" value="beras" {{ old('jenis_distribusi', $distribusi->jenis_distribusi) == 'beras' ? 'checked' : '' }} class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                                        <span class="ml-2">Beras</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="jenis_distribusi" value="kombinasi" {{ old('jenis_distribusi', $distribusi->jenis_distribusi) == 'kombinasi' ? 'checked' : '' }} class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                                        <span class="ml-2">Kombinasi</span>
                                    </label>
                                </div>
                            </div>
                            
                            <!-- Jumlah Uang -->
                            <div id="uang-section" class="mb-4" style="{{ in_array(old('jenis_distribusi', $distribusi->jenis_distribusi), ['uang', 'kombinasi']) ? '' : 'display: none;' }}">
                                <label for="jumlah_uang" class="block text-sm font-medium text-secondary-DEFAULT mb-1">Jumlah Uang <span class="text-red-500">*</span></label>
                                <div class="flex">
                                    <span class="inline-flex items-center px-3 text-gray-500 bg-gray-100 rounded-l-lg border border-r-0 border-gray-300">
                                        Rp
                                    </span>
                                    <input type="text" name="jumlah_uang" id="jumlah_uang" value="{{ old('jumlah_uang', number_format($distribusi->jumlah_uang, 0, ',', '.')) }}" class="w-full px-4 py-2 border border-gray-300 rounded-r-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" {{ in_array(old('jenis_distribusi', $distribusi->jenis_distribusi), ['uang', 'kombinasi']) ? 'required' : '' }}>
                                </div>
                                <p class="mt-1 text-sm text-gray-500">Sisa dana tersedia: Rp {{ number_format($danaTersedia, 0, ',', '.') }}</p>
                            </div>
                            
                            <!-- Jumlah Beras -->
                            <div id="beras-section" class="mb-4" style="{{ in_array(old('jenis_distribusi', $distribusi->jenis_distribusi), ['beras', 'kombinasi']) ? '' : 'display: none;' }}">
                                <label for="jumlah_beras" class="block text-sm font-medium text-secondary-DEFAULT mb-1">Jumlah Beras <span class="text-red-500">*</span></label>
                                <div class="flex">
                                    <input type="number" name="jumlah_beras" id="jumlah_beras" step="0.1" min="0" value="{{ old('jumlah_beras', $distribusi->jumlah_beras) }}" class="w-full px-4 py-2 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" {{ in_array(old('jenis_distribusi', $distribusi->jenis_distribusi), ['beras', 'kombinasi']) ? 'required' : '' }}>
                                    <span class="inline-flex items-center px-3 text-gray-500 bg-gray-100 rounded-r-lg border border-l-0 border-gray-300">
                                        kg
                                    </span>
                                </div>
                                <p class="mt-1 text-sm text-gray-500">Sisa beras tersedia: {{ number_format($berasTersedia, 1, ',', '.') }} kg</p>
                            </div>
                            
                            <!-- Tanggal Distribusi -->
                            <div class="mb-4">
                                <label for="tanggal" class="block text-sm font-medium text-secondary-DEFAULT mb-1">Tanggal Distribusi <span class="text-red-500">*</span></label>
                                <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $distribusi->tanggal) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
                            </div>
                            
                            <!-- Keterangan -->
                            <div class="mb-4">
                                <label for="keterangan" class="block text-sm font-medium text-secondary-DEFAULT mb-1">Keterangan Tambahan</label>
                                <textarea name="keterangan" id="keterangan" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">{{ old('keterangan', $distribusi->keterangan) }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tombol Submit & Cancel -->
                    <div class="mt-8 border-t border-gray-200 pt-6 flex justify-end space-x-3">
                        <a href="{{ route('distribusi.index') }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-secondary-DEFAULT font-medium rounded-lg transition duration-300">
                            Batal
                        </a>
                        <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-300 shadow-md">
                            Simpan Perubahan
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
<style>
    /* Styling untuk slider */
    #slider-kombinasi {
        -webkit-appearance: none;
        height: 10px;
        background: #edf2f7;
        border-radius: 5px;
        outline: none;
    }
    
    #slider-kombinasi::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 20px;
        height: 20px;
        background: #3182ce;
        border-radius: 50%;
        cursor: pointer;
    }
    
    #slider-kombinasi::-moz-range-thumb {
        width: 20px;
        height: 20px;
        background: #3182ce;
        border-radius: 50%;
        cursor: pointer;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Format rupiah untuk input uang
        const rupiahInput = document.getElementById('jumlah_uang');
        if (rupiahInput) {
            rupiahInput.addEventListener('keyup', function(e) {
                // Skip for arrow keys, delete, etc.
                if ([38, 40, 37, 39, 8, 46].indexOf(e.keyCode) > -1) return;
                
                // Remove non-digits
                let value = this.value.replace(/\D/g, '');
                
                // Format the number
                if (value) {
                    value = parseInt(value, 10).toLocaleString('id-ID');
                }
                
                this.value = value;
            });
        }
        
        // Tampilkan/sembunyikan input sesuai jenis distribusi
        const jenisDistribusiRadios = document.querySelectorAll('input[name="jenis_distribusi"]');
        const uangSection = document.getElementById('uang-section');
        const berasSection = document.getElementById('beras-section');
        const jumlahUangInput = document.getElementById('jumlah_uang');
        const jumlahBerasInput = document.getElementById('jumlah_beras');
        const kategoriSelect = document.getElementById('kategori');
        
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
        kombinasiDiv.classList.add('hidden', 'mt-4', 'mb-6', 'bg-blue-50', 'p-4', 'rounded-lg');
        kombinasiDiv.id = 'kombinasi-slider';
        kombinasiDiv.innerHTML = `
            <div class="flex flex-col">
                <label class="block font-medium text-sm text-gray-700 mb-2">Persentase Pembagian:</label>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-blue-700">Beras: <span id="persen-beras">50</span>%</span>
                    <input type="range" id="slider-kombinasi" min="0" max="100" value="50" class="w-full mx-4 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                    <span class="text-sm font-medium text-green-700">Uang: <span id="persen-uang">50</span>%</span>
                </div>
            </div>
        `;
        
        // Tambahkan slider setelah pilihan jenis distribusi
        const radioInputs = document.querySelectorAll('input[name="jenis_distribusi"]');
        if (radioInputs.length > 0) {
            // Cari parent div dari input radio (naik 2 level)
            const distribusiDiv = radioInputs[0].closest('div').closest('div');
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
        }
        
        // Tambahkan info jumlah orang di bawah dropdown kategori
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
                jumlahOrangKategori = jumlahOrangPerKategori[selectedOption.value] || 1;
                
                // Tampilkan info jumlah orang
                const infoJumlahOrang = document.getElementById('info-jumlah-orang');
                if (infoJumlahOrang) {
                    infoJumlahOrang.textContent = `Terdapat ${jumlahOrangKategori} orang dalam kategori ${selectedOption.value}`;
                    infoJumlahOrang.style.display = 'block';
                }
                
                // Hitung distribusi
                hitungDistribusi();
            } else {
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
            // Persentase hak sesuai kategori
            const selectedOption = kategoriSelect.options[kategoriSelect.selectedIndex];
            const persentaseHak = parseInt(selectedOption.dataset.hak) || 0;
            
            // Ambil jenis distribusi yang dipilih
            const jenisDistribusi = document.querySelector('input[name="jenis_distribusi"]:checked')?.value;
            if (!jenisDistribusi) return;
            
            // Pastikan jumlahOrangKategori selalu valid dan minimal 1
            jumlahOrangKategori = parseInt(selectedOption.dataset.jumlah) || 1;
            
            console.log("Hitung distribusi:", {
                kategori: selectedOption.value,
                persentaseHak: persentaseHak,
                jumlahOrang: jumlahOrangKategori,
                danaTersedia: danaTersedia,
                berasTersedia: berasTersedia
            });
            
            // Sesuai dengan 3 rumus yang diminta
            if (jenisDistribusi === 'uang') {
                // 1. Untuk uang saja
                const totalUangKategori = danaTersedia * (persentaseHak / 100);
                
                // Pastikan pembagian per orang benar
                const uangPerOrang = jumlahOrangKategori > 0 ? totalUangKategori / jumlahOrangKategori : totalUangKategori;
                
                // Set nilai ke input - pastikan ini adalah nilai per orang
                jumlahUangInput.value = Math.round(uangPerOrang).toLocaleString('id-ID');
                
                // Update info
                const uangHelper = uangSection.querySelector('p.mt-1.text-sm');
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
                
                // Set nilai ke input - pastikan ini adalah nilai per orang
                jumlahBerasInput.value = berasPerOrang.toFixed(1);
                
                // Update info
                const berasHelper = berasSection.querySelector('p.mt-1.text-sm');
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
                
                // Set nilai ke input - pastikan ini adalah nilai per orang
                jumlahUangInput.value = Math.round(uangPerOrang).toLocaleString('id-ID');
                jumlahBerasInput.value = berasPerOrang.toFixed(1);
                
                // Update info
                const uangHelper = uangSection.querySelector('p.mt-1.text-sm');
                if (uangHelper) {
                    uangHelper.innerHTML = `
                        Maksimal: Rp ${number_format(danaTersedia, 0, ',', '.')} | 
                        Total uang (${persentaseHak}% × ${persenUangDalamKategori}%): Rp ${Math.round(totalUangKategori).toLocaleString('id-ID')} | 
                        Per orang: Rp ${Math.round(uangPerOrang).toLocaleString('id-ID')} × ${jumlahOrangKategori} orang
                    `;
                }
                
                const berasHelper = berasSection.querySelector('p.mt-1.text-sm');
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
            const uangHelper = uangSection.querySelector('p.mt-1.text-sm');
            if (uangHelper) {
                uangHelper.innerHTML = `Sisa dana tersedia: Rp {{ number_format($danaTersedia, 0, ',', '.') }}`;
            }
            
            const berasHelper = berasSection.querySelector('p.mt-1.text-sm');
            if (berasHelper) {
                berasHelper.innerHTML = `Sisa beras tersedia: {{ number_format($berasTersedia, 1, ',', '.') }} kg`;
            }
        }
        
        jenisDistribusiRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                const value = this.value;
                const sliderDiv = document.getElementById('kombinasi-slider');
                
                if (value === 'uang') {
                    uangSection.style.display = '';
                    berasSection.style.display = 'none';
                    if (sliderDiv) sliderDiv.classList.add('hidden');
                    jumlahUangInput.setAttribute('required', '');
                    jumlahBerasInput.removeAttribute('required');
                } else if (value === 'beras') {
                    uangSection.style.display = 'none';
                    berasSection.style.display = '';
                    if (sliderDiv) sliderDiv.classList.add('hidden');
                    jumlahUangInput.removeAttribute('required');
                    jumlahBerasInput.setAttribute('required', '');
                } else { // kombinasi
                    uangSection.style.display = '';
                    berasSection.style.display = '';
                    if (sliderDiv) sliderDiv.classList.remove('hidden');
                    jumlahUangInput.setAttribute('required', '');
                    jumlahBerasInput.setAttribute('required', '');
                }
                
                // Recalculate distribution amount when distribution type changes
                if (kategoriSelect.value) {
                    hitungDistribusi();
                }
            });
        });
        
        // Initialize based on preselected option
        const selectedRadio = document.querySelector('input[name="jenis_distribusi"]:checked');
        if (selectedRadio) {
            // Jika kombinasi, tampilkan slider
            if (selectedRadio.value === 'kombinasi') {
                const sliderDiv = document.getElementById('kombinasi-slider');
                if (sliderDiv) {
                    sliderDiv.classList.remove('hidden');
                }
            }
            
            selectedRadio.dispatchEvent(new Event('change'));
        }
        
        // Inisialisasi nilai berdasarkan kategori jika sudah dipilih
        if (kategoriSelect.value) {
            kategoriSelect.dispatchEvent(new Event('change'));
        }
    });
</script>
@endpush
