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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('kode_karyawan')->unique(); // Unique code for karyawan
            $table->string('nama_karyawan'); // Name of the employee
            $table->string('jabatan'); // Job position
            $table->string('nomor_telepon'); // Employee's phone number
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
