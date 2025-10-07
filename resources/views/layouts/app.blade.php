<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Sistem Pengelolaan Zakat Fitrah')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
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
    
    @stack('styles')
</head>
<body class="bg-primary-light min-h-screen font-sans">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="/" class="text-primary-DEFAULT text-2xl font-bold">ZAKAT <span class="text-accent-DEFAULT">FITRAH</span></a>
                    </div>
                </div>
                <div class="hidden md:ml-6 md:flex md:items-center md:space-x-4">
                    <a href="{{ route('home') }}" 
                    class="{{ request()->routeIs('home') ? 'text-blue-700' : 'text-primary-DEFAULT hover:text-blue-500 active:text-blue-600' }} px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                    Dashboard</a>

                    <a href="{{ route('muzakki.index') }}" 
                    class="{{ request()->routeIs('muzakki.index') ? 'text-blue-700' : 'text-secondary-DEFAULT hover:text-blue-500 active:text-blue-600' }} px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                    Muzakki</a>

                    <a href="{{ route('mustahik.index') }}" 
                    class="{{ request()->routeIs('mustahik.index') ? 'text-blue-700' : 'text-secondary-DEFAULT hover:text-blue-500 active:text-blue-600' }} px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                    Mustahik</a>

                    <a href="{{ route('bayarzakat.index') }}" 
                    class="{{ request()->routeIs('bayarzakat.index') ? 'text-blue-700' : 'text-secondary-DEFAULT hover:text-blue-500 active:text-blue-600' }} px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                    Pengumpulan</a>

                    <a href="{{ route('distribusi.index') }}" 
                    class="{{ request()->routeIs('distribusi.index') ? 'text-blue-700' : 'text-secondary-DEFAULT hover:text-blue-500 active:text-blue-600' }} px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                    Distribusi</a>

                    <a href="{{ route('laporan.index') }}" 
                    class="{{ request()->routeIs('laporan.index') ? 'text-blue-700' : 'text-secondary-DEFAULT hover:text-blue-500 active:text-blue-600' }} px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                    Laporan</a>
                </div>


                <div class="hidden md:flex items-center space-x-3">
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 relative focus:outline-none">
                            <div class="h-9 w-9 rounded-full bg-primary-DEFAULT flex items-center justify-center text-white">
                                @if(Auth::check())
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                @else
                                    G
                                @endif
                            </div>
                            <span class="text-secondary-DEFAULT">
                                @if(Auth::check())
                                    {{ Auth::user()->name }}
                                @else
                                    Guest
                                @endif
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-secondary-DEFAULT" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                            @if(Auth::check())
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-secondary-DEFAULT hover:bg-primary-light">Profil</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-secondary-DEFAULT hover:bg-primary-light">
                                        Keluar
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-secondary-DEFAULT hover:bg-primary-light">Masuk</a>
                                <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-secondary-DEFAULT hover:bg-primary-light">Daftar</a>
                            @endif
                        </div>
                    </div>
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
                <a href="{{ route('home') }}" class="text-primary-DEFAULT block px-3 py-2 rounded-md text-base font-medium transition duration-300">Dashboard</a>
                <a href="{{ route('muzakki.index') }}" class="text-secondary-DEFAULT hover:text-primary-DEFAULT block px-3 py-2 rounded-md text-base font-medium transition duration-300">Muzakki</a>
                <a href="{{ route('mustahik.index') }}" class="text-secondary-DEFAULT hover:text-primary-DEFAULT block px-3 py-2 rounded-md text-base font-medium transition duration-300">Mustahik</a>
                <a href="{{ route('bayarzakat.index') }}" class="text-secondary-DEFAULT hover:text-primary-DEFAULT block px-3 py-2 rounded-md text-base font-medium transition duration-300">Pengumpulan</a>
                <a href="{{ route('distribusi.index') }}" class="text-secondary-DEFAULT hover:text-primary-DEFAULT block px-3 py-2 rounded-md text-base font-medium transition duration-300">Distribusi</a>
                <a href="{{ route('laporan.index') }}" class="text-secondary-DEFAULT hover:text-primary-DEFAULT block px-3 py-2 rounded-md text-base font-medium transition duration-300">Laporan</a>

                @if(Auth::check())
                <div class="border-t border-gray-200 mt-3 pt-3">
                    <div class="px-3 py-2 flex items-center">
                        <div class="h-9 w-9 rounded-full bg-primary-DEFAULT flex items-center justify-center text-white mr-2">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <span class="text-secondary-DEFAULT font-medium">{{ Auth::user()->name }}</span>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded-md text-base font-medium text-secondary-DEFAULT hover:text-primary-DEFAULT transition duration-300">Profil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left block px-3 py-2 rounded-md text-base font-medium text-secondary-DEFAULT hover:text-primary-DEFAULT transition duration-300">
                            Keluar
                        </button>
                    </form>
                </div>
                @else
                <div class="border-t border-gray-200 mt-3 pt-3">
                    <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-secondary-DEFAULT hover:text-primary-DEFAULT transition duration-300">Masuk</a>
                    <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md text-base font-medium text-secondary-DEFAULT hover:text-primary-DEFAULT transition duration-300">Daftar</a>
                </div>
                @endif
            </div>
        </div>
    </nav>

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Scripts -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.querySelector('.mobile-menu-button');
            const mobileMenu = document.querySelector('.mobile-menu');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                    const menuIcons = mobileMenuButton.querySelectorAll('svg');
                    menuIcons.forEach(icon => icon.classList.toggle('hidden'));
                });
            }
            
            // Alpine.js initialization for dropdown
            document.addEventListener('alpine:init', () => {
                Alpine.data('dropdown', () => ({
                    open: false,
                    toggle() {
                        this.open = !this.open;
                    }
                }));
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html> 