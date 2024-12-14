<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_makanan',
        'nama_makanan',
        'rincian',
        'harga',
    ];

    public function penjualans()
    {
        // Change the foreign key to 'nama_makanan'
        return $this->hasMany(Penjualan::class, 'nama_produk', 'nama_makanan');
    }
}
