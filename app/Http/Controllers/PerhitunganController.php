<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;

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

    // Method to show the result page with clustering results
    public function result()
    {
        // Retrieve the clusters from the session
        $clusters = session('clusters');

        // If clusters are not found, redirect to the processing page
        if (!$clusters) {
            return redirect()->route('perhitungan.processing');
        }

        // Return the result view with the clusters
        return view('perhitungan.result', compact('clusters'));
    }

    // Perform the clustering analysis on the data
    private function performClustering($penjualans)
    {
        // Map the data for clustering - assuming both 'banyak_terjual' and 'durasi_penjualan' are used
        $data = $penjualans->map(function ($penjualan) {
            return [
                'nama_produk' => $penjualan->nama_produk,
                'banyak_terjual' => $penjualan->banyak_terjual,
                'durasi_penjualan' => $penjualan->durasi_penjualan,
            ];
        });

        // Perform clustering with custom logic
        $clusters = $this->customClustering($data);

        // Store the clusters in the session for later use on the result page
        session(['clusters' => $clusters]);

        return $clusters;
    }

    // Custom clustering function based on both 'banyak_terjual' and 'durasi_penjualan'
    private function customClustering($data)
    {
        // Define the cluster thresholds based on the 'banyak_terjual' and 'durasi_penjualan' 
        $clusters = [
            'Menu Favorit' => [],
            'Menu Sedang' => [],
            'Menu Kurang Favorit' => [],
        ];

        // Define the criteria for clustering based on 'banyak_terjual' and 'durasi_penjualan'
        foreach ($data as $item) {
            if ($item['banyak_terjual'] >= 85 + ((140 - 85) / 2) && $item['durasi_penjualan'] == 1) {
                $clusters['Menu Favorit'][] = $item;
            } elseif ($item['banyak_terjual'] >= 5 + ((85 - 5) / 2) && $item['banyak_terjual'] < 140 && $item['durasi_penjualan'] == 1) {
                $clusters['Menu Sedang'][] = $item;
            } else {
                $clusters['Menu Kurang Favorit'][] = $item;
            }
        }

        return $clusters;
    }
}
