@extends('layouts.app')

@section('title', 'Dashboard - Sistem Zakat Fitrah')

@section('content')
<!-- Main Content -->
<div class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Dashboard Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-secondary-dark">Dashboard</h1>
            <p class="mt-2 text-secondary-DEFAULT">Selamat datang kembali, {{ Auth::user()->name }}!</p>
        </div>

        <!-- Stats Cards - Baris Atas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-white rounded-xl shadow-custom p-6 border-l-4 border-blue-500">
                <div class="flex items-center">
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-secondary-dark">Total Muzakki</h2>
                        <p class="text-3xl font-bold text-blue-500">{{ $totalMuzakki ?: 0 }}</p>
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
                    <div class="ml-4 flex-1">
                        <h2 class="text-lg font-semibold text-secondary-dark">Dana Terkumpul</h2>
                        <p class="text-2xl font-bold text-green-500">
                            @if($totalUang > 0)
                                Rp {{ number_format($totalUang, 0, ',', '.') }}
                            @else
                                Rp 0
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-custom p-6 border-l-4 border-indigo-500">
                <div class="flex items-center">
                    <div class="bg-indigo-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-secondary-dark">Beras Terkumpul</h2>
                        <p class="text-3xl font-bold text-indigo-500">{{ $totalBeras ?: 0 }} kg</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-custom p-6 border-l-4 border-yellow-500">
                <div class="flex items-center">
                    <div class="bg-yellow-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-secondary-dark">Mustahik</h2>
                        <p class="text-3xl font-bold text-yellow-500">{{ $totalMustahik ?: 0 }}</p>
                    </div>
                </div>
            </div>
        </div>
            
        <!-- Stats Cards - Baris Bawah dengan kartu panjang -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Dana Tersalurkan - Kartu Panjang -->
            <div class="bg-white rounded-xl shadow-custom p-6 border-l-4 border-green-600">
                <div class="flex items-center">
                    <div class="bg-green-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-secondary-dark">Dana Tersalurkan</h2>
                        <p class="text-3xl font-bold text-green-600">
                            Rp {{ number_format($totalDanaTersalurkan ?? 0, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Beras Tersalurkan - Kartu Panjang -->
            <div class="bg-white rounded-xl shadow-custom p-6 border-l-4 border-indigo-600">
                <div class="flex items-center">
                    <div class="bg-indigo-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-secondary-dark">Beras Tersalurkan</h2>
                        <p class="text-3xl font-bold text-indigo-600">
                            {{ number_format($totalBerasTersalurkan ?? 0, 1, ',', '.') }} kg
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Links & Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Quick Links -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-custom overflow-hidden">
                    <div class="p-6 bg-primary-DEFAULT text-dark">
                        <h2 class="text-xl font-bold">Menu Cepat</h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <a href="{{ route('muzakki.create') }}" class="flex items-center p-3 bg-primary-light rounded-lg hover:bg-primary-light/70 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-DEFAULT mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                            <span class="font-medium text-secondary-dark">Tambah Muzakki Baru</span>
                        </a>
                        <a href="{{ route('mustahik.create') }}" class="flex items-center p-3 bg-primary-light rounded-lg hover:bg-primary-light/70 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-DEFAULT mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                            <span class="font-medium text-secondary-dark">Tambah Mustahik Baru</span>
                        </a>
                        <a href="{{ route('bayarzakat.create') }}" class="flex items-center p-3 bg-primary-light rounded-lg hover:bg-primary-light/70 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-DEFAULT mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span class="font-medium text-secondary-dark">Catat Pengumpulan Zakat</span>
                        </a>
                        <a href="{{ route('distribusi.create') }}" class="flex items-center p-3 bg-primary-light rounded-lg hover:bg-primary-light/70 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-DEFAULT mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="font-medium text-secondary-dark">Jadwalkan Distribusi</span>
                        </a>
                        <a href="{{ route('laporan.index') }}" class="flex items-center p-3 bg-primary-light rounded-lg hover:bg-primary-light/70 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-DEFAULT mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <span class="font-medium text-secondary-dark">Buat Laporan</span>
                        </a>
                    </div>
                    <!-- Tombol Unduh Laporan Lengkap di bawah Menu Cepat -->
                    <div class="p-6 pt-0 text-center">
                        <a href="{{ route('laporan.combined.pdf', ['year' => date('Y')]) }}" class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg shadow transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Unduh Laporan Lengkap
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-custom overflow-hidden">
                    <div class="p-6 bg-primary-DEFAULT text-dark">
                        <h2 class="text-xl font-bold">Aktivitas Terbaru</h2>
                    </div>
                    <div class="p-6">
                        <div class="space-y-6">
                            @if(count($recentZakat) > 0)
                                @foreach($recentZakat as $zakat)
                                <div class="flex items-start">
                                    @if($zakat->jenis_bayar == 'uang')
                                    <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center text-green-500 mr-4 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    @else
                                    <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-500 mr-4 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                        </svg>
                                    </div>
                                    @endif
                                    <div>
                                        <p class="text-secondary-dark font-medium">
                                            Pembayaran zakat dari {{ $zakat->nama_kk }} 
                                            @if($zakat->jenis_bayar == 'uang')
                                                sebesar Rp {{ number_format($zakat->bayar_uang, 0, ',', '.') }}
                                            @else
                                                sebanyak {{ $zakat->bayar_beras }} kg beras
                                            @endif
                                        </p>
                                        <p class="text-sm text-secondary-DEFAULT mt-1">{{ $zakat->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class="flex items-start">
                                    <div class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 mr-4 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-secondary-dark font-medium">Belum ada aktivitas pembayaran zakat</p>
                                        <p class="text-sm text-secondary-DEFAULT mt-1">Silakan tambahkan data pembayaran zakat</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="mt-6 text-center">
                            <a href="{{ route('bayarzakat.index') }}" class="inline-flex items-center text-primary-DEFAULT hover:text-primary-dark font-medium transition duration-300">
                                <span>Lihat semua aktivitas</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Alpine.js initialization for dropdown
    document.addEventListener('alpine:init', () => {
        Alpine.data('dropdown', () => ({
            open: false,
            toggle() {
                this.open = !this.open;
            }
        }));
    });
</script>
@endpush 