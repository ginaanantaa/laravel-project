<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\DataController;  // Import the DataController
use App\Http\Controllers\InputController;  // Import the InputController

use App\Http\Controllers\MenuController;  // Import the MenuController

Route::get('/', function () {
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

// Menu Routes
Route::get('/data/menu', [MenuController::class, 'index'])->name('data.menu');
Route::get('/data/menu/{id}/edit', [MenuController::class, 'edit'])->name('data.menu.edit');
Route::put('/data/menu/{id}', [MenuController::class, 'update'])->name('data.menu.update');
Route::delete('/data/menu/{id}', [MenuController::class, 'destroy'])->name('data.menu.destroy');
