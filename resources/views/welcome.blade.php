<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Zakat Fitrah Desa Kahuripan</title>
    <meta name="description" content="Aplikasi pengelolaan zakat fitrah modern dan efisien untuk Desa Kahuripan">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            light: '#F0F4FA', // Very light blue/gray
                            DEFAULT: '#3B82F6', // Vibrant blue
                            dark: '#1E40AF',   // Deep blue
                        },
                        secondary: {
                            light: '#E0E7FF', // Very light indigo
                            DEFAULT: '#334155', // Slate gray
                            dark: '#0F172A',  // Very dark blue/slate
                        },
                        accent: {
                            light: '#ECFDF5', // Very light green
                            DEFAULT: '#10B981', // Emerald green
                            dark: '#047857',  // Dark green
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    boxShadow: {
                        'custom': '0 10px 25px -5px rgba(59, 130, 246, 0.1), 0 8px 10px -6px rgba(59, 130, 246, 0.1)',
                    }
                }
            }
        }
    </script>
    <style>
        .pattern-dots {
            background-image: radial-gradient(currentColor 1px, transparent 1px);
            background-size: 20px 20px;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-primary-light min-h-screen font-sans">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="#" class="text-primary-DEFAULT text-2xl font-bold">ZAKAT <span class="text-accent-DEFAULT">KAHURIPAN</span></a>
                    </div>
                </div>
                <div class="hidden md:ml-6 md:flex md:items-center md:space-x-4">
                    <a href="#hero" 
                    class="nav-link text-gray-600 hover:text-[#3B82F6] px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                    Beranda
                    </a>
                    <a href="#features" 
                    class="nav-link text-gray-600 hover:text-[#3B82F6] px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                    Fitur
                    </a>
                    <a href="#testimonials" 
                    class="nav-link text-gray-600 hover:text-[#3B82F6] px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                    Testimoni
                    </a>
                    <a href="#contact" 
                    class="nav-link text-gray-600 hover:text-[#3B82F6] px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                    Kontak
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-3">
                    <a href="{{ route('login') }}" class="relative inline-flex items-center justify-center bg-white hover:bg-gray-50 text-primary-DEFAULT font-bold py-2 px-4 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg border-2 border-primary-DEFAULT">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                        </svg>
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="relative inline-flex items-center justify-center bg-white hover:bg-gray-50 text-primary-DEFAULT font-bold py-2 px-4 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg border-2 border-primary-DEFAULT">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                        </svg>
                        Daftar
                    </a>
                </div>
                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden">
                    <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-secondary-DEFAULT hover:text-primary-DEFAULT hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-DEFAULT" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Buka menu utama</span>
                        <!-- Icon when menu is closed -->
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!-- Icon when menu is open -->
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="mobile-menu hidden md:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="#hero" class="nav-link text-gray-600 hover:text-[#3B82F6] block px-3 py-2 rounded-md text-base font-medium transition duration-300">Beranda</a>
                <a href="#features" class="nav-link text-gray-600 hover:text-[#3B82F6] block px-3 py-2 rounded-md text-base font-medium transition duration-300">Fitur</a>
                <a href="#testimonials" class="nav-link text-gray-600 hover:text-[#3B82F6] block px-3 py-2 rounded-md text-base font-medium transition duration-300">Testimoni</a>
                <a href="#contact" class="nav-link text-gray-600 hover:text-[#3B82F6] block px-3 py-2 rounded-md text-base font-medium transition duration-300">Kontak</a>
                <div class="grid grid-cols-2 gap-2 mt-3">
                    <a href="{{ route('login') }}" class="flex items-center justify-center text-white bg-primary-DEFAULT hover:bg-primary-dark px-3 py-2 rounded-md text-base font-medium transition duration-300 border border-primary-DEFAULT">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                        </svg>
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="flex items-center justify-center bg-white text-primary-DEFAULT px-3 py-2 rounded-md text-base font-medium transition duration-300 border border-primary-DEFAULT">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                        </svg>
                        Daftar
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div id="hero" class="relative overflow-hidden bg-gradient-to-br from-primary-dark to-secondary-dark">
        <div class="absolute inset-0 bg-[url('https://api.placeholder.com/1920/1080')] opacity-10 bg-cover bg-center"></div>
        <div class="absolute inset-y-0 right-0 -mr-16 md:mr-0 w-1/2 bg-accent-DEFAULT opacity-10 rounded-l-full transform skew-x-6"></div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                <span class="block">Sistem Pengelolaan</span>
                <span class="block text-primary-light">Zakat Fitrah Desa Kahuripan</span>
            </h1>
            <p class="mt-6 text-xl text-gray-100 max-w-3xl leading-relaxed">
                Solusi modern untuk pengelolaan zakat fitrah di Desa Kahuripan yang memudahkan pencatatan, pengelolaan, dan distribusi zakat secara transparan dan tepat sasaran.
            </p>
            <div class="mt-10 flex gap-4 flex-wrap">
                <a href="{{ route('login') }}" class="bg-transparent text-white hover:bg-white/20 hover:text-white font-bold py-4 px-8 rounded-lg shadow-lg hover:shadow-xl transition duration-300 flex items-center border-2 border-white transform hover:-translate-y-1 text-lg">
                    <span>Mulai Sekarang</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="#features" class="bg-transparent border-2 border-white text-white hover:bg-white/20 hover:text-white font-bold py-4 px-8 rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:-translate-y-1 text-lg">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none" class="w-full h-20 md:h-32">
                <path fill="#F0F4FA" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,213.3C384,203,480,213,576,229.3C672,245,768,267,864,261.3C960,256,1056,224,1152,208C1248,192,1344,192,1392,192L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </div>

    <!-- Features Section -->
    <div id="features" class="py-16 bg-primary-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center mb-16">
                <span class="inline-block px-3 py-1 rounded-full bg-primary-light border border-primary-DEFAULT text-primary-DEFAULT text-sm font-semibold mb-4">FITUR UTAMA</span>
                <h2 class="text-3xl font-extrabold tracking-tight text-secondary-dark sm:text-4xl">
                    Pengelolaan Zakat Desa Kahuripan yang Modern & Efektif
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-secondary-DEFAULT lg:mx-auto">
                    Aplikasi dirancang untuk memudahkan pengurus zakat di Desa Kahuripan dalam mencatat, mengelola, dan mendistribusikan zakat fitrah dengan lebih efisien.
                </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-white rounded-xl shadow-custom overflow-hidden transform transition-all duration-300 hover:-translate-y-2">
                        <div class="p-6 flex">
                            <div class="bg-primary-light rounded-lg p-3 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary-DEFAULT" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-secondary-dark mb-2">Data Warga Kahuripan</h3>
                                <p class="text-secondary-DEFAULT">Pengelolaan data wajib zakat (muzakki) warga Desa Kahuripan beserta jumlah tanggungan secara terstruktur.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-white rounded-xl shadow-custom overflow-hidden transform transition-all duration-300 hover:-translate-y-2">
                        <div class="p-6 flex">
                            <div class="bg-primary-light rounded-lg p-3 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary-DEFAULT" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-secondary-dark mb-2">Pengumpulan Zakat</h3>
                                <p class="text-secondary-DEFAULT">Pencatatan pengumpulan zakat fitrah warga Desa Kahuripan baik berupa beras maupun uang dengan sistem yang rapi.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-white rounded-xl shadow-custom overflow-hidden transform transition-all duration-300 hover:-translate-y-2">
                        <div class="p-6 flex">
                            <div class="bg-primary-light rounded-lg p-3 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary-DEFAULT" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-secondary-dark mb-2">Distribusi Zakat</h3>
                                <p class="text-secondary-DEFAULT">Sistem distribusi zakat fitrah ke mustahik di Desa Kahuripan sesuai dengan ketentuan syariah secara tepat sasaran.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="bg-white rounded-xl shadow-custom overflow-hidden transform transition-all duration-300 hover:-translate-y-2">
                        <div class="p-6 flex">
                            <div class="bg-primary-light rounded-lg p-3 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary-DEFAULT" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-secondary-dark mb-2">Laporan Transparan</h3>
                                <p class="text-secondary-DEFAULT">Laporan pengumpulan dan distribusi zakat fitrah Desa Kahuripan yang dapat diekspor ke PDF untuk pertanggungjawaban.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 5 -->
                    <div class="bg-white rounded-xl shadow-custom overflow-hidden transform transition-all duration-300 hover:-translate-y-2">
                        <div class="p-6 flex">
                            <div class="bg-primary-light rounded-lg p-3 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary-DEFAULT" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-secondary-dark mb-2">Keamanan Data</h3>
                                <p class="text-secondary-DEFAULT">Keamanan data warga Desa Kahuripan dengan sistem autentikasi untuk menjamin privasi dan keamanan data.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 6 -->
                    <div class="bg-white rounded-xl shadow-custom overflow-hidden transform transition-all duration-300 hover:-translate-y-2">
                        <div class="p-6 flex">
                            <div class="bg-primary-light rounded-lg p-3 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary-DEFAULT" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-secondary-dark mb-2">Pengelolaan Efisien</h3>
                                <p class="text-secondary-DEFAULT">Proses pengelolaan zakat yang efisien untuk pengurus zakat Desa Kahuripan dengan antarmuka yang mudah digunakan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center mb-12">
                <span class="inline-block px-3 py-1 rounded-full bg-primary-light border border-primary-DEFAULT text-primary-DEFAULT text-sm font-semibold mb-4">STATISTIK</span>
                <h2 class="text-3xl font-extrabold tracking-tight text-secondary-dark sm:text-4xl">
                    Dampak Positif di Desa Kahuripan
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                <div class="p-6">
                    <div class="text-4xl font-bold text-primary-DEFAULT mb-2">500+</div>
                    <div class="text-secondary-DEFAULT">Warga Desa Terdaftar</div>
                </div>
                <div class="p-6">
                    <div class="text-4xl font-bold text-primary-DEFAULT mb-2">100+</div>
                    <div class="text-secondary-DEFAULT">Mustahik Terbantu</div>
                </div>
                <div class="p-6">
                    <div class="text-4xl font-bold text-primary-DEFAULT mb-2">5+</div>
                    <div class="text-secondary-DEFAULT">RW Terintegrasi</div>
                </div>
                <div class="p-6">
                    <div class="text-4xl font-bold text-primary-DEFAULT mb-2">95%</div>
                    <div class="text-secondary-DEFAULT">Tingkat Kepuasan</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial Section -->
    <div id="testimonials" class="bg-primary-light py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center mb-12">
                <span class="inline-block px-3 py-1 rounded-full bg-white border border-primary-DEFAULT text-primary-DEFAULT text-sm font-semibold mb-4">TESTIMONI</span>
                <h2 class="text-3xl font-extrabold tracking-tight text-secondary-dark sm:text-4xl">
                    Apa Kata Warga Kahuripan
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-custom">
                    <div class="flex items-center mb-4">
                        <div class="h-12 w-12 rounded-full bg-primary-light flex items-center justify-center text-primary-DEFAULT font-bold text-xl">A</div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-secondary-dark">Ahmad Fauzi</h4>
                            <p class="text-sm text-secondary-DEFAULT">Ketua RT 03 Kahuripan</p>
                        </div>
                    </div>
                    <p class="text-secondary-DEFAULT">"Sistem ini sangat membantu kami dalam mengelola zakat fitrah di lingkungan RT. Proses pencatatan yang tadinya manual sekarang menjadi lebih rapi dan efisien."</p>
                    <div class="flex mt-4 text-accent-DEFAULT">
                        ★★★★★
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-custom">
                    <div class="flex items-center mb-4">
                        <div class="h-12 w-12 rounded-full bg-primary-light flex items-center justify-center text-primary-DEFAULT font-bold text-xl">S</div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-secondary-dark">Siti Nurjanah</h4>
                            <p class="text-sm text-secondary-DEFAULT">Pengurus Masjid Desa Kahuripan</p>
                        </div>
                    </div>
                    <p class="text-secondary-DEFAULT">"Laporan yang dihasilkan sangat detail dan transparan. Hal ini membuat para muzakki semakin percaya dengan pengelolaan zakat yang kami lakukan."</p>
                    <div class="flex mt-4 text-accent-DEFAULT">
                        ★★★★★
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-custom">
                    <div class="flex items-center mb-4">
                        <div class="h-12 w-12 rounded-full bg-primary-light flex items-center justify-center text-primary-DEFAULT font-bold text-xl">H</div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-secondary-dark">H. Muhammad</h4>
                            <p class="text-sm text-secondary-DEFAULT">Pengurus Yayasan Zakat</p>
                        </div>
                    </div>
                    <p class="text-secondary-DEFAULT">"Distribusi zakat menjadi lebih tepat sasaran dan terdata dengan baik. Sangat direkomendasikan untuk semua lembaga pengelola zakat fitrah."</p>
                    <div class="flex mt-4 text-accent-DEFAULT">
                        ★★★★★
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="bg-gradient-to-br from-secondary-dark to-primary-dark py-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-cover bg-center pattern-dots"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                    Siap Untuk Memulai?
                </h2>
                <p class="mt-4 text-lg text-gray-200">
                    Gunakan sistem pengelolaan zakat fitrah modern yang efektif, transparan, dan sesuai syariah.
                </p>
                <div class="mt-8 flex flex-wrap justify-center gap-6">
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-8 py-4 border-2 border-white text-xl font-bold rounded-lg bg-transparent text-white hover:bg-white/20 hover:text-white transition duration-300 shadow-md hover:shadow-xl transform hover:-translate-y-1">
                        <span>Masuk Sekarang</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#contact" class="inline-flex items-center justify-center px-6 py-4 border-2 border-white text-lg font-bold rounded-lg bg-transparent text-white hover:bg-white/20 hover:text-white transition duration-300 shadow-md hover:shadow-xl transform hover:-translate-y-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer id="contact" class="bg-secondary-dark py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-2">
                    <span class="text-white text-xl font-bold">ZAKAT <span class="text-accent-DEFAULT">KAHURIPAN</span></span>
                    <p class="mt-4 text-gray-300 max-w-md">
                        Sistem pengelolaan zakat fitrah modern yang menyediakan solusi lengkap untuk pengumpulan, pengelolaan, dan distribusi zakat fitrah.
                    </p>
                    <div class="flex space-x-4 mt-6">
                        <a href="#" class="text-gray-300 hover:text-white">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.123.058h.08c2.643 0 2.987-.01 4.043-.058.975-.045 1.504-.207 1.857-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.023.058-1.351.058-3.807v-.468c0-2.456-.01-2.784-.058-3.807-.045-.975-.207-1.504-.344-1.857a3.1 3.1 0 00-.748-1.15 3.1 3.1 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <span class="sr-only">YouTube</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Menu</h3>
                    <ul class="space-y-2">
                        <li><a href="#hero" class="text-gray-300 hover:text-white transition duration-300">Beranda</a></li>
                        <li><a href="#features" class="text-gray-300 hover:text-white transition duration-300">Fitur</a></li>
                        <li><a href="#testimonials" class="text-gray-300 hover:text-white transition duration-300">Tentang</a></li>
                        <li><a href="#contact" class="text-gray-300 hover:text-white transition duration-300">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Kontak</h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-accent-DEFAULT mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-gray-300">Jl. Masjid No. 123, Jakarta, Indonesia</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-accent-DEFAULT mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="text-gray-300">info@zakatfitrah.id</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-accent-DEFAULT mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span class="text-gray-300">+62 812 3456 7890</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-12 pt-8">
                <p class="text-gray-400 text-center">
                    &copy; 2025 Sistem Zakat Fitrah. Hak Cipta Dilindungi.
                </p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Add smooth scrolling dan active state
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                
                // Hapus active state dari semua menu
                document.querySelectorAll('.nav-link').forEach(l => {
                    l.classList.remove('text-[#3B82F6]', 'font-bold');
                    l.classList.add('text-gray-600');
                });
                
                // Set active state ke menu yang diklik
                this.classList.remove('text-gray-600');
                this.classList.add('text-[#3B82F6]', 'font-bold');
                
                // Scroll ke section
                const targetId = this.getAttribute('href');
                document.querySelector(targetId).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
        
        // Mobile menu toggle
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Highlight nav saat scroll
        const sections = document.querySelectorAll('section[id], div[id]');
        const navLinks = document.querySelectorAll('.nav-link');

        window.addEventListener('scroll', () => {
            let current = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (window.scrollY >= (sectionTop - 100)) {
                    current = section.getAttribute('id');
                }
            });

            // Deteksi jika sudah di paling bawah halaman, aktifkan nav-link terakhir (Kontak)
            if ((window.innerHeight + window.scrollY) >= (document.body.offsetHeight - 10)) {
                current = navLinks[navLinks.length - 1].getAttribute('href').substring(1);
            }

            navLinks.forEach(link => {
                link.classList.remove('text-[#3B82F6]', 'font-bold');
                link.classList.add('text-gray-600');
                if (link.getAttribute('href').substring(1) === current) {
                    link.classList.remove('text-gray-600');
                    link.classList.add('text-[#3B82F6]', 'font-bold');
                }
            });
        });

        // Set default active nav saat load
        document.querySelector('.nav-link').classList.remove('text-gray-600');
        document.querySelector('.nav-link').classList.add('text-[#3B82F6]', 'font-bold');
    </script>
</body>
</html>