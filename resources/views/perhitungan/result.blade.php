<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hasil Clustering</title>

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

        h2 {
            font-size: 1.5rem;
            color: #ff7043;
            margin-top: 30px;
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
        <h1>Hasil Clustering</h1>

        @foreach($clusters as $clusterName => $clusterItems)
        @if(count($clusterItems) > 0) <!-- Only display cluster if it has data -->
        <h2>{{ $clusterName }}</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Banyak Terjual</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clusterItems as $item)
                <tr>
                    <td>{{ $item['nama_makanan'] }}</td>
                    <td>{{ $item['banyak_terjual'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        @endforeach

        <div class="button-container">
            <form action="{{ route('perhitungan.processing') }}" method="GET">
                <div class="form-group">
                    <button type="submit" class="btn btn-tambah">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</body>


</html>