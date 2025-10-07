@extends('layouts.app')

@section('title', 'Catat Pembayaran Zakat - Sistem Zakat Fitrah')

@section('content')
<!-- Main Content -->
<div class="py-12 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header dengan styling yang ditingkatkan -->
        <div class="mb-8 flex flex-col md:flex-row md:justify-between md:items-center">
            <div class="mb-4 md:mb-0">
                <h1 class="text-3xl font-bold text-secondary-dark">
                    <span class="inline-block border-b-4 border-primary-DEFAULT pb-1">Catat Pembayaran Zakat</span>
                </h1>
                <p class="mt-2 text-secondary-DEFAULT text-opacity-80">Rekam transaksi pembayaran zakat fitrah baru</p>
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
                <p class="text-sm text-gray-500">Isi formulir berikut dengan data yang lengkap dan valid</p>
            </div>

            <!-- Form Content -->
            <div class="p-6">
                <form action="{{ route('bayarzakat.store') }}" method="POST" x-data="{ jenisBayar: 'uang' }" class="space-y-8">
                    @csrf
                    
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
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-10">
                        <!-- Form Section 1: Data Muzakki -->
                        <div class="space-y-8">
                            <div>
                                <label for="nama_kk" class="block text-sm font-medium text-secondary-DEFAULT mb-2">
                                    Nama Kepala Keluarga <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" name="nama_kk" id="nama_kk" value="{{ old('nama_kk') }}" 
                                        class="pl-10 block w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-transparent transition duration-200" 
                                        placeholder="Masukkan nama kepala keluarga" required>
                                    <input type="hidden" name="id_muzakki" id="id_muzakki" value="{{ old('id_muzakki') }}">
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Ketik minimal 2 karakter untuk pencarian otomatis</p>
                            </div>

                            <div class="mt-6">
                                <label for="jumlah_tanggungan" class="block text-sm font-medium text-secondary-DEFAULT mb-2">
                                    Jumlah Tanggungan <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                        </svg>
                                    </div>
                                    <input type="number" name="jumlah_tanggungan" id="jumlah_tanggungan" value="{{ old('jumlah_tanggungan', 1) }}" min="1" 
                                        class="pl-10 block w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-transparent transition duration-200" 
                                        required readonly>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Terisi otomatis berdasarkan data muzakki</p>
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
                                        <input type="radio" name="jenis_bayar" value="uang" x-model="jenisBayar" class="h-5 w-5 text-blue-600 focus:ring-blue-500" {{ old('jenis_bayar', 'uang') == 'uang' ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">Uang</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="jenis_bayar" value="beras" x-model="jenisBayar" class="h-5 w-5 text-blue-600 focus:ring-blue-500" {{ old('jenis_bayar') == 'beras' ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">Beras</span>
                                    </label>
                                </div>
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
                                    <input type="number" name="bayar_uang" id="bayar_uang" value="{{ old('bayar_uang') }}" 
                                        class="pl-10 block w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-transparent transition duration-200" 
                                        placeholder="Masukkan jumlah dalam Rupiah">
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Contoh: 50000 untuk Rp 50.000</p>
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
                                    <input type="number" name="bayar_beras" id="bayar_beras" value="{{ old('bayar_beras') }}" step="0.1" 
                                        class="pl-10 block w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-transparent transition duration-200" 
                                        placeholder="Masukkan jumlah dalam kilogram">
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Contoh: 2.5 untuk 2,5 kg</p>
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
                        <button type="button" id="btnSimpan" class="w-full sm:w-auto px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-300 shadow-md flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Simpan Data
                        </button>
                        <a href="{{ route('bayarzakat.index') }}" class="w-full sm:w-auto px-6 py-3 bg-gray-100 hover:bg-gray-200 text-secondary-DEFAULT font-medium rounded-lg transition duration-300 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            Batal
                        </a>
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
                        Ketik nama muzakki dan sistem akan otomatis mengisi jumlah tanggungan. Pilih jenis pembayaran dan masukkan jumlah yang dibayarkan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Simpan -->
<div class="fixed inset-0 z-50 overflow-y-auto hidden" id="modalKonfirmasi" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" id="modalBackground"></div>

        <!-- Modal Panel -->
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all w-full max-w-md mx-auto z-10">
            <!-- Ikon di bagian atas -->
            <div class="flex justify-center pt-6">
                <div class="h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center">
                    <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            
            <!-- Judul Modal -->
            <div class="text-center px-4 pt-4">
                <h3 class="text-lg font-medium text-gray-900">
                    Konfirmasi Pembayaran Zakat
                </h3>
            </div>
            
            <!-- Isi Modal -->
            <div class="px-4 pt-3 pb-6">
                <!-- Pesan konfirmasi -->
                <p class="text-center text-sm text-gray-600 mb-4">
                    Anda akan menyimpan data pembayaran zakat:
                </p>
                <p class="text-center font-medium text-gray-800 text-lg mb-5" id="konfirmasiNama">
                    -
                </p>
                
                <!-- Info box -->
                <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1v-3a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-blue-700">
                                Pastikan data yang Anda masukkan sudah benar.
                                Perubahan akan disimpan ke dalam sistem.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Detail pembayaran dengan style tabel -->
                <div class="mb-5">
                    <div class="flex justify-between py-2">
                        <span class="text-sm text-gray-500">Jumlah Tanggungan:</span>
                        <span class="text-sm font-medium text-gray-800" id="konfirmasiJumlah">-</span>
                    </div>
                    <div class="flex justify-between py-2">
                        <span class="text-sm text-gray-500">Jenis Pembayaran:</span>
                        <span class="text-sm font-medium text-gray-800" id="konfirmasiJenis">-</span>
                    </div>
                    <div class="flex justify-between py-2">
                        <span class="text-sm text-gray-500">Total Pembayaran:</span>
                        <span class="text-sm font-medium text-gray-800" id="konfirmasiTotal">-</span>
                    </div>
                </div>
                
                <!-- Pertanyaan konfirmasi -->
                <p class="text-center text-sm text-gray-600 mb-4">
                    Apakah Anda yakin ingin melanjutkan?
                </p>
                
                <!-- Tombol aksi -->
                <div class="flex justify-center space-x-3">
                    <button type="button" id="btnBatalKonfirmasi" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Batal
                    </button>
                    <button type="button" id="btnKonfirmasi" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Data
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    // Autocomplete untuk nama muzakki
    $(function() {
        // Fungsi untuk menghitung jumlah pembayaran berdasarkan jumlah tanggungan
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
            $("#bayar_uang").val(totalUang);
            $("#bayar_beras").val(totalBeras);
        }
        
        $("#nama_kk").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('muzakki.search') }}",
                    dataType: "json",
                    data: {
                        term: request.term,
                        check_payment: true, // Parameter untuk memeriksa sudah bayar atau belum
                        period: "{{ date('Y') }}" // Periode/tahun berjalan
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            minLength: 2,
            select: function(event, ui) {
                // Cek apakah muzakki sudah bayar
                if (ui.item.status_bayar) {
                    alert("Muzakki " + ui.item.value + " sudah melakukan pembayaran zakat untuk periode ini.");
                    return false;
                }
                
                $("#nama_kk").val(ui.item.value);
                $("#id_muzakki").val(ui.item.id);
                $("#jumlah_tanggungan").val(ui.item.jumlah_tanggungan);
                
                // Hitung pembayaran berdasarkan jumlah tanggungan
                hitungPembayaran(ui.item.jumlah_tanggungan);
                
                return false;
            }
        }).autocomplete("instance")._renderItem = function(ul, item) {
            // Tampilan yang berbeda untuk muzakki yang sudah membayar
            let itemText = item.value + " - " + item.jumlah_tanggungan + " orang";
            let $li = $("<li>");
            
            if (item.status_bayar) {
                // Item dengan background merah muda jika sudah bayar
                $li.append("<div class='ui-menu-item-wrapper ui-state-disabled' style='background-color: #ffeeee; color: #999; text-decoration: line-through;'>" + 
                    itemText + " <span style='color: #e53e3e; font-size: 0.85em;'>(Sudah bayar)</span></div>");
            } else {
                $li.append("<div>" + itemText + "</div>");
            }
            
            return $li.appendTo(ul);
        };
        
        // Jika jumlah tanggungan berubah, hitung ulang pembayaran
        $("#jumlah_tanggungan").on('change', function() {
            hitungPembayaran($(this).val());
        });
        
        // Inisialisasi perhitungan jika jumlah tanggungan sudah ada
        if ($("#jumlah_tanggungan").val()) {
            hitungPembayaran($("#jumlah_tanggungan").val());
        }
        
        // Fungsi untuk format uang ke Rupiah
        function formatRupiah(angka) {
            return 'Rp ' + new Intl.NumberFormat('id-ID').format(angka);
        }
        
        // Fungsi untuk menampilkan modal konfirmasi
        $("#btnSimpan").on('click', function() {
            // Ambil data form
            const nama = $("#nama_kk").val();
            const jumlahTanggungan = $("#jumlah_tanggungan").val();
            const jenisBayar = $("input[name='jenis_bayar']:checked").val();
            
            // Validasi data
            if (!nama || !jumlahTanggungan) {
                alert("Mohon lengkapi data terlebih dahulu");
                return;
            }
            
            // Cek muzakki sudah bayar atau belum
            if (!$("#id_muzakki").val()) {
                alert("Silakan pilih nama muzakki yang valid dari daftar pencarian");
                return;
            }
            
            // Isi data konfirmasi
            $("#konfirmasiNama").text(nama);
            $("#konfirmasiJumlah").text(jumlahTanggungan + " orang");
            
            let totalPembayaran = "";
            if (jenisBayar === "uang") {
                $("#konfirmasiJenis").text("Uang");
                const bayarUang = $("#bayar_uang").val();
                totalPembayaran = formatRupiah(bayarUang);
            } else {
                $("#konfirmasiJenis").text("Beras");
                const bayarBeras = $("#bayar_beras").val();
                totalPembayaran = bayarBeras + " kg";
            }
            $("#konfirmasiTotal").text(totalPembayaran);
            
            // Tampilkan modal
            $("#modalKonfirmasi").removeClass("hidden");
        });
        
        // Tutup modal saat klik background atau tombol batal
        $("#modalBackground, #btnBatalKonfirmasi").on('click', function() {
            $("#modalKonfirmasi").addClass("hidden");
        });
        
        // Aksi jika konfirmasi
        $("#btnKonfirmasi").on('click', function() {
            // Submit form
            $("form").submit();
        });
    });
</script>
@endpush 