<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Penjualan;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['nama_produk' => 'Bubur Pedas', 'tanggal' => '2024-10-01', 'banyak_terjual' => 140, 'harga_per_unit' => 14000, 'durasi_penjualan' => 1, 'bulan_periode' => 'Oktober 2024'],
            ['nama_produk' => 'Mie Sagu Goreng', 'tanggal' => '2024-10-02', 'banyak_terjual' => 120, 'harga_per_unit' => 14000, 'durasi_penjualan' => 1, 'bulan_periode' => 'Oktober 2024'],
            ['nama_produk' => 'Mie Ayam Pangsit', 'tanggal' => '2024-10-03', 'banyak_terjual' => 25, 'harga_per_unit' => 15000, 'durasi_penjualan' => 1, 'bulan_periode' => 'Oktober 2024'],
            ['nama_produk' => 'Indomie Telor', 'tanggal' => '2024-10-04', 'banyak_terjual' => 18, 'harga_per_unit' => 12000, 'durasi_penjualan' => 1, 'bulan_periode' => 'Oktober 2024'],
            ['nama_produk' => 'Bubur Nasi Daging Sapi', 'tanggal' => '2024-10-05', 'banyak_terjual' => 95, 'harga_per_unit' => 11000, 'durasi_penjualan' => 1, 'bulan_periode' => 'Oktober 2024'],
            ['nama_produk' => 'Pentol Kuah', 'tanggal' => '2024-10-06', 'banyak_terjual' => 5, 'harga_per_unit' => 11000, 'durasi_penjualan' => 1, 'bulan_periode' => 'Oktober 2024'],
            ['nama_produk' => 'Bubur Pedas', 'tanggal' => '2024-10-07', 'banyak_terjual' => 130, 'harga_per_unit' => 14000, 'durasi_penjualan' => 1, 'bulan_periode' => 'Oktober 2024'],
            ['nama_produk' => 'Mie Sagu Goreng', 'tanggal' => '2024-10-08', 'banyak_terjual' => 120, 'harga_per_unit' => 14000, 'durasi_penjualan' => 1, 'bulan_periode' => 'Oktober 2024'],
            ['nama_produk' => 'Mie Sagu Rebus', 'tanggal' => '2024-10-09', 'banyak_terjual' => 100, 'harga_per_unit' => 13000, 'durasi_penjualan' => 1, 'bulan_periode' => 'Oktober 2024'],
            ['nama_produk' => 'Mie Ayam Pangsit', 'tanggal' => '2024-10-10', 'banyak_terjual' => 20, 'harga_per_unit' => 15000, 'durasi_penjualan' => 1, 'bulan_periode' => 'Oktober 2024'],
            ['nama_produk' => 'Bubur Nasi Daging Sapi', 'tanggal' => '2024-10-11', 'banyak_terjual' => 85, 'harga_per_unit' => 11000, 'durasi_penjualan' => 1, 'bulan_periode' => 'Oktober 2024'],
            ['nama_produk' => 'Indomie Telor', 'tanggal' => '2024-10-12', 'banyak_terjual' => 20, 'harga_per_unit' => 12000, 'durasi_penjualan' => 1, 'bulan_periode' => 'Oktober 2024'],
        ];

        Penjualan::insert($data);
    }
}
