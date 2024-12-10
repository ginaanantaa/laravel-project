<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7fafc;
            margin: 0;
            padding: 0;
            display: flex;
            box-sizing: border-box;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #ff7043;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            overflow-y: auto;
            padding-top: 20px;
            transition: width 0.75s ease;
            box-shadow: 2px 0px 8px rgba(0, 0, 0, 0.1);
        }

        .sidebar .logo h2 {
            margin-bottom: 20px;
            text-align: center;
            color: white;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
            position: relative;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            display: block;
            padding: 10px;
            transition: background-color 0.3s ease, padding-left 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: #ff5722;
            padding-left: 20px;
        }

        /* Dropdown Content */
        .dropdown-content {
            display: none;
            list-style-type: none;
            padding-left: 20px;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #ff7043;
            width: 100%;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            z-index: 10;
        }

        .dropdown.active .dropdown-content {
            display: block;
            visibility: visible;
            opacity: 1;
        }

        .dropdown-content li {
            padding: 5px 0;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
            transition: margin-left 0.75s ease;
        }

        .header {
            text-align: center;
            padding: 30px 0;
        }

        .header h2 {
            font-size: 2rem;
            font-weight: 600;
            color: #2d3748;
        }

        .card {
            background-color: #fff;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 4px solid #fbbf24;
            padding: 40px;
            text-align: center;
            margin-top: 30px;
        }

        .total {
            font-size: 4rem;
            font-weight: 800;
            color: #f97316;
        }

        .total-description {
            font-size: 1.125rem;
            color: #4a5568;
            margin-top: 20px;
        }

        /* Sidebar scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 8px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #ff7043;
            border-radius: 10px;
        }

        /* Logout Button Styling */
        .logout-btn {
            background-color: #f44336;
            border: none;
            padding: 12px 20px;
            color: white;
            font-size: 16px;
            width: 100%;
            text-align: center;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #d32f2f;
            transform: scale(1.05);
        }

        .logout-btn:focus {
            outline: none;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <h2>Pondok Orange</h2>
        </div>
        <ul>
            <li><a href="{{ route('dashboard') }}" class="text-lg">Dashboard</a></li>

            <!-- Dropdown for Data Menu -->
            <li class="dropdown">
                <a href="javascript:void(0)" class="text-lg dropbtn" onclick="toggleDropdown('tablesAndFormsDropdown')">Data</a>
                <ul id="tablesAndFormsDropdown" class="dropdown-content ml-4 space-y-2">
                    <li><a href="{{ route('data.menu') }}" class="text-lg">Data Menu Makanan</a></li>
                    <li><a href="{{ route('data.bahan') }}" class="text-lg">Data Bahan Baku</a></li>
                    <li><a href="{{ route('data.pemasok') }}" class="text-lg">Data Pemasok</a></li>
                    <li><a href="{{ route('data.karyawan') }}" class="text-lg">Data Karyawan</a></li>
                    <li><a href="{{ route('data.inventaris') }}" class="text-lg">Data Inventaris</a></li>
                    <li><a href="{{ route('data.penjualan') }}" class="text-lg">Data Penjualan</a></li>
                </ul>
            </li>

            <!-- Dropdown for Input Forms -->
            <li class="dropdown">
                <a href="javascript:void(0)" class="text-lg dropbtn" onclick="toggleDropdown('formsDropdown')">Forms</a>
                <ul id="formsDropdown" class="dropdown-content ml-4 space-y-2">
                    <li><a href="{{ route('input.menu') }}" class="text-lg">Input Menu Makanan</a></li>
                    <li><a href="{{ route('input.bahan') }}" class="text-lg">Input Bahan Baku</a></li>
                    <li><a href="{{ route('input.pemasok') }}" class="text-lg">Input Pemasok</a></li>
                    <li><a href="{{ route('input.karyawan') }}" class="text-lg">Input Karyawan</a></li>
                    <li><a href="{{ route('input.inventaris') }}" class="text-lg">Input Inventaris</a></li>
                    <li><a href="{{ route('input.penjualan') }}" class="text-lg">Input Penjualan</a></li>
                </ul>
            </li>

            <!-- Dropdown for Perhitungan -->
            <li class="dropdown">
                <a href="javascript:void(0)" class="text-lg dropbtn" onclick="toggleDropdown('perhitunganDropdown')">Perhitungan</a>
                <ul id="perhitunganDropdown" class="dropdown-content ml-4 space-y-2">
                    <li><a href="{{ route('perhitungan.processing') }}" class="text-lg">Processing</a></li>
                </ul>
            </li>

            <!-- Logout Option -->
            <li>
                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h2>Dashboard</h2>
        </div>

        <div class="card">
            <h4 class="total">Rp {{ number_format($totalPenjualan, 0, ',', '.') }},-</h4>
            <p class="total-description">
                Total ini mencakup semua transaksi dalam periode yang berlaku.
            </p>
        </div>
    </div>

    <script>
        // Function to toggle dropdown visibility with transition
        const dropdowns = document.querySelectorAll('.dropdown');
        dropdowns.forEach(dropdown => {
            dropdown.addEventListener('click', () => {
                dropdown.classList.toggle('active');
            });
        });
    </script>
</body>

</html>