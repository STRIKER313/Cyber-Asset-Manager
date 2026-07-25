<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Database</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="dashboard">
    <nav class="navbar">
        <div class="brand">ADMIN DASHBOARD</div>
        
        <div class="nav-menu">
            <a href="{{ route('dashboard_admin') }}" class="nav-link active">DATABASE</a>
            <a href="{{ route('admin_about') }}" class="nav-link">ABOUT</a> 
            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                @csrf
                <button type="submit" class="btn-logout-nav">LOGOUT</button>
            </form>
        </div>
    </nav>

    <div class="dashboard-content">
        <div class="dashboard-header">
            <div>
                <h2 class="glitch" data-text="USER LIST" style="margin: 0; text-align: left;">USER LIST</h2>
                <p style="color: #00ffff; margin-top: 5px;">Admin: {{ $admin_name }}</p>
            </div>
        </div>

        <div class="data-card">
            @if ($users->isEmpty())
                <p style="padding: 20px; color: #ff00ff;">
                    Data User Not Found.
                </p>
            @else
                <div style="overflow-x: auto;">
                    <table class="user-table">
                        <thead>
                            <tr>
                                <th style="width: 50px;">ID</th>
                                <th>USERNAME</th>
                                <th>EMAIL ADDRESS</th>
                                <th style="width: 100px;">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td style="font-weight: bold; color: #fff;">{{ $user->name }}</td>
                                    <td style="font-family: monospace; color: #00ffff;">{{ $user->email }}</td>
                                    <td>
                                        <span style="color: #00ff00; font-size: 12px; border: 1px solid #00ff00; padding: 2px 8px; border-radius: 4px;">
                                            ACTIVE
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

    </div>

    <footer class="footer">
        <div class="footer-content">
            <span class="status-dot"></span> SYSTEM STATUS: ONLINE &nbsp;|&nbsp; SECURE CONNECTION ENCRYPTED &nbsp;|&nbsp; LARAVEL v{{ \Illuminate\Foundation\Application::VERSION }}
            <br>
            <span style="opacity: 0.5; font-size: 10px; margin-top: 5px; display: inline-block;">
                © {{ date('Y') }} INTERNET PROGRAMMING PROJECT. ALL RIGHTS RESERVED.
            </span>
        </div>
    </footer>

</body>
</html>