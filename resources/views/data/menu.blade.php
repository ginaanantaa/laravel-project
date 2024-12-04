<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Data Menu Makanan</title>

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

        /* Header styling */
        table th {
            background-color: #ff7043;
            color: white;
            font-weight: 600;
        }

        /* Row styling */
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

        /* Edit button */
        .btn-edit {
            margin-right: 8px;
        }

        .btn-edit:hover {
            color: #e68900;
        }

        /* Delete button */
        .btn-delete:hover {
            color: #d32f2f;
        }

        /* Button Styling */
        .btn {
            background-color: #ff7043;
            /* Orange color */
            color: white;
            padding: 14px 28px;
            font-size: 1.125rem;
            font-weight: 600;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: auto;
            min-width: 160px;
            /* Optional: Minimum width for larger buttons */
        }

        .btn:hover {
            background-color: #ff5722;
            /* Darker orange on hover */
            transform: translateY(-2px);
        }

        .btn:focus {
            outline: none;
        }

        .btn-tambah {
            background-color: #ff7043;
            /* Orange button */
            color: white;
            margin-bottom: 20px;
        }

        .btn-tambah:hover {
            background-color: #ff5722;
            /* Darker orange for hover */
        }

        .btn-kembali {
            background-color: #f0f4f8;
            color: #2d3748;
            margin-top: 10px;
        }

        .btn-kembali:hover {
            background-color: #e2e8f0;
        }

        /* Flexbox container for side-by-side buttons */
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
        <h1>Data Menu Makanan</h1>

        <!-- Check if there are menus -->
        @if($menus->isEmpty())
        <div class="no-data">Belum ada menu yang tersedia.</div>
        @else
        <!-- Table to display menu data -->
        <table>
            <thead>
                <tr>
                    <th>Kode Makanan</th>
                    <th>Nama Makanan</th>
                    <th>Rincian</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->kode_makanan }}</td>
                    <td>{{ $menu->nama_makanan }}</td>
                    <td>{{ $menu->rincian }}</td>
                    <td>{{ number_format($menu->harga, 0, ',', '.') }}</td>
                    <td>
                        <!-- Edit and Delete Buttons -->
                        <a href="{{ route('data.menu.edit', $menu->id) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('data.menu.destroy', $menu->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin menghapus menu ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        <!-- Button container with side-by-side buttons -->
        <div class="button-container">
            <!-- Button to go to Tambah page -->
            <form action="{{ route('input.menu') }}" method="GET">
                <button type="submit" class="btn btn-tambah">Tambah Menu</button>
            </form>

            <!-- Back Button (Kembali) to go to /dashboard -->
            <form action="{{ url('/dashboard') }}" method="GET">
                <button type="submit" class="btn btn-kembali">Kembali</button>
            </form>
        </div>
    </div>
</body>

</html>