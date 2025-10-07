<?php

namespace App\Http\Controllers;

use App\Models\MustahikLainnya;
use App\Models\KategoriMustahik;
use Illuminate\Http\Request;

class MustahikLainnyaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mustahiks = MustahikLainnya::all();
        return view('mustahik-lainnya.index', compact('mustahiks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = KategoriMustahik::whereIn('nama_kategori', ['Amilin', 'Fisabilillah', 'Mualaf', 'Ibnu Sabil'])->get();
        return view('mustahik-lainnya.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255|in:Amilin,Fisabilillah,Mualaf,Ibnu Sabil',
            'hak' => 'required|integer|min:1'
        ]);

        MustahikLainnya::create($validated);

        return redirect()->route('mustahik-lainnya.index')
            ->with('success', 'Data mustahik lainnya berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MustahikLainnya $mustahikLainnya)
    {
        return view('mustahik-lainnya.show', compact('mustahikLainnya'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MustahikLainnya $mustahikLainnya)
    {
        $kategoris = KategoriMustahik::whereIn('nama_kategori', ['Amilin', 'Fisabilillah', 'Mualaf', 'Ibnu Sabil'])->get();
        return view('mustahik-lainnya.edit', compact('mustahikLainnya', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MustahikLainnya $mustahikLainnya)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255|in:Amilin,Fisabilillah,Mualaf,Ibnu Sabil',
            'hak' => 'required|integer|min:1'
        ]);

        $mustahikLainnya->update($validated);

        return redirect()->route('mustahik-lainnya.index')
            ->with('success', 'Data mustahik lainnya berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MustahikLainnya $mustahikLainnya)
    {
        $mustahikLainnya->delete();

        return redirect()->route('mustahik-lainnya.index')
            ->with('success', 'Data mustahik lainnya berhasil dihapus.');
    }
} 