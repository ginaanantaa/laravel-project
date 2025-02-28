<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Data Penjualan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #f7fafc;
            color: #2d3748;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 1000px;
            margin: 20px auto;
        }

        h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #1a202c;
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #e2e8f0;
        }

        table th {
            background-color: #ff7043;
            color: white;
            font-weight: 600;
        }

        table tr:nth-child(even) {
            background-color: #f7fafc;
        }

        table tr:nth-child(odd) {
            background-color: #ffffff;
        }

        table td {
            font-size: 1.125rem;
        }

        .btn {
            color: #2d3748;
            font-size: 1.125rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: auto;
            min-width: 160px;
            padding: 8px 12px;
            border-radius: 6px;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-tambah {
            background-color: #ff7043;
            color: white;
            margin-bottom: 20px;
        }

        .btn-tambah:hover {
            background-color: #ff5722;
        }

        .btn-edit {
            border: 2px solid #ffa726;
            color: #ffa726;
        }

        .btn-edit:hover {
            background-color: #ffa726;
            color: white;
        }

        .btn-delete {
            border: 2px solid #e57373;
            color: #e57373;
        }

        .btn-delete:hover {
            background-color: #e57373;
            color: white;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .button-container .form-group {
            width: 48%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Data Penjualan</h1>

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <!-- Month Filter Form -->
        <form method="GET" action="{{ route('perhitungan.processing') }}" style="margin-bottom: 20px;">
            <div class="form-group">
                <label for="month">Filter by Month:</label>
                <select name="month" id="month" class="form-control" onchange="this.form.submit()">
                    <option value="">Select a Month</option>
                    @foreach($months as $month)
                    <option value="{{ $month->bulan_periode }}" {{ request('month') == $month->bulan_periode ? 'selected' : '' }}>
                        {{ $month->bulan_periode }}
                    </option>
                    @endforeach
                </select>
            </div>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Tanggal</th>
                    <th>Banyak Terjual</th>
                    <th>Harga Per Unit</th>
                    <th>Durasi Penjualan (Hari)</th>
                    <th>Bulan Periode</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penjualans as $penjualan)
                <tr>
                    <td>{{ $penjualan->nama_produk }}</td>
                    <td>{{ $penjualan->tanggal }}</td>
                    <td>{{ $penjualan->banyak_terjual }}</td>
                    <td>Rp{{ number_format($penjualan->harga_per_unit, 0, ',', '.') }}</td>
                    <td>{{ $penjualan->durasi_penjualan }}</td>
                    <td>{{ $penjualan->bulan_periode }}</td>
                    <td>
                        <form action="{{ route('data.penjualan.edit', $penjualan->id) }}" method="GET" style="display: inline;">
                            <button type="submit" class="btn btn-edit">Edit</button>
                        </form>
                        <form action="{{ route('data.penjualan.destroy', $penjualan->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="button-container">
            <form action="{{ url('/perhitungan/result') }}" method="GET">
                <div class="form-group">
                    <button type="submit" class="btn btn-tambah">Mulai Clustering</button>
                </div>
            </form>

            <form action="{{ url('/dashboard') }}" method="GET">
                <div class="form-group">
                    <button type="submit" class="btn btn-kembali">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>