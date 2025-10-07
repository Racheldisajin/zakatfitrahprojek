<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BayarZakat extends Model
{
    use HasFactory;

    protected $table = 'bayarzakat';
    protected $primaryKey = 'id_zakat';
    
    protected $fillable = [
        'nama_kk',
        'jumlah_tanggungan',
        'jenis_bayar',
        'bayar_beras',
        'bayar_uang',
    ];
    
    /**
     * Mendapatkan muzakki yang membayar zakat ini.
     */
    public function muzakki()
    {
        return $this->belongsTo(Muzakki::class, 'nama_kk', 'nama_muzakki');
    }
} 