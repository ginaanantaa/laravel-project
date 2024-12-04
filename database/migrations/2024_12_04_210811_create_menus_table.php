<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id(); // auto-incrementing ID
            $table->string('kode_makanan'); // to store the food code
            $table->string('nama_makanan'); // to store the food name
            $table->text('rincian'); // to store the food details
            $table->decimal('harga', 10, 2); // price with 10 digits and 2 decimal places
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus'); // drop the table if rollback is triggered
    }
}
