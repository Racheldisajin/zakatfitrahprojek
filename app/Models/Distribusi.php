<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    use HasFactory;
    
    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'distribusi';
    
    /**
     * Kunci utama tabel
     *
     * @var string
     */
    protected $primaryKey = 'id_distribusi';
    
    /**
     * Atribut yang dapat diisi (mass assignable).
     *
     * @var array
     */
    protected $fillable = [
        'nama_mustahik',
        'kategori',
        'alamat',
        'kontak',
        'jenis_distribusi',
        'jumlah_uang',
        'jumlah_beras',
        'tanggal',
        'keterangan',
    ];

    /**
     * Atribut yang harus dikonversi ke tipe data tertentu.
     *
     * @var array
     */
    protected $casts = [
        'jumlah_uang' => 'integer',
        'jumlah_beras' => 'float',
        'tanggal' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}