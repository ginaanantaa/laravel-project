<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'karyawans';  // Replace with your actual table name

    // Specify the fields that are mass assignable
    protected $fillable = [
        'kode_karyawan',
        'nama_karyawan',
        'jabatan',
        'nomor_telepon'
    ];
}
