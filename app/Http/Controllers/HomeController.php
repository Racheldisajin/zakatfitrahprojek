<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Muzakki;
use App\Models\BayarZakat;
use App\Models\Distribusi;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Hitung total muzakki
        $totalMuzakki = Muzakki::count();
        
        // Hitung total mustahik (dari warga dan lainnya)
        $totalMustahik = DB::table('mustahik_warga')->count() + DB::table('mustahik_lainnya')->count();
        
        // Hitung total uang dan beras yang terkumpul
        $totalUang = BayarZakat::where('jenis_bayar', 'uang')->sum('bayar_uang');
        $totalBeras = BayarZakat::where('jenis_bayar', 'beras')->sum('bayar_beras');
        
        // Hitung total uang dan beras yang tersalurkan/terdistribusikan
        $totalDanaTersalurkan = Distribusi::sum('jumlah_uang');
        $totalBerasTersalurkan = Distribusi::sum('jumlah_beras');
        
        // Ambil data 5 pembayaran zakat terbaru
        $recentZakat = BayarZakat::orderBy('created_at', 'desc')->take(5)->get();
        
        return view('home', compact(
            'totalMuzakki', 
            'totalMustahik', 
            'totalUang', 
            'totalBeras', 
            'totalDanaTersalurkan', 
            'totalBerasTersalurkan', 
            'recentZakat'
        ));
    }
} 