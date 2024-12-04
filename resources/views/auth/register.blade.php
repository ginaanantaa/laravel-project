<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f7fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 600px;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #ff7043;
            color: white;
            font-weight: bold;
            text-align: center;
            padding: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 1rem;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border-radius: 25px;
            border: 1px solid #ff7043;
            outline: none;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        input:focus {
            border-color: #ff5722;
        }

        .form-check {
            margin-top: 10px;
            display: flex;
            align-items: center;
        }

        /* Larger checkbox */
        .form-check input {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: #ff7043;
            border: none;
            border-radius: 25px;
            color: white;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #ff5722;
        }

        .btn-link {
            color: #ff7043;
            text-decoration: none;
            font-size: 1rem;
            margin-top: 10px;
            display: block;
            text-align: center;
        }

        .btn-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Register
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name Field -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    <!-- Remember Me checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember Me</label>
                    </div>

                    <!-- Register Button -->
                    <div class="form-group">
                        <button type="submit" class="btn">Register</button>
                    </div>

                    <!-- Forgot Password Link -->
                    <div class="form-group">
                        <a href="{{ route('password.request') }}" class="btn-link">Forgot Your Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>