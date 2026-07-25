<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="scanline"></div>

<div class="login-card user">

    @if(session('error'))
        <div class="error-box">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="success-box">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="glitch" data-text="USER LOGIN">USER LOGIN</h2>

    <form action="{{ route('login_user_process') }}" method="POST">
        @csrf
        <label>NAME</label>
        <input type="text" name="name" placeholder="Your name..." required>

        <label>EMAIL</label>
        <input type="email" name="email" placeholder="example@gmail.com" required>

        <label>PASSWORD</label>
        <input type="password" name="password" placeholder="Your password..." required>

        <button type="submit">LOGIN</button>
    </form>

    <div class="link-text">
        Don't have an account? <a href="{{ route('register-user') }}">Register User</a>
    </div>
    <div class="link-text" style="margin-top: 10px;">
        <a href="{{ route('home') }}">← Back to Home</a>
    </div>
</div>

</body>
</html>