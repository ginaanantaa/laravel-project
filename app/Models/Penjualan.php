<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'tanggal',
        'banyak_terjual',
        'harga_per_unit',
        'durasi_penjualan',
        'bulan_periode',
    ];
}
