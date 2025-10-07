<?php

namespace App\Http\Controllers;

use App\Models\BayarZakat;
use App\Models\Distribusi;
use App\Models\MustahikWarga;
use App\Models\MustahikLainnya;
use App\Models\Muzakki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display the main report page.
     */
    public function index()
    {
        // Get current year zakat statistics for summary
        $currentYear = date('Y');
        $totalMuzakki = Muzakki::count();
        $totalMustahik = DB::table('mustahik_warga')->count() + DB::table('mustahik_lainnya')->count();
        
        $totalBerasCollected = BayarZakat::where('jenis_bayar', 'beras')
            ->whereYear('created_at', $currentYear)
            ->sum('bayar_beras');
            
        $totalUangCollected = BayarZakat::where('jenis_bayar', 'uang')
            ->whereYear('created_at', $currentYear)
            ->sum('bayar_uang');
            
        $totalBerasDistributed = Distribusi::whereYear('tanggal', $currentYear)
            ->sum('jumlah_beras');
            
        $totalUangDistributed = Distribusi::whereYear('tanggal', $currentYear)
            ->sum('jumlah_uang');
            
        $berasBalance = $totalBerasCollected - $totalBerasDistributed;
        $uangBalance = $totalUangCollected - $totalUangDistributed;
        
        return view('laporan.index', compact(
            'totalMuzakki', 
            'totalMustahik', 
            'totalBerasCollected', 
            'totalUangCollected',
            'totalBerasDistributed',
            'totalUangDistributed',
            'berasBalance',
            'uangBalance',
            'currentYear'
        ));
    }

    /**
     * Display collection report.
     */
    public function pengumpulan(Request $request)
    {
        // Default to current year if not specified
        $year = $request->input('year', date('Y'));
        $month = $request->input('month', null);
        
        // Start with base query
        $query = BayarZakat::with('muzakki')->orderBy('created_at', 'desc');
        
        // Apply year filter
        $query->whereYear('created_at', $year);
        
        // Apply month filter if provided
        if ($month) {
            $query->whereMonth('created_at', $month);
        }
        
        // Get all records instead of paginating (for client-side pagination)
        $pengumpulanZakat = $query->get();
        
        // Calculate totals with same filters
        $totalBeras = BayarZakat::where('jenis_bayar', 'beras')
            ->whereYear('created_at', $year)
            ->when($month, function($query) use ($month) {
                return $query->whereMonth('created_at', $month);
            })
            ->sum('bayar_beras');
            
        $totalUang = BayarZakat::where('jenis_bayar', 'uang')
            ->whereYear('created_at', $year)
            ->when($month, function($query) use ($month) {
                return $query->whereMonth('created_at', $month);
            })
            ->sum('bayar_uang');
            
        // Get years list for filter dropdown
        $years = BayarZakat::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
            
        return view('laporan.pengumpulan', compact(
            'pengumpulanZakat', 
            'totalBeras', 
            'totalUang', 
            'year', 
            'month', 
            'years'
        ));
    }

    /**
     * Display distribution report.
     */
    public function distribusi(Request $request)
    {
        // Default to current year if not specified
        $year = $request->input('year', date('Y'));
        $month = $request->input('month', null);
        $kategori = $request->input('kategori', null);
        
        // Start with base query
        $query = Distribusi::orderBy('tanggal', 'desc');
        
        // Apply year filter
        $query->whereYear('tanggal', $year);
        
        // Apply month filter if provided
        if ($month) {
            $query->whereMonth('tanggal', $month);
        }
        
        // Apply kategori filter if provided
        if ($kategori) {
            $query->where('kategori', $kategori);
        }
        
        // Use pagination instead of get()
        $distribusiZakat = $query->paginate(5);
        
        // For calculating totals, we need to use the query to get all records
        $allDistribusiZakat = $query->get();
        
        // Calculate totals from all records
        $totalBeras = $allDistribusiZakat->sum('jumlah_beras');
        $totalUang = $allDistribusiZakat->sum('jumlah_uang');
        
        // Get years list for filter dropdown
        $years = Distribusi::selectRaw('YEAR(tanggal) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
            
        // Get categories for filter
        $kategoris = Distribusi::select('kategori')
            ->distinct()
            ->orderBy('kategori')
            ->pluck('kategori');
            
        return view('laporan.distribusi', compact(
            'distribusiZakat', 
            'totalBeras', 
            'totalUang', 
            'year', 
            'month', 
            'years',
            'kategori',
            'kategoris'
        ));
    }

    /**
     * Display combined report of zakat payments and distributions.
     */
    public function combinedReport(Request $request)
    {
        // Default to current year if not specified
        $year = $request->input('year', date('Y'));
        $month = $request->input('month', null);
        
        // Pengumpulan Zakat
        $pengumpulanQuery = BayarZakat::with('muzakki')->orderBy('created_at', 'desc');
        $pengumpulanQuery->whereYear('created_at', $year);
        if ($month) {
            $pengumpulanQuery->whereMonth('created_at', $month);
        }
        // Get all pengumpulan results for client-side pagination
        $pengumpulanZakat = $pengumpulanQuery->get();
        
        // Calculate totals for pengumpulan
        $totalBerasCollected = BayarZakat::where('jenis_bayar', 'beras')
            ->whereYear('created_at', $year)
            ->when($month, function($query) use ($month) {
                return $query->whereMonth('created_at', $month);
            })
            ->sum('bayar_beras');
            
        $totalUangCollected = BayarZakat::where('jenis_bayar', 'uang')
            ->whereYear('created_at', $year)
            ->when($month, function($query) use ($month) {
                return $query->whereMonth('created_at', $month);
            })
            ->sum('bayar_uang');
        
        // Distribusi Zakat
        $distribusiQuery = Distribusi::orderBy('tanggal', 'desc');
        $distribusiQuery->whereYear('tanggal', $year);
        if ($month) {
            $distribusiQuery->whereMonth('tanggal', $month);
        }
        // Get all distribusi results for client-side pagination
        $distribusiZakat = $distribusiQuery->get();
        
        // For calculating totals, we can use the same collection
        $allDistribusiZakat = $distribusiZakat;
        
        // Calculate totals for distribusi from all records
        $totalBerasDistributed = $distribusiZakat->sum('jumlah_beras');
        $totalUangDistributed = $distribusiZakat->sum('jumlah_uang');
        
        // Calculate balance
        $berasBalance = $totalBerasCollected - $totalBerasDistributed;
        $uangBalance = $totalUangCollected - $totalUangDistributed;
        
        // Get years list for filter dropdown
        $years = BayarZakat::selectRaw('YEAR(created_at) as year')
            ->union(
                Distribusi::selectRaw('YEAR(tanggal) as year')
            )
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
            
        return view('laporan.combined', compact(
            'pengumpulanZakat', 
            'totalBerasCollected', 
            'totalUangCollected',
            'distribusiZakat',
            'totalBerasDistributed',
            'totalUangDistributed',
            'berasBalance',
            'uangBalance',
            'year', 
            'month', 
            'years'
        ));
    }

    /**
     * Generate and download the combined report as a PDF.
     */
    public function combinedReportPdf(Request $request)
    {
        // Default to current year if not specified
        $year = $request->input('year', date('Y'));
        $month = $request->input('month', null);
        
        // Pengumpulan Zakat
        $pengumpulanQuery = BayarZakat::with('muzakki')->orderBy('created_at', 'desc');
        $pengumpulanQuery->whereYear('created_at', $year);
        if ($month) {
            $pengumpulanQuery->whereMonth('created_at', $month);
        }
        $pengumpulanZakat = $pengumpulanQuery->get();
        
        // Calculate totals for pengumpulan
        $totalBerasCollected = BayarZakat::where('jenis_bayar', 'beras')
            ->whereYear('created_at', $year)
            ->when($month, function($query) use ($month) {
                return $query->whereMonth('created_at', $month);
            })
            ->sum('bayar_beras');
            
        $totalUangCollected = BayarZakat::where('jenis_bayar', 'uang')
            ->whereYear('created_at', $year)
            ->when($month, function($query) use ($month) {
                return $query->whereMonth('created_at', $month);
            })
            ->sum('bayar_uang');
        
        // Distribusi Zakat
        $distribusiQuery = Distribusi::orderBy('tanggal', 'desc');
        $distribusiQuery->whereYear('tanggal', $year);
        if ($month) {
            $distribusiQuery->whereMonth('tanggal', $month);
        }
        $distribusiZakat = $distribusiQuery->get();
        
        // Calculate totals for distribusi
        $totalBerasDistributed = $distribusiZakat->sum('jumlah_beras');
        $totalUangDistributed = $distribusiZakat->sum('jumlah_uang');
        
        // Calculate balance
        $berasBalance = $totalBerasCollected - $totalBerasDistributed;
        $uangBalance = $totalUangCollected - $totalUangDistributed;
        
        // Set PDF title
        $title = 'Laporan Zakat ' . $year;
        if ($month) {
            $title .= ' - Bulan ' . date('F', mktime(0, 0, 0, $month, 10));
        }

        $pdf = \PDF::loadView('laporan.combined-pdf', compact(
            'pengumpulanZakat', 
            'totalBerasCollected', 
            'totalUangCollected',
            'distribusiZakat',
            'totalBerasDistributed',
            'totalUangDistributed',
            'berasBalance',
            'uangBalance',
            'year', 
            'month',
            'title'
        ));
        
        return $pdf->download('laporan_zakat_' . $year . ($month ? '_' . $month : '') . '.pdf');
    }
}
