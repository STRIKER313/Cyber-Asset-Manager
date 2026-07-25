<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Home</title>
</head>

<body>
    <div class="scanline"></div>
    <div class="particle" style="top: 10%; left: 20%; animation-delay: 0s;"></div>
    <div class="particle" style="top: 40%; left: 80%; animation-delay: 1s;"></div>
    <div class="particle" style="top: 70%; left: 10%; animation-delay: 2s;"></div>
    <div class="particle" style="top: 50%; left: 50%; animation-delay: 1.5s;"></div>

    <div class="container">
        <h2 class="glitch" data-text="WELCOME TO OUR PROJECT">WELCOME TO OUR PROJECT</h2>

        <a href="/login-admin">
            <button class="btn btn-admin">LOGIN ADMIN</button>
        </a>

        <a href="/login-operator">
            <button class="btn-operator">LOGIN OPERATOR</button>
        </a>

        <a href="/login-user">
            <button class="btn btn-user">LOGIN USER</button>
        </a>
    </div>
</body>
</html>