<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasok;

class PemasokController extends Controller
{
    public function index()
    {
        $pemasoks = Pemasok::all();
        return view('data.pemasok', compact('pemasoks'));
    }

    public function edit($id)
    {
        $pemasok = Pemasok::findOrFail($id);
        return view('data.pemasok-edit', compact('pemasok'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_pemasok' => 'required|string|max:255',
            'nama_pemasok' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string',
        ]);

        $pemasok = Pemasok::findOrFail($id);
        $pemasok->update($request->all());

        return redirect()->route('data.pemasok')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pemasok = Pemasok::findOrFail($id);
        $pemasok->delete();

        return redirect()->route('data.pemasok')->with('success', 'Data berhasil dihapus!');
    }
}
