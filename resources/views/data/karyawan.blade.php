<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Data Karyawan</title>

    <!-- Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        /* Apply Poppins font to the whole page */
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
            /* Orange Header */
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

        table td .btn-edit,
        table td .btn-delete {
            padding: 6px 12px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-edit {
            margin-right: 8px;
            color: black;
        }

        .btn-edit:hover {
            color: #ff5722;
            /* Darker orange for edit hover */
        }

        .btn-delete:hover {
            color: #d32f2f;
            /* Red color for delete hover */
        }

        .btn {
            background-color: #e2e8f0;
            color: #2d3748;
            padding: 14px 28px;
            font-size: 1.125rem;
            font-weight: 600;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: auto;
            min-width: 160px;
        }

        .btn:hover {
            background-color: #cbd5e0;
            transform: translateY(-2px);
        }

        .btn:focus {
            outline: none;
        }

        .btn-tambah {
            background-color: #ff7043;
            /* Orange Button */
            color: white;
            margin-bottom: 20px;
        }

        .btn-tambah:hover {
            background-color: #ff5722;
            /* Darker orange for hover */
        }

        .btn-kembali {
            background-color: #e2e8f0;
            color: #2d3748;
            margin-top: 10px;
        }

        .btn-kembali:hover {
            background-color: #cbd5e0;
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

<body class="font-sans antialiased">
    <div class="container">
        <h1>Data Karyawan</h1>

        <!-- Table to display karyawan data -->
        <table>
            <thead>
                <tr>
                    <th>Kode Karyawan</th>
                    <th>Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>Nomor Telepon</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($karyawans as $karyawan)
                <tr>
                    <td>{{ $karyawan->kode_karyawan }}</td>
                    <td>{{ $karyawan->nama_karyawan }}</td>
                    <td>{{ $karyawan->jabatan }}</td>
                    <td>{{ $karyawan->nomor_telepon }}</td>
                    <td>
                        <!-- Edit Button -->
                        <form action="{{ route('data.karyawan.edit', $karyawan->id) }}" method="GET" style="display: inline;">
                            <button type="submit" class="btn btn-edit">Edit</button>
                        </form>

                        <!-- Delete Button -->
                        <form action="{{ route('data.karyawan.destroy', $karyawan->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Button container with side-by-side buttons -->
        <div class="button-container">
            <form action="{{ url('/input/karyawan') }}" method="GET">
                <div class="form-group">
                    <button type="submit" class="btn btn-tambah">Tambah</button>
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