<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muzakki extends Model
{
    use HasFactory;

    protected $table = 'muzakki';
    protected $primaryKey = 'id_muzakki';
    
    protected $fillable = [
        'nama_muzakki',
        'alamat',
        'jumlah_tanggungan',
        'keterangan',
    ];
    
    /**
     * Mendapatkan semua pembayaran zakat dari muzakki ini.
     */
    public function bayarzakat()
    {
        return $this->hasMany(BayarZakat::class, 'nama_kk', 'nama_muzakki');
    }
    
    /**
     * Mengecek apakah muzakki sudah bayar di tahun/periode tertentu.
     *
     * @param string $year Tahun pembayaran yang ingin dicek
     * @return bool
     */
    public function sudahBayar($year = null)
    {
        $year = $year ?? date('Y');
        
        return $this->bayarzakat()
            ->whereYear('created_at', $year)
            ->exists();
    }
} 