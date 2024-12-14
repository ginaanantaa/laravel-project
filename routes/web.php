<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\DataController;  // Import the DataController
use App\Http\Controllers\InputController;  // Import the InputController
use App\Http\Controllers\MenuController;  // Import the MenuController

use App\Http\Controllers\PerhitunganController;  // Import the PerhitunganController
use App\Http\Controllers\BahanController;  // Import the BahanController
use App\Http\Controllers\PenjualanController;  // Import the PenjualanController
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\KaryawanController;

Route::get('/welcomes', function () {
    return view('welcomes');
});

Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'show'])->name('about');

// Data Routes
Route::get('/data/menu', [DataController::class, 'menu'])->name('data.menu');
Route::get('/data/bahan', [DataController::class, 'bahan'])->name('data.bahan');
Route::get('/data/pemasok', [DataController::class, 'pemasok'])->name('data.pemasok');
Route::get('/data/karyawan', [DataController::class, 'karyawan'])->name('data.karyawan');
Route::get('/data/inventaris', [DataController::class, 'inventaris'])->name('data.inventaris');
Route::get('/data/penjualan', [DataController::class, 'penjualan'])->name('data.penjualan');

// Input Routes

Route::get('/input/menu', [InputController::class, 'menu'])->name('input.menu');
Route::post('/input/menu', [InputController::class, 'submitMenu'])->name('input.menu.submit');

Route::get('/input/bahan', [InputController::class, 'bahan'])->name('input.bahan');
Route::post('/input/bahan', [InputController::class, 'submitBahan'])->name('input.bahan.submit');

Route::get('/input/pemasok', [InputController::class, 'pemasok'])->name('input.pemasok');
Route::post('/input/pemasok', [InputController::class, 'submitPemasok'])->name('input.pemasok.submit');

Route::get('/input/karyawan', [InputController::class, 'karyawan'])->name('input.karyawan');
Route::post('/input/karyawan', [InputController::class, 'submitKaryawan'])->name('input.karyawan.submit');

Route::get('/input/inventaris', [InputController::class, 'inventaris'])->name('input.inventaris');
Route::post('/input/inventaris', [InputController::class, 'submitInventaris'])->name('input.inventaris.submit');

Route::get('/input/penjualan', [InputController::class, 'penjualan'])->name('input.penjualan');
Route::post('/input/penjualan', [InputController::class, 'submitPenjualan'])->name('input.penjualan.submit');

// Menu Routes
Route::get('/data/menu', [MenuController::class, 'index'])->name('data.menu');
Route::get('/data/menu/{id}/edit', [MenuController::class, 'edit'])->name('data.menu.edit');
Route::put('/data/menu/{id}', [MenuController::class, 'update'])->name('data.menu.update');
Route::delete('/data/menu/{id}', [MenuController::class, 'destroy'])->name('data.menu.destroy');

// Penjualan Routes
Route::get('/data/penjualan', [PenjualanController::class, 'index'])->name('data.penjualan');
Route::get('/data/penjualan/{id}/edit', [PenjualanController::class, 'edit'])->name('data.penjualan.edit');
Route::put('/data/penjualan/{id}', [PenjualanController::class, 'update'])->name('data.penjualan.update');
Route::delete('/data/penjualan/{id}', [PenjualanController::class, 'destroy'])->name('data.penjualan.destroy');

// Bahan Routes
Route::get('/data/bahan', [BahanController::class, 'index'])->name('data.bahan');
Route::get('/data/bahan/{id}/edit', [BahanController::class, 'edit'])->name('data.bahan.edit');
Route::put('/data/bahan/{id}', [BahanController::class, 'update'])->name('data.bahan.update');
Route::delete('/data/bahan/{id}', [BahanController::class, 'destroy'])->name('data.bahan.destroy');

// Pemasok Routes
Route::get('/data/pemasok', [PemasokController::class, 'index'])->name('data.pemasok');
Route::get('/data/pemasok/{id}/edit', [PemasokController::class, 'edit'])->name('data.pemasok.edit');
Route::put('/data/pemasok/{id}', [PemasokController::class, 'update'])->name('data.pemasok.update');
Route::delete('/data/pemasok/{id}', [PemasokController::class, 'destroy'])->name('data.pemasok.destroy');

// Karyawan Routes
Route::get('/data/karyawan', [KaryawanController::class, 'index'])->name('data.karyawan');
Route::get('/data/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('data.karyawan.edit');
Route::put('/data/karyawan/{id}', [KaryawanController::class, 'update'])->name('data.karyawan.update');
Route::delete('/data/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('data.karyawan.destroy');

// Inventaris Routes
Route::get('/data/inventaris', [InventarisController::class, 'index'])->name('data.inventaris');
Route::get('/data/inventaris/{id}/edit', [InventarisController::class, 'edit'])->name('data.inventaris.edit');
Route::put('/data/inventaris/{id}', [InventarisController::class, 'update'])->name('data.inventaris.update');
Route::delete('/data/inventaris/{id}', [InventarisController::class, 'destroy'])->name('data.inventaris.destroy');


// Perhitungan Route
Route::get('/perhitungan/processing', [PerhitunganController::class, 'processing'])->name('perhitungan.processing');
Route::get('/perhitungan/result', [PerhitunganController::class, 'result'])->name('perhitungan.result');

Route::get('/', [PerhitunganController::class, 'landing'])->name('landing');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Define the logout route if you want custom behavior or leave it as is
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
