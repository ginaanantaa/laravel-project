<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Form Pemasok</title>

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
        <!-- Display success message if it exists -->
        @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
        @endif

        <h1>Form Pemasok</h1>

        <!-- Form -->
        <form action="{{ route('input.pemasok.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode_pemasok">Kode Pemasok</label>
                <select id="kode_pemasok" name="kode_pemasok" required>
                    <option value="">Select Kode Pemasok</option>
                    @foreach($kode_pemasok as $pemasok)
                    <option value="{{ $pemasok->kode_pemasok }}">{{ $pemasok->kode_pemasok }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nama_pemasok">Nama Pemasok</label>
                <select id="nama_pemasok" name="nama_pemasok" required>
                    <option value="">Select Nama Pemasok</option>
                    @foreach($nama_pemasok as $pemasok)
                    <option value="{{ $pemasok->nama_pemasok }}">{{ $pemasok->nama_pemasok }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <select id="alamat" name="alamat" required>
                    <option value="">Select Alamat</option>
                    @foreach($alamat as $pemasok)
                    <option value="{{ $pemasok->alamat }}">{{ $pemasok->alamat }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nomor_telepon">Nomor Telepon</label>
                <select id="nomor_telepon" name="nomor_telepon" required>
                    <option value="">Select Nomor Telepon</option>
                    @foreach($nomor_telepon as $pemasok)
                    <option value="{{ $pemasok->nomor_telepon }}">{{ $pemasok->nomor_telepon }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>

        <!-- Back Button (Kembali) -->
        <form action="{{ route('data.pemasok') }}" method="GET">
            <div class="form-group">
                <button type="submit" class="btn-kembali">Kembali</button>
            </div>
        </form>
    </div>
</body>

</html>