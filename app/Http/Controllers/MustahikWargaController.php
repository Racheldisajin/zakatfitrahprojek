<?php

namespace App\Http\Controllers;

use App\Models\MustahikWarga;
use App\Models\KategoriMustahik;
use Illuminate\Http\Request;

class MustahikWargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mustahiks = MustahikWarga::all();
        return view('mustahik-warga.index', compact('mustahiks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = KategoriMustahik::all();
        return view('mustahik-warga.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'hak' => 'required|integer|min:1'
        ]);

        MustahikWarga::create($validated);

        return redirect()->route('mustahik-warga.index')
            ->with('success', 'Data mustahik warga berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MustahikWarga $mustahikWarga)
    {
        return view('mustahik-warga.show', compact('mustahikWarga'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MustahikWarga $mustahikWarga)
    {
        $kategoris = KategoriMustahik::all();
        return view('mustahik-warga.edit', compact('mustahikWarga', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MustahikWarga $mustahikWarga)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'hak' => 'required|integer|min:1'
        ]);

        $mustahikWarga->update($validated);

        return redirect()->route('mustahik-warga.index')
            ->with('success', 'Data mustahik warga berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MustahikWarga $mustahikWarga)
    {
        $mustahikWarga->delete();

        return redirect()->route('mustahik-warga.index')
            ->with('success', 'Data mustahik warga berhasil dihapus.');
    }
} 