<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemasoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasoks', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('kode_pemasok')->unique(); // Unique identifier for the supplier
            $table->string('nama_pemasok'); // Name of the supplier
            $table->text('alamat'); // Address of the supplier
            $table->string('nomor_telepon'); // Phone number of the supplier
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemasoks');
    }
}
