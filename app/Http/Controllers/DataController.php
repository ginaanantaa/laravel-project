<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu; // Assuming you have a Menu model to fetch menu data
// use App\Models\Bahan; // Ensure the correct model is imported
// use App\Models\Pemasok; // Ensure the correct model is imported
// use App\Models\Karyawan; // Ensure the correct model is imported
// use App\Models\Inventaris; // Ensure the correct model is imported
// use App\Models\Penjualan; // Ensure the correct model is imported

class DataController extends Controller
{
    // Display the menu data
    public function menu()
    {
        $menus = Menu::all(); // Fetch all menu data from the database
        return view('data.menu', compact('menus'));
    }

    // // Display the bahan data
    // public function bahan()
    // {
    //     // Example: Fetch bahan data
    //     $bahans = Bahan::all(); // Replace with actual model for bahan
    //     return view('data.bahan', compact('bahans'));
    // }

    // // Display the pemasok data
    // public function pemasok()
    // {
    //     $pemasoks = Pemasok::all(); // Replace with actual model for pemasok
    //     return view('data.pemasok', compact('pemasoks'));
    // }

    // // Display the karyawan data
    // public function karyawan()
    // {
    //     $karyawans = Karyawan::all(); // Replace with actual model for karyawan
    //     return view('data.karyawan', compact('karyawans'));
    // }

    // // Display the inventaris data
    // public function inventaris()
    // {
    //     $inventaris = Inventaris::all(); // Replace with actual model for inventaris
    //     return view('data.inventaris', compact('inventaris'));
    // }

    // // Display the penjualan data
    // public function penjualan()
    // {
    //     $penjualans = Penjualan::all(); // Fetch all penjualan records
    //     return view('data.penjualan', compact('penjualans'));
    // }

    // // Edit a specific penjualan record
    // public function edit($id)
    // {
    //     $penjualan = Penjualan::findOrFail($id); // Find the record or fail
    //     return view('data.penjualan-edit', compact('penjualan'));
    // }

    // // Update the record
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'nama_produk' => 'required|string|max:255',
    //         'tanggal' => 'required|date',
    //         'banyak_terjual' => 'required|integer',
    //         'harga_per_unit' => 'required|numeric',
    //         'durasi_penjualan' => 'required|integer',
    //         'bulan_periode' => 'required|string|max:50',
    //     ]);

    //     $penjualan = Penjualan::findOrFail($id);
    //     $penjualan->update($request->all());

    //     return redirect()->route('data.penjualan')->with('success', 'Data berhasil diperbarui!');
    // }

    // // Delete a record
    // public function destroy($id)
    // {
    //     $penjualan = Penjualan::findOrFail($id); // Find the record or fail
    //     $penjualan->delete(); // Delete the record

    //     return redirect()->route('data.penjualan')->with('success', 'Data berhasil dihapus!');
    // }
}
