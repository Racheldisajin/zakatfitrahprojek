<?php

namespace Database\Seeders;

use App\Models\KategoriMustahik;
use Illuminate\Database\Seeder;

class KategoriMustahikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus semua data kategori mustahik yang ada terlebih dahulu
        KategoriMustahik::truncate();
        
        $kategoris = [
            [
                'nama_kategori' => 'Fakir',
                'jumlah_hak' => 40, // 40% dari total zakat
            ],
            [
                'nama_kategori' => 'Miskin',
                'jumlah_hak' => 40, // 40% dari total zakat
            ],
            [
                'nama_kategori' => 'Amil',
                'jumlah_hak' => 10, // 10% dari total zakat
            ],
            [
                'nama_kategori' => 'Mualaf',
                'jumlah_hak' => 2, // 2% dari total zakat
            ],
            [
                'nama_kategori' => 'Riqab',
                'jumlah_hak' => 1, // 1% dari total zakat
            ],
            [
                'nama_kategori' => 'Gharimin',
                'jumlah_hak' => 1, // 1% dari total zakat
            ],
            [
                'nama_kategori' => 'Fisabilillah',
                'jumlah_hak' => 5, // 5% dari total zakat
            ],
            [
                'nama_kategori' => 'Ibnu Sabil',
                'jumlah_hak' => 1, // 1% dari total zakat
            ],
        ];

        foreach ($kategoris as $kategori) {
            KategoriMustahik::create($kategori);
        }
    }
} 