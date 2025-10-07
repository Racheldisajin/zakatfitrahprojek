<?php

namespace App\Http\Controllers;

use App\Models\KategoriMustahik;
use App\Models\MustahikWarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MustahikController extends Controller
{
    public function index()
    {
        $mustahikWarga = MustahikWarga::all();
        $kategoriMustahik = KategoriMustahik::all();
        
        return view('mustahik.index', compact('mustahikWarga', 'kategoriMustahik'));
    }

    public function create()
    {
        $kategori = KategoriMustahik::all();
        return view('mustahik.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        // Pastikan user masih terautentikasi
        if (!auth()->check()) {
            return redirect()->route('login')
                ->with('error', 'Sesi login Anda telah berakhir. Silakan login kembali.');
        }
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'nullable|string|max:16',
            'kategori' => 'required|string|max:255',
            'hak' => 'required|integer',
            'alamat' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        try {
        MustahikWarga::create([
            'nama' => $request->nama,
                'nik' => $request->nik,
            'kategori' => $request->kategori,
            'hak' => $request->hak,
                'alamat' => $request->alamat,
                'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('mustahik.index')
            ->with('success', 'Data mustahik berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function show($id)
    {
        $mustahik = MustahikWarga::findOrFail($id);
        return view('mustahik.show', compact('mustahik'));
    }

    public function edit($id)
    {
        $mustahik = MustahikWarga::findOrFail($id);
        $kategori = KategoriMustahik::all();
        
        return view('mustahik.edit', compact('mustahik', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        // Pastikan user masih terautentikasi
        if (!auth()->check()) {
            return redirect()->route('login')
                ->with('error', 'Sesi login Anda telah berakhir. Silakan login kembali.');
        }
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'nullable|string|max:16',
            'kategori' => 'required|string|max:255',
            'hak' => 'required|integer',
            'alamat' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        try {
        $mustahik = MustahikWarga::findOrFail($id);
        $mustahik->update([
            'nama' => $request->nama,
                'nik' => $request->nik,
            'kategori' => $request->kategori,
            'hak' => $request->hak,
                'alamat' => $request->alamat,
                'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('mustahik.index')
            ->with('success', 'Data mustahik berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        $mustahik = MustahikWarga::findOrFail($id);
        $mustahik->delete();

        return redirect()->route('mustahik.index')
            ->with('success', 'Data mustahik berhasil dihapus!');
    }

    /**
     * Mencari data mustahik berdasarkan nama
     */
    public function search(Request $request)
    {
        $term = $request->input('term');
        
        $mustahiks = MustahikWarga::where('nama', 'LIKE', '%' . $term . '%')
            ->limit(10)
            ->get();
        
        $result = [];
        
        foreach ($mustahiks as $mustahik) {
            // Cek apakah mustahik sudah menerima distribusi
            $sudahMenerimaDistribusi = DB::table('distribusi')
                ->where('nama_mustahik', $mustahik->nama)
                ->exists();
                
            $result[] = [
                'id' => $mustahik->id,
                'value' => $mustahik->nama,
                'kategori' => $mustahik->kategori,
                'nik' => $mustahik->nik,
                'hak' => $mustahik->hak,
                'alamat' => $mustahik->alamat,
                'keterangan' => $mustahik->keterangan,
                'status_distribusi' => $sudahMenerimaDistribusi
            ];
        }
        
        return response()->json($result);
    }
} 