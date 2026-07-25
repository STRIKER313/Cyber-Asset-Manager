<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="scanline"></div>

<div class="login-card">

    @if(session('error'))
        <div class="error-box">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="error-box" style="margin-bottom: 18px;">
            <strong style="display: block; margin-bottom: 5px;">Input Error:</strong>
            <ul style="list-style-type: disc; margin-left: 20px; text-align: left;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2 class="glitch" data-text="ADMIN LOGIN">ADMIN LOGIN</h2>

    <form action="{{ route('login_admin_process') }}" method="POST">
        @csrf
        <label>USERNAME</label>
        <input type="text" name="username" placeholder="........" required>

        <label>PASSWORD</label>
        <input type="password" name="password" placeholder="........" required>

        <button type="submit">LOGIN</button>
    </form>
    <div class="link-text" style="margin-top: 10px;">
        <a href="{{ route('home') }}">← Back to Home</a>
    </div>
</div>
</body>
</html>