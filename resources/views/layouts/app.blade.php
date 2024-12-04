<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <style>
        /* Global Styling */
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        /* Navigation Bar */
        nav {
            background-color: #ffffff;
            border-bottom: 1px solid #e0e0e0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 10px 20px;
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
            color: #343a40;
        }

        .navbar-toggler {
            display: none;
        }

        .navbar-nav {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-item {
            margin-left: 20px;
        }

        .nav-link {
            text-decoration: none;
            color: #343a40;
            padding: 8px 12px;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .nav-link:hover {
            background-color: #f1f1f1;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            margin-top: 10px;
            right: 0;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-item {
            padding: 8px 12px;
            text-decoration: none;
            color: #343a40;
            display: block;
        }

        .dropdown-item:hover {
            background-color: #f1f1f1;
        }

        /* Main Content */
        main {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- Navigation Bar -->
        <nav>
            <div class="navbar-container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <!-- Main Content Area -->
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>