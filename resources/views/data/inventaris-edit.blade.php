<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Edit Data Inventaris</title>

    <!-- Font and Styling -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
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
            max-width: 800px;
            margin: 20px auto;
        }

        h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #1a202c;
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 1.125rem;
            margin-bottom: 8px;
            color: #2d3748;
        }

        input[type="text"],
        input[type="number"] {
            padding: 12px;
            margin-bottom: 20px;
            font-size: 1.125rem;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            background-color: #fafafa;
        }

        button {
            background-color: #ff7043;
            color: white;
            padding: 14px 28px;
            font-size: 1.125rem;
            font-weight: 600;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-bottom: 10px;
        }

        button:hover {
            background-color: #ff5722;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: #e2e8f0;
            color: #2d3748;
            padding: 14px 28px;
            font-size: 1.125rem;
            font-weight: 600;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            text-align: center;
            text-decoration: none;
        }

        .btn-secondary:hover {
            background-color: #cbd5e0;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Data Inventaris</h1>

        <form action="{{ route('data.inventaris.update', $inventaris->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="kode_barang">Kode Barang:</label>
            <input type="text" id="kode_barang" name="kode_barang" value="{{ $inventaris->kode_barang }}" required>

            <label for="nama_barang">Nama Barang:</label>
            <input type="text" id="nama_barang" name="nama_barang" value="{{ $inventaris->nama_barang }}" required>

            <label for="jumlah">Jumlah:</label>
            <input type="number" id="jumlah" name="jumlah" value="{{ $inventaris->jumlah }}" required>

            <label for="kondisi">Kondisi:</label>
            <input type="text" id="kondisi" name="kondisi" value="{{ $inventaris->kondisi }}" required>

            <button type="submit">Update</button>
            <a href="{{ route('data.inventaris') }}" class="btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>