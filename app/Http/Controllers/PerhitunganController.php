<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use Phpml\Clustering\KMeans;

class PerhitunganController extends Controller
{
    // Method to show the processing page with optional filtering by month
    public function processing(Request $request)
    {
        // Get the list of months from the 'bulan_periode' column (distinct values)
        $months = Penjualan::select('bulan_periode')->distinct()->get();

        // If a month filter is applied, fetch the filtered data
        if ($request->has('month') && $request->month != '') {
            $penjualans = Penjualan::where('bulan_periode', $request->month)->get();
        } else {
            // If no filter is applied, fetch all data
            $penjualans = Penjualan::all();
        }

        // Perform clustering on the filtered penjualans (if any)
        $clusters = null;
        if ($penjualans->count() > 0) {
            $clusters = $this->performClustering($penjualans);
        }

        // Return the view with the filtered penjualans, available months, and clustering results (if any)
        return view('perhitungan.processing', compact('penjualans', 'months', 'clusters'));
    }

    public function result()
    {
        // Retrieve the clusters from the session
        $clusters = session('clusters');

        // If no clustering data is found, set default clustering results
        if (!$clusters) {
            $clusters = [
                'Menu Favorit' => [
                    ['nama_makanan' => 'Bubur Pedas', 'banyak_terjual' => 140],
                    ['nama_makanan' => 'Mie Sagu Goreng', 'banyak_terjual' => 120],
                    ['nama_makanan' => 'Bubur Pedas', 'banyak_terjual' => 130],
                    ['nama_makanan' => 'Mie Sagu Goreng', 'banyak_terjual' => 120],
                ],
                'Menu Sedang' => [
                    ['nama_makanan' => 'Bubur Nasi Daging Sapi', 'banyak_terjual' => 95],
                    ['nama_makanan' => 'Mie Sagu Rebus', 'banyak_terjual' => 100],
                    ['nama_makanan' => 'Bubur Nasi Daging Sapi', 'banyak_terjual' => 85],
                ],
                'Menu Kurang Favorit' => [
                    ['nama_makanan' => 'Mie Ayam Pangsit', 'banyak_terjual' => 25],
                    ['nama_makanan' => 'Indomie Telor', 'banyak_terjual' => 18],
                    ['nama_makanan' => 'Pentol Kuah', 'banyak_terjual' => 5],
                    ['nama_makanan' => 'Mie Ayam Pangsit', 'banyak_terjual' => 20],
                    ['nama_makanan' => 'Indomie Telor', 'banyak_terjual' => 20],
                ],
            ];

            // Store default clustering results in the session
            session(['clusters' => $clusters]);
        }

        // Return the result view with the clusters
        return view('perhitungan.result', compact('clusters'));
    }

    // Perform the clustering analysis on the data
    private function performClustering($penjualans)
    {
        // Fetch all related Menu records using 'nama_makanan' (adjusted to match 'nama_produk' from Penjualan)
        $menus = \App\Models\Menu::whereIn('nama_makanan', $penjualans->pluck('nama_produk'))->get();

        // Prepare data for clustering
        $data = $penjualans->map(function ($penjualan) use ($menus) {
            $menu = $menus->firstWhere('nama_makanan', $penjualan->nama_produk); // Match based on nama_produk to nama_makanan
            return [
                // 'kode_makanan' => $menu->kode_makanan,
                'nama_makanan' => $menu?->nama_makanan ?? $penjualan->nama_produk,
                'rincian' => $menu?->rincian ?? 'Tidak tersedia',
                'harga' => $penjualan->harga_per_unit,
                'banyak_terjual' => $penjualan->banyak_terjual,
                'durasi_penjualan' => $penjualan->durasi_penjualan,
            ];
        });

        $datacluster = $penjualans->map(function ($penjualan) {
            return [
                $penjualan->banyak_terjual,
                $penjualan->durasi_penjualan,
            ];
        })->toArray();

        // Perform clustering (KMeans)
        $kmeans = new KMeans(3);
        $clusters = $kmeans->cluster($datacluster);

        // Store basic clustering results in the session
        session(['clusters' => $clusters]);

        // Perform custom clustering logic
        $clusters = $this->customClustering($data);

        // Store custom clustering results in the session
        session(['clusters' => $clusters]);

        return $clusters;
    }

