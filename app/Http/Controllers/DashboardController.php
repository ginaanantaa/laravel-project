<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard with total sales.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Calculate the total sales by multiplying 'banyak_terjual' with 'harga_per_unit'
        $totalPenjualan = Penjualan::sum(DB::raw('banyak_terjual * harga_per_unit'));

        // Return the view with the totalPenjualan variable
        return view('dashboard', compact('totalPenjualan'));
    }
}
