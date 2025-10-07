<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BayarZakat;
use App\Models\Distribusi;

class DistribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Menghitung jumlah mustahik
        $totalMustahik = DB::table('mustahik_warga')->count() + DB::table('mustahik_lainnya')->count();
        
        // Menghitung total distribusi jika tabel distribusi dan datanya sudah ada
        $totalDanaTersalurkan = Distribusi::sum('jumlah_uang');
        $totalBerasTersalurkan = Distribusi::sum('jumlah_beras');
        
        // Query dasar
        $query = Distribusi::query();
        
        // Filter berdasarkan kategori
        if ($request->has('kategori') && !empty($request->kategori)) {
            $query->where('kategori', 'like', '%' . $request->kategori . '%');
        }
        
        // Filter berdasarkan pencarian
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('nama_mustahik', 'like', '%' . $searchTerm . '%')
                  ->orWhere('kategori', 'like', '%' . $searchTerm . '%')
                  ->orWhere('alamat', 'like', '%' . $searchTerm . '%');
            });
        }
        
        // Data distribusi untuk ditampilkan di tabel dengan pagination (5 data per halaman)
        $distribusi = $query->orderBy('tanggal', 'desc')->get();
        
        return view('distribusi.index', compact('totalMustahik', 'totalDanaTersalurkan', 'totalBerasTersalurkan', 'distribusi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Hitung dana dan beras tersedia
        $danaTersedia = BayarZakat::where('jenis_bayar', 'uang')->sum('bayar_uang');
        $berasTersedia = BayarZakat::where('jenis_bayar', 'beras')->sum('bayar_beras');
        
        // Hitung jumlah orang per kategori
        $jumlahOrangPerKategori = [];
        
        // Kategori default dari tabel kategori_mustahik
        $kategoriMustahik = DB::table('kategori_mustahik')->get();
        
        // Hitung jumlah orang untuk setiap kategori dari mustahik_warga
        foreach ($kategoriMustahik as $kategori) {
            $jumlahWarga = DB::table('mustahik_warga')
                ->where('kategori', $kategori->nama_kategori)
                ->count();
                
            $jumlahLainnya = DB::table('mustahik_lainnya')
                ->where('kategori', $kategori->nama_kategori)
                ->count();
                
            $jumlahOrangPerKategori[$kategori->nama_kategori] = $jumlahWarga + $jumlahLainnya;
            
            // Jika jumlah orang 0, set nilai default minimal 1
            if ($jumlahOrangPerKategori[$kategori->nama_kategori] == 0) {
                $jumlahOrangPerKategori[$kategori->nama_kategori] = 1;
            }
        }
        
        return view('distribusi.create', compact('danaTersedia', 'berasTersedia', 'jumlahOrangPerKategori', 'kategoriMustahik'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_mustahik' => 'required|string|max:255',
            'kategori' => 'required|string|max:50',
            'jenis_distribusi' => 'required|in:uang,beras,kombinasi',
            'tanggal' => 'required|date',
        ]);

        // Validasi jumlah uang/beras sesuai jenis distribusi
        if ($request->jenis_distribusi == 'uang' || $request->jenis_distribusi == 'kombinasi') {
            $request->validate([
                'jumlah_uang' => 'required|string',
            ]);
        }

        if ($request->jenis_distribusi == 'beras' || $request->jenis_distribusi == 'kombinasi') {
            $request->validate([
                'jumlah_beras' => 'required|numeric|min:0',
            ]);
        }

        // Proses jumlah uang (hapus format)
        $jumlahUang = 0;
        if ($request->has('jumlah_uang') && !empty($request->jumlah_uang)) {
            $jumlahUang = (int) str_replace('.', '', $request->jumlah_uang);
        }

        // Set nilai default untuk jumlah_beras dan jumlah_uang berdasarkan jenis distribusi
        $jumlahBeras = 0;
        if ($request->has('jumlah_beras') && !empty($request->jumlah_beras)) {
            $jumlahBeras = $request->jumlah_beras;
        }

        // Buat record distribusi baru
        try {
            DB::beginTransaction();
            
            // Simpan data distribusi
            $distribusi = new Distribusi();
            $distribusi->nama_mustahik = $request->nama_mustahik;
            $distribusi->kategori = $request->kategori;
            $distribusi->alamat = $request->alamat;
            $distribusi->kontak = $request->kontak;
            $distribusi->jenis_distribusi = $request->jenis_distribusi;
            $distribusi->jumlah_uang = $jumlahUang;
            $distribusi->jumlah_beras = $jumlahBeras;
            $distribusi->tanggal = $request->tanggal;
            $distribusi->keterangan = $request->keterangan;
            $distribusi->save();
            
            DB::commit();
            
            return redirect()->route('distribusi.index')
                ->with('success', 'Distribusi zakat berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // Cari distribusi berdasarkan ID
            $distribusi = Distribusi::findOrFail($id);
            
            return view('distribusi.show', compact('distribusi'));
        } catch (\Exception $e) {
            return redirect()->route('distribusi.index')
                ->with('error', 'Data distribusi tidak ditemukan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            // Cari distribusi berdasarkan ID
            $distribusi = Distribusi::findOrFail($id);
            
            // Hitung dana dan beras tersedia
            $danaTersedia = BayarZakat::where('jenis_bayar', 'uang')->sum('bayar_uang');
            $berasTersedia = BayarZakat::where('jenis_bayar', 'beras')->sum('bayar_beras');
            
            // Kategori default dari tabel kategori_mustahik
            $kategoriMustahik = DB::table('kategori_mustahik')->get();
            
            // Hitung jumlah orang per kategori
            $jumlahOrangPerKategori = [];
            foreach ($kategoriMustahik as $kategori) {
                $jumlahWarga = DB::table('mustahik_warga')
                    ->where('kategori', $kategori->nama_kategori)
                    ->count();
                    
                $jumlahLainnya = DB::table('mustahik_lainnya')
                    ->where('kategori', $kategori->nama_kategori)
                    ->count();
                    
                $jumlahOrangPerKategori[$kategori->nama_kategori] = $jumlahWarga + $jumlahLainnya;
                
                // Jika jumlah orang 0, set nilai default minimal 1
                if ($jumlahOrangPerKategori[$kategori->nama_kategori] == 0) {
                    $jumlahOrangPerKategori[$kategori->nama_kategori] = 1;
                }
            }
            
            return view('distribusi.edit', compact('distribusi', 'danaTersedia', 'berasTersedia', 'jumlahOrangPerKategori', 'kategoriMustahik'));
        } catch (\Exception $e) {
            return redirect()->route('distribusi.index')
                ->with('error', 'Data distribusi tidak ditemukan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data
        $request->validate([
            'nama_mustahik' => 'required|string|max:255',
            'kategori' => 'required|string|max:50',
            'jenis_distribusi' => 'required|in:uang,beras,kombinasi',
            'tanggal' => 'required|date',
        ]);

        // Validasi jumlah uang/beras sesuai jenis distribusi
        if ($request->jenis_distribusi == 'uang' || $request->jenis_distribusi == 'kombinasi') {
            $request->validate([
                'jumlah_uang' => 'required|string',
            ]);
        }

        if ($request->jenis_distribusi == 'beras' || $request->jenis_distribusi == 'kombinasi') {
            $request->validate([
                'jumlah_beras' => 'required|numeric|min:0',
            ]);
        }

        try {
            DB::beginTransaction();
            
            // Cari distribusi berdasarkan ID
            $distribusi = Distribusi::findOrFail($id);
            
            // Proses jumlah uang (hapus format)
            $jumlahUang = 0;
            if (($request->jenis_distribusi == 'uang' || $request->jenis_distribusi == 'kombinasi') && 
                $request->has('jumlah_uang') && !empty($request->jumlah_uang)) {
                $jumlahUang = (int) str_replace('.', '', $request->jumlah_uang);
            }

            // Set nilai jumlah_beras
            $jumlahBeras = 0;
            if (($request->jenis_distribusi == 'beras' || $request->jenis_distribusi == 'kombinasi') && 
                $request->has('jumlah_beras') && !empty($request->jumlah_beras)) {
                $jumlahBeras = $request->jumlah_beras;
            }
            
            // Update data distribusi
            $distribusi->nama_mustahik = $request->nama_mustahik;
            $distribusi->kategori = $request->kategori;
            $distribusi->alamat = $request->alamat;
            $distribusi->kontak = $request->kontak;
            $distribusi->jenis_distribusi = $request->jenis_distribusi;
            $distribusi->jumlah_uang = $jumlahUang;
            $distribusi->jumlah_beras = $jumlahBeras;
            $distribusi->tanggal = $request->tanggal;
            $distribusi->keterangan = $request->keterangan;
            $distribusi->save();
            
            DB::commit();
            
            return redirect()->route('distribusi.index')
                ->with('success', 'Data distribusi berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            
            // Cari distribusi berdasarkan ID
            $distribusi = Distribusi::findOrFail($id);
            
            // Hapus distribusi
            $distribusi->delete();
            
            DB::commit();
            
            return redirect()->route('distribusi.index')
                ->with('success', 'Data distribusi berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}