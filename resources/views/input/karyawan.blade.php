<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Form Karyawan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
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

        <h1>Form Karyawan</h1>

        <form action="{{ route('input.karyawan.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode_karyawan">Kode Karyawan</label>
                <select id="kode_karyawan" name="kode_karyawan" required>
                    <option value="">Select Kode Karyawan</option>
                    @foreach($kode_karyawan as $karyawan)
                    <option value="{{ $karyawan->kode_karyawan }}">{{ $karyawan->kode_karyawan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nama_karyawan">Nama Karyawan</label>
                <select id="nama_karyawan" name="nama_karyawan" required>
                    <option value="">Select Nama Karyawan</option>
                    @foreach($nama_karyawan as $karyawan)
                    <option value="{{ $karyawan->nama_karyawan }}">{{ $karyawan->nama_karyawan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <select id="jabatan" name="jabatan" required>
                    <option value="">Select Jabatan</option>
                    @foreach($jabatan as $karyawan)
                    <option value="{{ $karyawan->jabatan }}">{{ $karyawan->jabatan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nomor_telepon">Nomor Telepon</label>
                <select id="nomor_telepon" name="nomor_telepon" required>
                    <option value="">Select Nomor Telepon</option>
                    @foreach($nomor_telepon as $karyawan)
                    <option value="{{ $karyawan->nomor_telepon }}">{{ $karyawan->nomor_telepon }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>

        <form action="{{ route('data.karyawan') }}" method="GET">
            <div class="form-group">
                <button type="submit" class="btn-kembali">Kembali</button>
            </div>
        </form>
    </div>
</body>

</html>