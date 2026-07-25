<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - About</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="dashboard">
    <nav class="navbar">
        <div class="brand">ADMIN DASHBOARD</div>
        
        <div class="nav-menu">
            <a href="{{ route('dashboard_admin') }}" class="nav-link">DATABASE</a>
            <a href="{{ route('admin_about') }}" class="nav-link active">ABOUT</a> 
            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                @csrf
                <button type="submit" class="btn-logout-nav">LOGOUT</button>
            </form>
        </div>
    </nav>

    <div class="dashboard-content">
        
        <div class="dashboard-header">
            <div>
                <h2 class="glitch" data-text="ABOUT DASHBOARD ADMIN" style="margin: 0; text-align: left;" id="page-title">ABOUT DASHBOARD ADMIN</h2>
                <p style="color: #00ffff; margin-top: 5px;">ADMIN: {{ $admin_name }}</p>
            </div>
        </div>

        <div class="translator-container">
            <button class="translator-toggle" id="translate-button" data-lang="en" onclick="toggleLanguage()">
                Terjemahkan ke Bahasa Indonesia
            </button>
        </div>

        <div class="about-card">
            
            <div id="content-en">
                <h3 style="font-family: 'Orbitron'; color: var(--neon-pink); margin-top: 0;">DASHBOARD OVERVIEW</h3>
                <p>This is the Admin Dashboard. This page allows you to view registered Users.</p>
                
                <h3 style="font-family: 'Orbitron'; color: var(--neon-pink); margin-top: 20px;">KEY FUNCTION: USER MONITORING</h3>
                <p>The database page only displays the user's name and email.</p>
                <p>Passwords are not displayed at all to protect user privacy and maintain system integrity.</p>
            </div>

            <div id="content-id" style="display: none;">
                <h3 style="font-family: 'Orbitron'; color: var(--neon-pink); margin-top: 0;">TENTANG DASHBOARD</h3>
                <p>Ini adalah Dashboard Admin. Halaman ini memungkinkan Anda untuk melihat User yang terdaftar.</p>
                
                <h3 style="font-family: 'Orbitron'; color: var(--neon-pink); margin-top: 20px;">FUNGSI UTAMA: PEMANTAUAN USER</h3>
                <p>Halaman database hanya menampilkan nama dan email user.</p>
                <p>Kata sandi tidak ditampilkan sama sekali untuk menjaga privasi pengguna dan mempertahankan integritas sistem.</p>
            </div>
            
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

    <script>
        function toggleLanguage() {
            const button = document.getElementById('translate-button');
            const title = document.getElementById('page-title');
            const contentEn = document.getElementById('content-en');
            const contentId = document.getElementById('content-id');
            let currentLang = button.getAttribute('data-lang');

            if (currentLang === 'en') {
                button.setAttribute('data-lang', 'id');
                button.textContent = 'Terjemahkan ke English';
                title.setAttribute('data-text', 'TENTANG SISTEM');
                title.textContent = 'TENTANG SISTEM';
                contentEn.style.display = 'none';
                contentId.style.display = 'block';
            } else {
                button.setAttribute('data-lang', 'en');
                button.textContent = 'Terjemahkan ke Bahasa Indonesia';
                title.setAttribute('data-text', 'ABOUT SYSTEM');
                title.textContent = 'ABOUT SYSTEM';
                contentEn.style.display = 'block';
                contentId.style.display = 'none';
            }
        }
    </script>

</body>
</html>