<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register - AcademicPapers</title>

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

        .card input[type="text"],
        .card input[type="email"],
        .card input[type="password"] {
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

        .card a {
            display: inline-block;
            margin-top: 1rem;
            color: #333;
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.3s;
        }

        .card a:hover {
            color: #38b3d7;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="card">
            <h2>{{ __('Register a new account') }}</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus
                        autocomplete="name">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" :value="old('email')" required
                        autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between mt-4">
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button type="submit" class="button ms-3 button-sub">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
