<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Form Menu Makanan</title>

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

        input,
        textarea,
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

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #ff7043;
            /* Orange focus color */
            box-shadow: 0 0 8px rgba(255, 112, 67, 0.3);
        }

        button {
            background-color: #ff7043;
            /* Orange background */
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
            /* Darker orange on hover */
            transform: translateY(-2px);
        }

        button:focus {
            outline: none;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        /* Success Message Styling */
        .alert-success {
            background-color: #38a169;
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 1.125rem;
        }

        /* Button Styling for Kembali */
        .btn-kembali {
            background-color: #e2e8f0;
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
            background-color: #cbd5e0;
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

        <h1>Form Menu Makanan</h1>

        <!-- Form -->
        <form action="{{ route('input.menu.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode_makanan">Kode Makanan</label>
                <select id="kode_makanan" name="kode_makanan" required>
                    <option value="">Select Kode Makanan</option>
                    @foreach ($menus as $menu)
                    <option value="{{ $menu->kode_makanan }}"
                        data-nama="{{ $menu->nama_makanan }}"
                        data-rincian="{{ $menu->rincian }}"
                        data-harga="{{ $menu->harga }}">
                        {{ $menu->kode_makanan }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nama_makanan">Nama Makanan</label>
                <select id="nama_makanan" name="nama_makanan" required>
                    <option value="">Select Nama Makanan</option>
                    @foreach ($menus as $menu)
                    <option value="{{ $menu->nama_makanan }}"
                        data-rincian="{{ $menu->rincian }}"
                        data-harga="{{ $menu->harga }}">
                        {{ $menu->nama_makanan }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="rincian">Rincian</label>
                <select id="rincian" name="rincian" required>
                    <option value="">Select Rincian</option>
                    @foreach ($menus as $menu)
                    <option value="{{ $menu->rincian }}"
                        data-harga="{{ $menu->harga }}">
                        {{ $menu->rincian }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <select id="harga" name="harga" required>
                    <option value="">Select Harga</option>
                    @foreach ($menus as $menu)
                    <option value="{{ $menu->harga }}">
                        {{ $menu->harga }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>

        <!-- Back Button (Kembali) -->
        <form action="{{ route('data.menu') }}" method="GET">
            <div class="form-group">
                <button type="submit" class="btn-kembali">Kembali</button>
            </div>
        </form>
    </div>

    <script>
        // If needed, you can add a script to handle dynamic changes between selects
        document.getElementById('kode_makanan').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];

            var namaMakanan = selectedOption.getAttribute('data-nama');
            var rincian = selectedOption.getAttribute('data-rincian');
            var harga = selectedOption.getAttribute('data-harga');

            // Update the other selects based on the selection
            document.getElementById('nama_makanan').value = namaMakanan;
            document.getElementById('rincian').value = rincian;
            document.getElementById('harga').value = harga;
        });
    </script>
</body>

</html>