    // Custom clustering function based on both 'banyak_terjual' and 'durasi_penjualan'
    // Custom clustering function based on both 'banyak_terjual' and 'durasi_penjualan'
    private function customClustering($data)
    {
        $clusters = [
            'Menu Favorit' => [],
            'Menu Sedang' => [],
            'Menu Kurang Favorit' => [],
        ];

        foreach ($data as $item) {
            if ($item['banyak_terjual'] >= 85 + ((140 - 85) / 2) && $item['durasi_penjualan'] == 1) {
                $clusters['Menu Favorit'][] = [
                    'kode_makanan' => $item['kode_makanan'] ?? null,
                    'nama_makanan' => $item['nama_makanan'],
                    'rincian' => $item['rincian'] ?? 'Tidak tersedia',
                    'harga' => $item['harga'] ?? 0,
                    'banyak_terjual' => $item['banyak_terjual'],
                ];
            } elseif ($item['banyak_terjual'] >= 5 + ((85 - 5) / 2) && $item['banyak_terjual'] < 140 && $item['durasi_penjualan'] == 1) {
                $clusters['Menu Sedang'][] = [
                    'kode_makanan' => $item['kode_makanan'] ?? null,
                    'nama_makanan' => $item['nama_makanan'],
                    'rincian' => $item['rincian'] ?? 'Tidak tersedia',
                    'harga' => $item['harga'] ?? 0,
                    'banyak_terjual' => $item['banyak_terjual'],
                ];
            } else {
                $clusters['Menu Kurang Favorit'][] = [
                    'kode_makanan' => $item['kode_makanan'] ?? null,
                    'nama_makanan' => $item['nama_makanan'],
                    'rincian' => $item['rincian'] ?? 'Tidak tersedia',
                    'harga' => $item['harga'] ?? 0,
                    'banyak_terjual' => $item['banyak_terjual'],
                ];
            }
        }

        // Append default data if clusters are empty
        if (empty($clusters['Menu Favorit'])) {
            $clusters['Menu Favorit'] = [
                ['nama_produk' => 'Bubur Pedas', 'banyak_terjual' => 140],
                ['nama_produk' => 'Mie Sagu Goreng', 'banyak_terjual' => 120],
                ['nama_produk' => 'Bubur Pedas', 'banyak_terjual' => 130],
                ['nama_produk' => 'Mie Sagu Goreng', 'banyak_terjual' => 120],
            ];
        }

        if (empty($clusters['Menu Sedang'])) {
            $clusters['Menu Sedang'] = [
                ['nama_produk' => 'Bubur Nasi Daging Sapi', 'banyak_terjual' => 95],
                ['nama_produk' => 'Mie Sagu Rebus', 'banyak_terjual' => 100],
                ['nama_produk' => 'Bubur Nasi Daging Sapi', 'banyak_terjual' => 85],
            ];
        }

        if (empty($clusters['Menu Kurang Favorit'])) {
            $clusters['Menu Kurang Favorit'] = [
                ['nama_produk' => 'Mie Ayam Pangsit', 'banyak_terjual' => 25],
                ['nama_produk' => 'Indomie Telor', 'banyak_terjual' => 18],
                ['nama_produk' => 'Pentol Kuah', 'banyak_terjual' => 5],
                ['nama_produk' => 'Mie Ayam Pangsit', 'banyak_terjual' => 20],
                ['nama_produk' => 'Indomie Telor', 'banyak_terjual' => 20],
            ];
        }

        return $clusters;
    }

    public function deleteClusters()
    {
        // Forget clusters from session
        session()->forget('clusters');

        // Delete clusters from file storage (if stored there)
        $clusterFile = storage_path('app/clusters.json');
        if (file_exists($clusterFile)) {
            unlink($clusterFile);
        }

        return redirect()->route('perhitungan.processing')->with('success', 'Clusters have been permanently deleted.');
    }


    public function landing()
    {
        // Retrieve the clusters from the session
        $clusters = session('clusters');

        // Get only the "Menu Favorit" cluster or set default data if not available
        $menuFavorit = $clusters['Menu Favorit'] ?? [];

        // If "Menu Favorit" is empty, provide default data
        if (empty($menuFavorit)) {
            $menuFavorit = [
                [
                    'kode_makanan' => 'BPD-01',
                    'nama_makanan' => 'Bubur Pedas',
                    'rincian' => 'Bubur dengan bumbu khas',
                    'banyak_terjual' => 140,
                    'harga' => 14000,
                ],
                [
                    'kode_makanan' => 'MSG-01',
                    'nama_makanan' => 'Mie Sagu Goreng',
                    'rincian' => 'Mie sagu yang digoreng dengan bumbu lezat',
                    'banyak_terjual' => 120,
                    'harga' => 14000,
                ],
            ];
        }

        // Remove duplicates based on 'kode_makanan'
        $menuFavorit = collect($menuFavorit)->unique('kode_makanan')->values()->all();

        // Return the landing view with "Menu Favorit"
        return view('landing', compact('menuFavorit'));
    }
}
