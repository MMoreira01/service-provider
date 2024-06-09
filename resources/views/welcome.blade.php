<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AcademicPapers</title>

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
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #eaeaea;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: #333;
            margin-left: 1rem;
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar a:hover {
            background-color: #FF2D20;
            color: #fff;
        }

        .hero {
            text-align: center;
            padding: 3rem 1rem;
            background-color: #f1f5f9;
            border-bottom: 1px solid #eaeaea;
            flex: 1;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
        }

        .hero a {
            background-color: #FF2D20;
            color: #fff;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s, color 0.3s;
        }

        .hero a:hover {
            background-color: #d0261a;
        }

        .footer {
            text-align: center;
            padding: 2rem 1rem;
            background-color: #ffffff;
            border-top: 1px solid #eaeaea;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="navbar">
        <div class="logo">
            <a href="#">AcademicPapers</a>
        </div>
        @if (Route::has('login'))
            <nav>
                @auth
                    <a href="{{ url('/dashboard') }}" class="button">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="button">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="button">Register</a>
                    @endif
                @endauth
            </nav>
        @endif
    </div>

    <div class="hero">
        <h1>Welcome to AcademicPapers</h1>
        <p>Your ultimate repository for academic research papers.</p>
    </div>

    <div class="footer">
        <p>@Gestão de Identidade Digital</p>
    </div>
</body>

</html>
