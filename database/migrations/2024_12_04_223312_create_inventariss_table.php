<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique(); // Code of the item (e.g. IV-01)
            $table->string('nama_barang'); // Name of the item (e.g. Kompor Gas 2 Tungku)
            $table->integer('jumlah'); // Quantity of the item (e.g. 8)
            $table->string('kondisi'); // Condition of the item (e.g. Baik)
            $table->timestamps(); // To store the created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris');
    }
};
