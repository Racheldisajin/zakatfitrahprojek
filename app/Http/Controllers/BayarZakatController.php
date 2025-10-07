<?php

namespace App\Http\Controllers;

use App\Models\BayarZakat;
use Illuminate\Http\Request;

class BayarZakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zakatList = BayarZakat::latest()->get();
        return view('bayarzakat.index', compact('zakatList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bayarzakat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kk' => 'required|string|max:255',
            'jumlah_tanggungan' => 'required|integer|min:1',
            'jenis_bayar' => 'required|in:beras,uang',
            'bayar_beras' => 'nullable|numeric|required_if:jenis_bayar,beras',
            'bayar_uang' => 'nullable|numeric|required_if:jenis_bayar,uang',
        ]);

        BayarZakat::create($validated);

        return redirect()->route('bayarzakat.index')
            ->with('success', 'Pembayaran zakat berhasil dicatat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BayarZakat $bayarzakat)
    {
        return view('bayarzakat.show', compact('bayarzakat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BayarZakat $bayarzakat)
    {
        return view('bayarzakat.edit', compact('bayarzakat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BayarZakat $bayarzakat)
    {
        $validated = $request->validate([
            'nama_kk' => 'required|string|max:255',
            'jumlah_tanggungan' => 'required|integer|min:1',
            'jenis_bayar' => 'required|in:beras,uang',
            'bayar_beras' => 'nullable|numeric|required_if:jenis_bayar,beras',
            'bayar_uang' => 'nullable|numeric|required_if:jenis_bayar,uang',
        ]);

        $bayarzakat->update($validated);

        return redirect()->route('bayarzakat.index')
            ->with('success', 'Data pembayaran zakat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BayarZakat $bayarzakat)
    {
        $bayarzakat->delete();

        return redirect()->route('bayarzakat.index')
            ->with('success', 'Data pembayaran zakat berhasil dihapus.');
    }
} 