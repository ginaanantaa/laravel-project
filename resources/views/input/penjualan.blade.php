<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Form Penjualan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Import Poppins Font */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            background-color: #f7fafc;
            color: #2d3748;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 700px;
            margin: 20px;
        }

        h1 {
            font-size: 2.25rem;
            font-weight: 600;
            color: #1a202c;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            font-size: 1.125rem;
            font-weight: 600;
            color: #4a5568;
            display: block;
            margin-bottom: 10px;
        }

        select {
            width: 100%;
            padding: 14px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            background-color: #fafafa;
            font-size: 1rem;
            color: #2d3748;
            outline: none;
            transition: all 0.3s ease;
        }

        select:focus {
            border-color: #ff7043;
            box-shadow: 0 0 8px rgba(255, 112, 67, 0.3);
        }

        button {
            background-color: #ff7043;
            color: white;
            padding: 14px 28px;
            font-size: 1.125rem;
            font-weight: 600;
            border-radius: 8px;
            width: 100%;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #ff5722;
            transform: translateY(-2px);
        }

        button:focus {
            outline: none;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        .alert-success {
            background-color: #38a169;
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 1.125rem;
        }

        .btn-kembali {
            background-color: #f0f4f8;
            color: #2d3748;
            padding: 14px 28px;
            font-size: 1.125rem;
            font-weight: 600;
            border-radius: 8px;
            width: 100%;
            border: none;
            cursor: pointer;
            margin-top: 15px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-kembali:hover {
            background-color: #e2e8f0;
            transform: translateY(-2px);
        }

        .btn-kembali:focus {
            outline: none;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="container">
        @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
        @endif

        <h1>Form Penjualan</h1>

        <form action="{{ route('input.penjualan.submit') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <select id="nama_produk" name="nama_produk" required>
                    <option value="">Select Nama Produk</option>
                    @foreach($nama_produk as $item)
                    <option value="{{ $item->nama_makanan }}">{{ $item->nama_makanan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <select id="tanggal" name="tanggal" required>
                    <option value="">Select Tanggal</option>
                    @foreach($tanggal as $item)
                    <option value="{{ $item->tanggal }}">{{ $item->tanggal }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="banyak_terjual">Banyak Terjual</label>
                <select id="banyak_terjual" name="banyak_terjual" required>
                    <option value="">Select Banyak Terjual</option>
                    @foreach($banyak_terjual as $item)
                    <option value="{{ $item->banyak_terjual }}">{{ $item->banyak_terjual }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="harga_per_unit">Harga Per Unit</label>
                <select id="harga_per_unit" name="harga_per_unit" required>
                    <option value="">Select Harga Per Unit</option>
                    @foreach($harga_per_unit as $item)
                    <option value="{{ $item->harga_per_unit }}">{{ $item->harga_per_unit }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="durasi_penjualan">Durasi Penjualan (Hari)</label>
                <select id="durasi_penjualan" name="durasi_penjualan" required>
                    <option value="">Select Durasi Penjualan</option>
                    @foreach($durasi_penjualan as $item)
                    <option value="{{ $item->durasi_penjualan }}">{{ $item->durasi_penjualan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="bulan_periode">Bulan Periode</label>
                <select id="bulan_periode" name="bulan_periode" required>
                    <option value="">Select Bulan Periode</option>
                    @foreach($bulan_periode as $item)
                    <option value="{{ $item->bulan_periode }}">{{ $item->bulan_periode }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>

        <form action="{{ route('data.penjualan') }}" method="GET">
            <div class="form-group">
                <button type="submit" class="btn-kembali">Kembali</button>
            </div>
        </form>
    </div>
</body>

</html>