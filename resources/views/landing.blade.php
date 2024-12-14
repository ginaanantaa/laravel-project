<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Favorit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe6dc;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            padding: 15px;
            background-color: #ff6230;
            color: #fff;
            font-size: 24px;
            font-weight: bold;
        }

        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            width: 350px;
            padding: 25px;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 430px;
            /* Increased height to make space for the button */
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            color: #ff6230;
            margin-bottom: 15px;
            font-size: 22px;
            font-weight: bold;
        }

        .card p {
            margin: 10px 0;
            color: #555;
            font-size: 16px;
        }

        .card .price {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-top: 15px;
            padding: 10px;
            background-color: #ffe0cc;
            border-radius: 5px;
        }

        .card .details {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .text-center {
            text-align: center;
        }

        .message {
            margin-top: 20px;
            padding: 15px;
            background-color: #ffcccb;
            border: 1px solid #f5c6cb;
            color: #721c24;
            border-radius: 5px;
            text-align: center;
        }

        .btn {
            margin-top: 20px;
            padding: 12px 20px;
            background-color: #ff6230;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #e55a24;
        }

        /* Responsive Layout */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .card {
                width: 90%;
            }
        }

        /* Button at the bottom of the page */
        .bottom-btn-container {
            text-align: center;
            margin-top: 40px;
        }

        /* Footer Styling */
        footer {
            background-color: #333;
            color: #fff;
            padding: 30px;
            text-align: center;
            margin-top: 40px;
        }

        footer h3 {
            margin-bottom: 15px;
        }

        footer p {
            margin: 5px 0;
            font-size: 14px;
        }

        footer a {
            color: #ff6230;
            text-decoration: none;
            margin: 0 10px;
            font-size: 18px;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Menu Favorit</h1>
        <p>Pondok Orange</p>
    </div>

    <div class="container">
        @if(!empty($menuFavorit) && count($menuFavorit) > 0)
        @foreach($menuFavorit as $menu)
        <div class="card">
            <h3>{{ $menu['nama_makanan'] ?? 'Nama tidak tersedia' }}</h3>
            <p><strong>Kode:</strong> {{ $menu['kode_makanan'] ?? 'Tidak tersedia' }}</p>
            <div class="details">
                <p><strong>Rincian:</strong> {{ $menu['rincian'] ?? 'Tidak tersedia' }}</p>
                <p><strong>Banyak Terjual:</strong> {{ $menu['banyak_terjual'] ?? 0 }}</p>
            </div>
            <p class="price">Rp{{ number_format($menu['harga'] ?? 0, 0, ',', '.') }}</p>
        </div>
        @endforeach
        @else
        <p class="message text-center">Tidak ada data untuk Menu Favorit.</p>
        @endif
    </div>

    <!-- Button at the bottom of the page -->
    <div class="bottom-btn-container">
        <a href="/welcomes" class="btn">Masuk</a>
    </div>

    <!-- Footer Section -->
    <footer>
        <h3>Pondok Orange</h3>
        <p>Alamat: J1. KH. Abdurahman Wahid No.3, RT.3/RW.1, Kuala II, Kec. Sungai Raya, Kabupaten Kubu Raya, Kalimantan Barat 78391</p>
        <p>Pemesanan banyak (cathering) bisa menghubungi nomor: <strong>085252243499</strong>.<br>Sistem cathering hanya menerima yang bisa ambil sendiri, tidak menerima pesan antar.</p>
        <p>Copyright Pondok Orange. | 2024 All Rights Reserved.</p>
        <p>Made By Gina Ananta Novi D. P.</p>
    </footer>
</body>

</html>