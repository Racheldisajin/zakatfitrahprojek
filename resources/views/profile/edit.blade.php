@extends('layouts.app')

@section('title', 'Edit Profil - Sistem Zakat Fitrah')

@section('content')
<!-- Main Content -->
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Profile Header -->
        <div class="mb-10 text-center sm:text-left">
            <h1 class="text-3xl font-bold text-secondary-dark">Pengaturan Profil</h1>
            <p class="mt-2 text-secondary-DEFAULT">Kelola informasi profil dan keamanan akun Anda</p>
        </div>

        <!-- Profile Settings -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-custom overflow-hidden sticky top-8">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex flex-col items-center text-center">
                            <div class="h-20 w-20 rounded-full bg-blue-500 flex items-center justify-center text-white text-2xl font-bold mb-4">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <h2 class="text-lg font-semibold text-secondary-dark">{{ Auth::user()->name }}</h2>
                            <p class="text-secondary-DEFAULT text-sm mt-1">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <div class="p-4">
                        <nav class="space-y-2">
                            <a href="#profile-info" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg bg-primary-light text-primary-DEFAULT hover:bg-primary-light transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Informasi Profil
                            </a>
                            <a href="#update-password" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg text-secondary-DEFAULT hover:bg-primary-light hover:text-primary-DEFAULT transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                Ubah Kata Sandi
                            </a>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:col-span-3">
                <!-- Profile Information -->
                <div id="profile-info" class="bg-white rounded-xl shadow-custom overflow-hidden mb-8">
                    <div class="p-6 bg-primary-DEFAULT">
                        <h2 class="text-xl font-bold text-black flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Informasi Profil
                        </h2>
                    </div>
                    <div class="p-8">
                        @if (session('status') === 'profile-updated')
                            <div class="bg-accent-light border-l-4 border-accent-DEFAULT p-4 mb-6 rounded">
                                <p class="text-sm text-accent-DEFAULT">
                                    Profil berhasil diperbarui.
                                </p>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-secondary-DEFAULT mb-2">Nama</label>
                                    <input id="name" name="name" type="text" value="{{ old('name', Auth::user()->name) }}" required
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-primary-DEFAULT transition duration-150 @error('name') border-red-500 @enderror">
                                    @error('name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-secondary-DEFAULT mb-2">Email</label>
                                    <input id="email" name="email" type="email" value="{{ old('email', Auth::user()->email) }}" required
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-primary-DEFAULT transition duration-150 @error('email') border-red-500 @enderror">
                                    @error('email')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="pt-4">
                                <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent rounded-lg text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 font-medium shadow-md transition duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7" />
                                    </svg>
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Update Password -->
                <div id="update-password" class="bg-white rounded-xl shadow-custom overflow-hidden">
                    <div class="p-6 bg-primary-DEFAULT">
                        <h2 class="text-xl font-bold text-black flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            Ubah Kata Sandi
                        </h2>
                    </div>
                    <div class="p-8">
                        @if (session('status') === 'password-updated')
                            <div class="bg-accent-light border-l-4 border-accent-DEFAULT p-4 mb-6 rounded">
                                <p class="text-sm text-accent-DEFAULT">
                                    Kata sandi berhasil diperbarui.
                                </p>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <div>
                                <label for="current_password" class="block text-sm font-medium text-secondary-DEFAULT mb-2">Kata Sandi Saat Ini</label>
                                <input id="current_password" name="current_password" type="password" required
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-primary-DEFAULT transition duration-150 @error('current_password') border-red-500 @enderror">
                                @error('current_password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="password" class="block text-sm font-medium text-secondary-DEFAULT mb-2">Kata Sandi Baru</label>
                                    <input id="password" name="password" type="password" required
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-primary-DEFAULT transition duration-150 @error('password') border-red-500 @enderror">
                                    @error('password')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="password_confirmation" class="block text-sm font-medium text-secondary-DEFAULT mb-2">Konfirmasi Kata Sandi</label>
                                    <input id="password_confirmation" name="password_confirmation" type="password" required
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-DEFAULT focus:border-primary-DEFAULT transition duration-150">
                                </div>
                            </div>

                            <div class="pt-4">
                                <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent rounded-lg text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 font-medium shadow-md transition duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    Perbarui Kata Sandi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Perbaikan untuk sidebar navigation
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll untuk link di sidebar
    const sidebarLinks = document.querySelectorAll('.lg\\:col-span-1 nav a');
    sidebarLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 20,
                    behavior: 'smooth'
                });
                
                // Update active state
                sidebarLinks.forEach(link => {
                    link.classList.remove('bg-primary-light', 'text-primary-DEFAULT');
                    link.classList.add('text-secondary-DEFAULT');
                });
                this.classList.remove('text-secondary-DEFAULT');
                this.classList.add('bg-primary-light', 'text-primary-DEFAULT');
            }
        });
    });
    
    // Untuk navbar utama (opsional)
    const mainNavLinks = document.querySelectorAll('.navbar-main a');
    mainNavLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Jika ini adalah link href biasa, biarkan default behavior
            // Jika ada kebutuhan khusus, tambahkan logic di sini
        });
    });
});
</script>
@endpush
@endsection