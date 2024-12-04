<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bahan;

class BahanController extends Controller
{
    public function index()
    {
        $bahans = Bahan::all();
        return view('data.bahan', compact('bahans'));
    }

    public function edit($id)
    {
        $bahan = Bahan::findOrFail($id);
        return view('data.bahan-edit', compact('bahan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_bahan' => 'required|string|max:50',
            'nama_bahan' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $bahan = Bahan::findOrFail($id);
        $bahan->update($request->all());

        return redirect()->route('data.bahan')->with('success', 'Bahan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $bahan = Bahan::findOrFail($id);
        $bahan->delete();

        return redirect()->route('data.bahan')->with('success', 'Bahan berhasil dihapus!');
    }
}
