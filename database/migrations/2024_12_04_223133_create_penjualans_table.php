<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->date('tanggal');
            $table->integer('banyak_terjual');
            $table->integer('harga_per_unit');
            $table->integer('durasi_penjualan');
            $table->string('bulan_periode');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
