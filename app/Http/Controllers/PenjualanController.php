<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::all();
        return view('data.penjualan', compact('penjualans'));
    }

    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        return view('data.penjualan-edit', compact('penjualan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'banyak_terjual' => 'required|integer',
            'harga_per_unit' => 'required|numeric',
            'durasi_penjualan' => 'required|integer',
            'bulan_periode' => 'required|string|max:50',
        ]);

        $penjualan = Penjualan::findOrFail($id);
        $penjualan->update($request->all());

        return redirect()->route('data.penjualan')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->delete();

        return redirect()->route('data.penjualan')->with('success', 'Data berhasil dihapus!');
    }
}
