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
        // Map the data for clustering - assuming 'banyak_terjual' as the key for clustering
        $data = $penjualans->map(function ($penjualan) {
            return [
                'nama_produk' => $penjualan->nama_produk,
                'banyak_terjual' => $penjualan->banyak_terjual,
            ];
        });

        // Perform a basic clustering (e.g., K-means with 3 clusters)
        $clusters = $this->kMeansClustering($data, 3);

        // Store the clusters in the session for later use on the result page
        session(['clusters' => $clusters]);

        return $clusters;
    }

    // A basic clustering function (e.g., K-means with 3 clusters based on 'banyak_terjual')
    private function kMeansClustering($data, $k)
    {
        // Sort the data by 'banyak_terjual'
        $sortedData = $data->sortBy('banyak_terjual');

        // Calculate the size of each cluster
        $size = $sortedData->count();
        $lowThreshold = $sortedData->values()[floor($size / 3)]['banyak_terjual'];
        $highThreshold = $sortedData->values()[floor((2 * $size) / 3)]['banyak_terjual'];

        $clusters = [
            'Cluster 1 (Low)' => [],
            'Cluster 2 (Medium)' => [],
            'Cluster 3 (High)' => [],
        ];

        // Group data into clusters based on thresholds
        foreach ($data as $item) {
            if ($item['banyak_terjual'] <= $lowThreshold) {
                $clusters['Cluster 1 (Low)'][] = $item;
            } elseif ($item['banyak_terjual'] <= $highThreshold) {
                $clusters['Cluster 2 (Medium)'][] = $item;
            } else {
                $clusters['Cluster 3 (High)'][] = $item;
            }
        }

        return $clusters;
    }
}
