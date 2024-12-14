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
        'kode_makanan', // You can still keep this if you want to store it for reference.
    ];

    public function menu()
    {
        // Change the foreign key to 'nama_produk' and the local key to 'nama_makanan'
        return $this->belongsTo(Menu::class, 'nama_produk', 'nama_makanan');
    }
}
