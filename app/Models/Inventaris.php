<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'inventaris';  // Table name

    // Specify the fields that are mass assignable
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'jumlah',
        'kondisi',
    ];
}
