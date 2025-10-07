<?php

namespace App\Http\Controllers;

use App\Models\Muzakki;
use Illuminate\Http\Request;

class MuzakkiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $muzakkis = Muzakki::all();
        return view('muzakki.index', compact('muzakkis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('muzakki.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_muzakki' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'jumlah_tanggungan' => 'required|integer|min:1',
            'keterangan' => 'nullable|string'
        ]);

        Muzakki::create($validated);

        return redirect()->route('muzakki.index')
            ->with('success', 'Data muzakki berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Muzakki $muzakki)
    {
        // Ambil riwayat pembayaran zakat dari muzakki
        $pembayaranZakat = $muzakki->bayarzakat()->latest()->get();
        
        return view('muzakki.show', compact('muzakki', 'pembayaranZakat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Muzakki $muzakki)
    {
        return view('muzakki.edit', compact('muzakki'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Muzakki $muzakki)
    {
        $validated = $request->validate([
            'nama_muzakki' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'jumlah_tanggungan' => 'required|integer|min:1',
            'keterangan' => 'nullable|string'
        ]);

        $muzakki->update($validated);

        return redirect()->route('muzakki.index')
            ->with('success', 'Data muzakki berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Muzakki $muzakki)
    {
        $muzakki->delete();

        return redirect()->route('muzakki.index')
            ->with('success', 'Data muzakki berhasil dihapus.');
    }
    
    /**
     * Search muzakki for AJAX
     */
    public function search(Request $request)
    {
        $term = $request->input('term');
        $checkPayment = $request->boolean('check_payment', false);
        $period = $request->input('period', date('Y'));
        
        $muzakkis = Muzakki::where('nama_muzakki', 'LIKE', '%' . $term . '%')
            ->orWhere('id_muzakki', 'LIKE', '%' . $term . '%')
            ->get();
            
        $result = [];
        foreach($muzakkis as $muzakki) {
            // Cek apakah muzakki sudah bayar zakat pada periode yang ditentukan
            $sudahBayar = false;
            
            if ($checkPayment) {
                // Gunakan metode sudahBayar dari model
                $sudahBayar = $muzakki->sudahBayar($period);
            }
            
            $result[] = [
                'id' => $muzakki->id_muzakki,
                'value' => $muzakki->nama_muzakki,
                'jumlah_tanggungan' => $muzakki->jumlah_tanggungan,
                'alamat' => $muzakki->alamat,
                'status_bayar' => $sudahBayar
            ];
        }
        
        return response()->json($result);
    }
} 