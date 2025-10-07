<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Zakat Fitrah</title>
    <meta name="description" content="Login ke aplikasi pengelolaan zakat fitrah">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#F0F7FF',
                            100: '#E0EFFF',
                            200: '#B9DCFF',
                            300: '#7CBCFF',
                            400: '#3D9CFF',
                            500: '#0078FF',
                            600: '#0060D6',
                            700: '#004CAD',
                            800: '#003C8A',
                            900: '#002D66',
                        },
                        accent: {
                            50: '#EDFCF6',
                            100: '#D3F8E8',
                            200: '#A8F0D1',
                            300: '#71E3B5',
                            400: '#38CB8F',
                            500: '#10B981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065F46',
                            900: '#064E3B',
                        }
                    },
                    fontFamily: {
                        'display': ['Poppins', 'sans-serif'],
                        'body': ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .gradient-bg {
            background-image: linear-gradient(to bottom right, #1E40AF 0%, #0F172A 100%);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="font-body bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Left Panel - Image and Branding -->
        <div class="hidden lg:flex lg:w-1/2 gradient-bg relative">
            <div class="absolute inset-0 bg-black opacity-20"></div>
            <div class="flex flex-col justify-between relative z-10 w-full">
                <div class="p-8">
                    <div class="flex items-center space-x-3">
                        <div class="bg-white rounded-full p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h1 class="text-2xl font-bold text-white font-display">ZAKAT KAHURIPAN</h1>
                    </div>
                </div>
                
                <div class="p-8 md:p-12 flex flex-col">
                    <div class="bg-white bg-opacity-20 rounded-xl p-6 backdrop-blur-lg text-white mb-8">
                        <h2 class="text-2xl font-semibold mb-3">Bayar Zakat, Sucikan Harta</h2>
                        <p class="text-white text-opacity-90">Zakat Fitrah adalah kewajiban setiap Muslim di bulan Ramadhan. Aplikasi ini membantu Anda mengelola zakat dengan mudah dan transparan.</p>
                    </div>
                    
                    <div class="space-y-8">
                        <div class="flex items-start space-x-4">
                            <div class="bg-white rounded-full p-2 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-white font-semibold mb-1">Aman dan Terpercaya</h3>
                                <p class="text-white text-opacity-80 text-sm">Sistem keamanan modern untuk melindungi data dan donasi Anda</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="bg-white rounded-full p-2 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-white font-semibold mb-1">Cepat dan Efisien</h3>
                                <p class="text-white text-opacity-80 text-sm">Proses zakat Anda dengan cepat tanpa antrean atau kerumitan</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="bg-white rounded-full p-2 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-white font-semibold mb-1">Transparan</h3>
                                <p class="text-white text-opacity-80 text-sm">Pantau pengumpulan dan penyaluran zakat secara transparan</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="p-8">
                    <p class="text-white text-opacity-70 text-sm">© 2025 Zakat Fitrah. Semua hak dilindungi.</p>
                </div>
            </div>
        </div>
        
        <!-- Right Panel - Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-4 md:p-8 lg:p-12">
            <div class="w-full max-w-md">
                <!-- Mobile Logo -->
                <div class="flex justify-center lg:hidden mb-8">
                    <div class="flex items-center space-x-2">
                        <div class="bg-primary-500 rounded-full p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h1 class="text-xl font-bold text-primary-500 font-display">ZAKAT FITRAH</h1>
                    </div>
                </div>
                
                <div class="glass-effect p-8 rounded-2xl shadow-lg border border-gray-100">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-bold text-gray-800 font-display">Selamat Datang Kembali</h2>
                        <p class="text-gray-600 mt-2">Masuk untuk mengakses akun Anda</p>
                    </div>
                    
                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="bg-primary-50 border-l-4 border-primary-500 p-4 mb-6 rounded-lg">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-primary-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-primary-700">
                                        {{ session('status') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <form class="space-y-6" method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <div class="relative rounded-lg shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}" 
                                    class="pl-11 block w-full px-4 py-3.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-200 @error('email') border-red-500 @enderror" 
                                    placeholder="nama@email.com">
                            </div>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <div class="flex items-center justify-between">
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                                <div class="text-sm">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="font-medium text-primary-600 hover:text-primary-700 transition duration-200">
                                            Lupa Kata Sandi?
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="relative rounded-lg shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input id="password" name="password" type="password" autocomplete="current-password" required 
                                    class="pl-11 block w-full px-4 py-3.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-200 @error('password') border-red-500 @enderror" 
                                    placeholder="••••••••">
                            </div>
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember_me" name="remember" type="checkbox" 
                                    class="h-5 w-5 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                                <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                                    Ingat saya
                                </label>
                            </div>
                        </div>
                        
                        <div>
                            <button type="submit" class="w-full flex justify-center items-center px-6 py-3.5 border border-transparent rounded-lg text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 shadow-lg shadow-primary-100 transition duration-300 font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                Masuk
                            </button>
                        </div>
                    </form>
                    
                    <div class="mt-6 text-center">
                        <p class="text-base text-gray-600">
                            Belum memiliki akun?
                            <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:text-primary-700 transition duration-200">
                                Daftar sekarang
                            </a>
                        </p>
                    </div>
                    
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <a href="/" class="flex items-center justify-center text-gray-500 hover:text-primary-600 transition duration-200 text-sm font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
                
                <div class="mt-6 text-center lg:hidden">
                    <p class="text-gray-500 text-sm">© 2025 Zakat Fitrah. Semua hak dilindungi.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>