<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Poppins:wght@300&display=swap');

        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: linear-gradient(135deg, #000011, #330033, #000055);
            background-size: 400% 400%;
            animation: bg 12s ease infinite;
            font-family: 'Poppins';
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        @keyframes bg {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .card {
            background: rgba(10, 0, 25, 0.7);
            padding: 40px;
            width: 430px;
            border-radius: 14px;
            border: 2px solid #9900ff;
            backdrop-filter: blur(15px);
            box-shadow: 0 0 25px #9900ff99;
            text-align: center;
        }

        h1 {
            font-family: 'Orbitron';
            font-size: 24px;
            text-shadow: 0 0 8px #cc00ff;
        }

        .info-box {
            background: rgba(255,255,255,0.07);
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            text-align: left;
        }

        a.logout-link {
            color: #ff88ff;
            text-decoration: none;
            margin-top: 25px;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="card">

    <h1>USER DASHBOARD</h1>

    <div class="info-box">
        <p><strong>Name:</strong> {{ $user->name ?? 'Tidak Ditemukan' }}</p>
        <p><strong>Email:</strong> {{ $user->email ?? 'Tidak Ditemukan' }}</p>
    </div>

    <a class="logout-link" href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

</div>

</body>
</html>