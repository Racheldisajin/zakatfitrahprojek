<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BayarZakatController;
use App\Http\Controllers\DistribusiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MustahikController;
use App\Http\Controllers\MustahikLainnyaController;
use App\Http\Controllers\MustahikWargaController;
use App\Http\Controllers\MuzakkiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Public Routes - Welcome Page as Landing Page
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Authentication routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
// Register routes
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);;
// Password reset routes
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
// Define the logout route
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Authenticated Routes
Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

// Resources and other authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::resource('bayarzakat', BayarZakatController::class);
    Route::resource('distribusi', DistribusiController::class);
    
    // Add the search route before the resource route
    Route::get('mustahik/search', [MustahikController::class, 'search'])->name('mustahik.search');
    Route::resource('mustahik', MustahikController::class);
    
    Route::resource('mustahik-lainnya', MustahikLainnyaController::class);
    Route::resource('mustahik-warga', MustahikWargaController::class);
    
    // Add the muzakki search route before the resource route
    Route::get('muzakki/search', [MuzakkiController::class, 'search'])->name('muzakki.search');
    Route::resource('muzakki', MuzakkiController::class);
    
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('laporan/pengumpulan', [LaporanController::class, 'pengumpulan'])->name('laporan.pengumpulan');
    Route::get('laporan/distribusi', [LaporanController::class, 'distribusi'])->name('laporan.distribusi');
    Route::get('laporan/combined', [LaporanController::class, 'combinedReport'])->name('laporan.combined');
    Route::get('laporan/combined/pdf', [LaporanController::class, 'combinedReportPdf'])->name('laporan.combined.pdf');
});
