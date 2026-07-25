<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator Dashboard - Asset Management</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="dashboard">

    <nav class="navbar">
        <div class="brand" style="color: #ffaa00;">CYBER OPERATOR DASHBOARD</div>
        
        <div class="nav-menu">
            <a href="{{ route('dashboard_operator') }}" class="nav-link active">HOME</a>
            <a href="{{ route('assets.index') }}" class="nav-link">ASSET MANAGEMENT</a> 

            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                @csrf
                <button type="submit" class="btn-logout-nav">LOGOUT</button>
            </form>
        </div>
    </nav>

    <div class="dashboard-content">
        
        <div class="dashboard-header">
            <div>
                <h2 class="glitch" data-text="WELCOME, OPERATOR" style="margin: 0; text-align: left;">WELCOME, OPERATOR</h2>
                <p style="color: #ffaa00; margin-top: 5px;">Access Level: OPERATOR | Agent: {{ $operator->name }}</p>
            </div>
        </div>

        <div class="kpi-grid">
            
            <div class="kpi-card" style="border-left-color: #ffaa00;">
                <span class="material-icons kpi-icon" style="color: #ffaa00;">inventory_2</span>
                <p class="kpi-label">TOTAL ASSETS REGISTERED</p>
                <h3 class="kpi-value">{{ $total_assets }}</h3>
            </div>
            
            <div class="kpi-card" style="border-left-color: #00ffff;">
                <span class="material-icons kpi-icon" style="color: #00ffff;">work_history</span>
                <p class="kpi-label">ASSETS IN USE</p>
                <h3 class="kpi-value">{{ $assets_in_use }}</h3>
            </div>

            <div class="kpi-card" style="border-left-color: #ff00ff;">
                <span class="material-icons kpi-icon" style="color: #ff00ff;">published_with_changes</span>
                <p class="kpi-label">AWAITING TRANSACTIONS</p>
                <h3 class="kpi-value">0</h3> 
            </div>
        </div>

        <div class="data-card" style="margin-top: 20px;">
            <h3 style="font-family: 'Orbitron'; color: #ffaa00; margin-top: 0;">OPERATOR QUICK ACCESS</h3>
            <div style="display: flex; gap: 20px; margin-top: 20px;">
                 <a href="{{ route('assets.index') }}" class="btn-primary" style="background: #ffaa00; border: 1px solid #ffaa00; color: #000; padding: 10px 20px;">
                    MANAGE ASSETS
                </a>
                 <a href="{{ route('assets.create') }}" class="btn-primary" style="background: transparent; border: 1px solid #00ffff; color: #00ffff; padding: 10px 20px;">
                    + NEW ASSET ENTRY
                </a>
            </div>
        </div>
        
    </div>

    <footer class="footer">
        <div class="footer-content" style="border-top: 1px solid #ffaa00;">
            <span class="status-dot" style="background: #ffaa00;"></span> SYSTEM STATUS: OPERATOR MODE ONLINE &nbsp;|&nbsp; LARAVEL v{{ \Illuminate\Foundation\Application::VERSION }}
            <br>
            <span style="opacity: 0.5; font-size: 10px; margin-top: 5px; display: inline-block;">
                © {{ date('Y') }} INTERNET PROGRAMMING PROJECT. ALL RIGHTS RESERVED.
            </span>
        </div>
    </footer>

</body>
</html>