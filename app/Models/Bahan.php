<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    // Specify the table name if it's different from the default (plural of the model name)
    protected $table = 'bahans';

    // Specify which fields are mass assignable
    protected $fillable = [
        'kode_bahan',
        'nama_bahan',
        'satuan',
        'stok',
        'harga',
    ];

    // Optional: If you want to prevent timestamps (created_at, updated_at) from being automatically managed
    // public $timestamps = false;
}
