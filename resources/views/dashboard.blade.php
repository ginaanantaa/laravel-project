@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- Link to Google Fonts for better typography -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7fafc;
            margin: 0;
            padding: 0;
            display: flex;
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
            max-height: 0;
            opacity: 0;
            transition: max-height 0.5s ease-out, opacity 0.3s ease-out;
        }

        .dropdown.active .dropdown-content {
            display: block;
            max-height: 200px;
            /* Set max-height to a value that suits your content */
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

        /* Custom scrollbar */
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

        /* Hover effect for the sidebar */
        .sidebar ul li a:hover {
            background-color: #ff5722;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <h2>Pondok Orange</h2>
        </div>
        <ul>
            <li><a href="" class="text-lg">Dashboard</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="text-lg">Data Menu Makanan</a>
                <ul class="dropdown-content">
                    <li><a href="#">Option 1</a></li>
                    <li><a href="#">Option 2</a></li>
                    <li><a href="#">Option 3</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="text-lg">Data Bahan Baku</a>
                <ul class="dropdown-content">
                    <li><a href="#">Option 1</a></li>
                    <li><a href="#">Option 2</a></li>
                    <li><a href="#">Option 3</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="text-lg">Data Pemasok</a>
                <ul class="dropdown-content">
                    <li><a href="#">Option 1</a></li>
                    <li><a href="#">Option 2</a></li>
                    <li><a href="#">Option 3</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="text-lg">Data Karyawan</a>
                <ul class="dropdown-content">
                    <li><a href="#">Option 1</a></li>
                    <li><a href="#">Option 2</a></li>
                    <li><a href="#">Option 3</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="text-lg">Data Inventaris</a>
                <ul class="dropdown-content">
                    <li><a href="#">Option 1</a></li>
                    <li><a href="#">Option 2</a></li>
                    <li><a href="#">Option 3</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="text-lg">Data Penjualan</a>
                <ul class="dropdown-content">
                    <li><a href="#">Option 1</a></li>
                    <li><a href="#">Option 2</a></li>
                    <li><a href="#">Option 3</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <h2>Selamat datang</h2>
        </div>

        <!-- Card Section -->
        <div class="card">
            <h4 class="total">Rp 10.000.000,-</h4>
            <p class="total-description">
                Total ini mencakup semua transaksi dalam periode yang berlaku.
            </p>
        </div>
    </div>

    <script>
        // Function to toggle dropdown visibility
        const dropdowns = document.querySelectorAll('.dropdown');
        dropdowns.forEach(dropdown => {
            dropdown.addEventListener('click', () => {
                dropdown.classList.toggle('active');
            });
        });
    </script>
</body>

</html>