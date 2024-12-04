<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'pemasoks';  // If your table is named 'pemasoks'

    // Specify the fields that are mass assignable
    protected $fillable = [
        'kode_pemasok',
        'nama_pemasok',
        'alamat',
        'nomor_telepon'
    ];
}
