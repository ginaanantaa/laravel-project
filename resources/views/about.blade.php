<!-- resources/views/about.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
    <style>
        /* Base styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            background-color: #f4f4f9;
            color: #333;
        }

        /* Container for content */
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Headings */
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 2.5em;
        }

        p {
            font-size: 1.1em;
            text-align: justify;
            margin: 20px 0;
        }

        /* Navigation Bar */
        .navbar {
            background-color: #3498db;
            padding: 10px 0;
        }

        .navbar a {
            text-decoration: none;
            color: #ffffff;
            font-size: 1.2em;
            margin: 0 15px;
        }

        .navbar a:hover {
            color: #f1c40f;
        }

        /* Footer */
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #777;
            font-size: 0.9em;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <div class="navbar">
        <div class="container">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about') }}">About Us</a>
            <a href="#">Contact</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <h1>About Us</h1>
        <p>
            Welcome to our Laravel application! Our mission is to provide exceptional web solutions that make a real impact.
            This application is built with love and dedication, utilizing cutting-edge technologies to deliver high-quality results.
        </p>
        <p>
            Whether you're here to explore our services, learn more about our team, or just browse around, we're glad to have you!
            Stay connected and feel free to reach out if you have any questions.
        </p>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; {{ date('Y') }} Laravel Application. All rights reserved.
    </div>
</body>

</html>