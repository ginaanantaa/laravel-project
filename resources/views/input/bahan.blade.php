<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Form Bahan Baku</title>

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

        select,
        input {
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

        select:focus,
        input:focus {
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

        <h1>Form Bahan Baku</h1>

        <!-- Form -->
        <form action="{{ route('input.bahan.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode_bahan">Kode Bahan</label>
                <select id="kode_bahan" name="kode_bahan" required>
                    <option value="">Select Kode Bahan</option>
                    @foreach($kode_bahan as $bahan)
                    <option value="{{ $bahan->kode_bahan }}">{{ $bahan->kode_bahan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nama_bahan">Nama Bahan</label>
                <select id="nama_bahan" name="nama_bahan" required>
                    <option value="">Select Nama Bahan</option>
                    @foreach($nama_bahan as $bahan)
                    <option value="{{ $bahan->nama_bahan }}">{{ $bahan->nama_bahan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="satuan">Satuan</label>
                <select id="satuan" name="satuan" required>
                    <option value="">Select Satuan</option>
                    @foreach($satuan as $bahan)
                    <option value="{{ $bahan->satuan }}">{{ $bahan->satuan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="stok">Stok</label>
                <select id="stok" name="stok" required>
                    <option value="">Select Stok</option>
                    @foreach($stok as $bahan)
                    <option value="{{ $bahan->stok }}">{{ $bahan->stok }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <select id="harga" name="harga" required>
                    <option value="">Select Harga</option>
                    @foreach($harga as $bahan)
                    <option value="{{ $bahan->harga }}">Rp {{ number_format($bahan->harga, 2, ',', '.') }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>

        <!-- Back Button (Kembali) -->
        <form action="{{ route('data.bahan') }}" method="GET">
            <div class="form-group">
                <button type="submit" class="btn-kembali">Kembali</button>
            </div>
        </form>
    </div>
</body>

</html>