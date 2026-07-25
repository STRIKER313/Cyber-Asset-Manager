<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator Register</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="scanline"></div>

<div class="register-card operator"> 

    @if(session('error'))
        <div class="error-box">
            {{ session('error') }}
        </div>
    @endif

    <h2 class="glitch" data-text="REGISTER OPERATOR">REGISTER OPERATOR</h2>
    
    @if ($errors->any())
        <div class="error-box">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('register_operator_process') }}" method="POST">
        @csrf

        <label>NAME</label>
        <input type="text" name="name" placeholder="Your name..." required value="{{ old('name') }}">

        <label>EMAIL</label>
        <input type="email" name="email" placeholder="example@gmail.com" required value="{{ old('email') }}">

        <label>PASSWORD</label>
        <input type="password" name="password" placeholder="Your password..." required>

        <button type="submit">REGISTER OPERATOR</button>
    </form>

    <div class="link-text">
        Already have an account? <a href="{{ route('login-operator') }}">Login Operator</a>
    </div>
    <div class="link-text" style="margin-top: 10px;">
        <a href="{{ route('home') }}">← Back to Home</a>
    </div>

</div>

</body>
</html>