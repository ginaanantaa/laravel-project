<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all();
        return view('data.karyawan', compact('karyawans'));
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('data.karyawan-edit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_karyawan' => 'required|string|max:255',
            'nama_karyawan' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->all());

        return redirect()->route('data.karyawan')->with('success', 'Data karyawan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('data.karyawan')->with('success', 'Data karyawan berhasil dihapus!');
    }
}
