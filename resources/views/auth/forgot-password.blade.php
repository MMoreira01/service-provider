<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Forgot Password - AcademicPapers</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8fafc;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            background-color: #fff;
            border: 1px solid #eaeaea;
            border-radius: 8px;
            padding: 2rem;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            font-weight: 600;
            text-align: center;
        }

        .card label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .card input[type="email"] {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #eaeaea;
            border-radius: 4px;
        }

        .button-sub {
            background-color: #4fd3f8;
            color: #fff;
            padding: 0.75rem;
            width: 100%;
            border: none;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button-sub:hover {
            background-color: #38b3d7;
        }

        .card p {
            margin-bottom: 1rem;
            font-size: 0.875rem;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="card">
            <p>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between mt-4">
                    <button type="submit" class="button ms-3 button-sub">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
