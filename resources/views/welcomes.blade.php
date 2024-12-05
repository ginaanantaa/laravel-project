<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
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
            padding: 20px;
            background-color: #ff6230;
            color: #fff;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            text-align: center;
        }

        .buttons {
            margin-top: 20px;
        }

        .button {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            color: #fff;
            background-color: #ff6230;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .button:hover {
            background-color: #e65428;
            transform: scale(1.05);
        }

        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
        }

        img {
            height: 500px;
            width: 700px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Selamat Datang</h1>
        <p>Pondok Orange</p>
    </div>

    <div class="container">
        @if (Route::has('login'))
        <div class="buttons">
            @auth
            <a href="{{ url('/dashboard') }}" class="button">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="button">Login</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="button">Register</a>
            @endif
            @endauth
        </div>
        @endif
    </div>

    <div class="image-container">
        <img src="{{ asset('images/WhatsApp Image 2024-07-10 at 22.17.29_a1b89088.jpg') }}" alt="Pondok Orange">
    </div>
</body>

</html>