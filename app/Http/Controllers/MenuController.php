<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('data.menu', compact('menus'));
    }

    public function create()
    {
        return view('data.menu-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_makanan' => 'required|string|max:50|unique:menus,kode_makanan',
            'nama_makanan' => 'required|string|max:255',
            'rincian' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
        ]);

        Menu::create($request->all());

        return redirect()->route('data.menu')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('data.menu-edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'kode_makanan' => 'required|string|max:50|unique:menus,kode_makanan,' . $menu->id,
            'nama_makanan' => 'required|string|max:255',
            'rincian' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
        ]);

        $menu->update($request->all());

        return redirect()->route('data.menu')->with('success', 'Menu berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('data.menu')->with('success', 'Menu berhasil dihapus!');
    }
}
