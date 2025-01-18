<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;
use App\Models\Bahan;
use App\Models\Pemasok;
use App\Models\Karyawan;
use App\Models\Inventaris;
use App\Models\Penjualan;


class InputController extends Controller
{
    // Example method for /input/menu
    // Method to display the menu input form
    public function menu()
    {
        // Fetch menu items from the database
        $menus = Menu::all(); // Or use a more specific query if needed

        // Pass the data to the view
        return view('input.menu', compact('menus'));
    }

    // Method to handle form submission
    public function submitMenu(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'kode_makanan' => 'required|string|max:255',
            'nama_makanan' => 'required|string|max:255',
            'rincian' => 'required|string',
            'harga' => 'required|numeric',
        ]);

        // Create a new menu item
        Menu::create([
            'kode_makanan' => $request->kode_makanan,
            'nama_makanan' => $request->nama_makanan,
            'rincian' => $request->rincian,
            'harga' => $request->harga,
        ]);

        // Optionally, redirect with a success message
        return redirect()->route('input.menu')->with('success', 'Menu item successfully added!');
    }

    // Show the form for adding bahan
    public function bahan()
    {
        /// Fetch distinct values for each dropdown field
        $kode_bahan = Bahan::select('kode_bahan')->distinct()->get();
        $nama_bahan = Bahan::select('nama_bahan')->distinct()->get();
        $satuan = Bahan::select('satuan')->distinct()->get();
        $stok = Bahan::select('stok')->distinct()->get();
        $harga = Bahan::select('harga')->distinct()->get();

        // Pass the data to the view
        return view('input.bahan', compact('kode_bahan', 'nama_bahan', 'satuan', 'stok', 'harga'));
    }

    // Handle the form submission to add a bahan (ingredient)
    public function submitBahan(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'kode_bahan' => 'required|string|max:50',
            'nama_bahan' => 'required|string|max:100',
            'satuan' => 'required|string|max:20',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        // Create a new bahan (ingredient)
        Bahan::create([
            'kode_bahan' => $request->kode_bahan,
            'nama_bahan' => $request->nama_bahan,
            'satuan' => $request->satuan,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        // Redirect back with success message
        return redirect()->route('input.bahan')->with('success', 'Bahan item successfully added!');
    }

    public function pemasok()
    {
        // Fetch distinct values for each dropdown field
        $kode_pemasok = Pemasok::select('kode_pemasok')->distinct()->get();
        $nama_pemasok = Pemasok::select('nama_pemasok')->distinct()->get();
        $alamat = Pemasok::select('alamat')->distinct()->get();
        $nomor_telepon = Pemasok::select('nomor_telepon')->distinct()->get();

        // Pass the data to the view
        return view('input.pemasok', compact('kode_pemasok', 'nama_pemasok', 'alamat', 'nomor_telepon'));
    }

    public function submitPemasok(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'kode_pemasok' => 'required|string|max:50',
            'nama_pemasok' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        // Create a new pemasok
        Pemasok::create([
            'kode_pemasok' => $request->kode_pemasok,
            'nama_pemasok' => $request->nama_pemasok,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
        ]);

        // Redirect with a success message
        return redirect()->route('input.pemasok')->with('success', 'Pemasok successfully added!');
    }

    public function karyawan()
    {
        // Fetch distinct values for each dropdown field
        $kode_karyawan = Karyawan::select('kode_karyawan')->distinct()->get();
        $nama_karyawan = Karyawan::select('nama_karyawan')->distinct()->get();
        $jabatan = Karyawan::select('jabatan')->distinct()->get();
        $nomor_telepon = Karyawan::select('nomor_telepon')->distinct()->get();

        // Pass the data to the view
        return view('input.karyawan', compact('kode_karyawan', 'nama_karyawan', 'jabatan', 'nomor_telepon'));
    }

    // Handle the submission of karyawan form
    public function submitKaryawan(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'kode_karyawan' => 'required|string|max:50',
            'nama_karyawan' => 'required|string|max:100',
            'jabatan' => 'required|string|max:50',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        // Create a new karyawan
        Karyawan::create([
            'kode_karyawan' => $request->kode_karyawan,
            'nama_karyawan' => $request->nama_karyawan,
            'jabatan' => $request->jabatan,
            'nomor_telepon' => $request->nomor_telepon,
        ]);

        // Redirect with a success message
        return redirect()->route('input.karyawan')->with('success', 'Karyawan successfully added!');
    }

    // Display the form for adding inventory
    public function inventaris()
    {
        // Fetch distinct values for dropdowns
        $kode_barang = Inventaris::select('kode_barang')->distinct()->get();
        $nama_barang = Inventaris::select('nama_barang')->distinct()->get();
        $jumlah = Inventaris::select('jumlah')->distinct()->get();
        $kondisi = Inventaris::select('kondisi')->distinct()->get();

        // Pass the data to the view
        return view('input.inventaris', compact('kode_barang', 'nama_barang', 'jumlah', 'kondisi'));
    }

    // Handle the form submission for inventory
    public function submitInventaris(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'kode_barang' => 'required|string|max:50',
            'nama_barang' => 'required|string|max:100',
            'jumlah' => 'required|integer',
            'kondisi' => 'required|string|max:50',
        ]);

        // Create a new inventaris
        Inventaris::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'kondisi' => $request->kondisi,
        ]);

        // Redirect with a success message
        return redirect()->route('input.inventaris')->with('success', 'Inventaris successfully added!');
    }

    // Show the form for adding penjualan
    public function penjualan()
    {
        return view('input.penjualan');
    }

    // Handle the form submission for penjualan
    public function submitPenjualan(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'nama_produk' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'banyak_terjual' => 'required|integer',
            'harga_per_unit' => 'required|integer',
            'durasi_penjualan' => 'required|integer',
            'bulan_periode' => 'required|string|max:50',
        ]);

        // Create a new penjualan
        Penjualan::create([
            'nama_produk' => $request->nama_produk,
            'tanggal' => $request->tanggal,
            'banyak_terjual' => $request->banyak_terjual,
            'harga_per_unit' => $request->harga_per_unit,
            'durasi_penjualan' => $request->durasi_penjualan,
            'bulan_periode' => $request->bulan_periode,
        ]);

        // Redirect with a success message
        return redirect()->route('input.penjualan')->with('success', 'Penjualan berhasil ditambahkan!');
    }
}
