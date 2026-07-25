<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator - Asset List</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="dashboard">

    <nav class="navbar">
        <div class="brand" style="color: #ffaa00;">CYBER OPERATOR DASHBOARD</div>
        
        <div class="nav-menu">
            <a href="{{ route('dashboard_operator') }}" class="nav-link">HOME</a>
            <a href="{{ route('assets.index') }}" class="nav-link active">ASSET MANAGEMENT</a> 

            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                @csrf
                <button type="submit" class="btn-logout-nav">LOGOUT</button>
            </form>
        </div>
    </nav>

    <div class="dashboard-content">
        
        <div class="dashboard-header">
            <div>
                <h2 class="glitch" data-text="ASSET LIST" style="margin: 0; text-align: left;">ASSET LIST</h2>
                <p style="color: #ffaa00; margin-top: 5px;">Data Master Inventory</p>
            </div>
            <a href="{{ route('assets.create') }}" class="btn-primary" style="background: #00ffff; border: 1px solid #00ffff;">
                <i class="material-icons" style="font-size: 16px; margin-right: 5px;">add_box</i> ADD NEW ASSET
            </a>
        </div>
        
        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif


        <div class="data-card">
            @if ($assets->isEmpty())
                <p style="padding: 20px; color: #ff00ff;">
                    [SYSTEM LOG]: No assets data found in the inventory database.
                </p>
            @else
                <div style="overflow-x: auto;">
                    <table class="user-table" style="color: #eee; border-color: #ffaa00;">
                        <thead>
                            <tr style="background-color: rgba(255, 170, 0, 0.1);">
                                <th style="width: 50px;">#</th>
                                <th>ASSET CODE</th>
                                <th>NAME</th>
                                <th style="width: 120px;">STATUS</th>
                                <th>PURCHASE DATE</th>
                                <th style="width: 100px;">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assets as $index => $asset)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td style="font-weight: bold; color: #ffaa00;">{{ $asset->asset_code }}</td>
                                    <td>{{ $asset->name }}</td>
                                    <td>
                                        @php
                                            $statusColor = match($asset->status) {
                                                'Available' => '#00ff00',
                                                'In Use' => '#00ffff',
                                                'Maintenance' => '#ffaa00',
                                                'Retired' => '#ff00ff',
                                                default => '#fff',
                                            };
                                        @endphp
                                        <span style="color: {{ $statusColor }}; font-size: 12px; border: 1px solid {{ $statusColor }}; padding: 2px 8px; border-radius: 4px;">
                                            {{ strtoupper($asset->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $asset->purchase_date ? \Carbon\Carbon::parse($asset->purchase_date)->format('Y-m-d') : '-' }}</td>
                                    <td>
                                        <div style="display: flex; gap: 5px; justify-content: center;">
                                            <a href="{{ route('assets.edit', $asset->id) }}" title="Edit Asset" style="color: #00ffff;">
                                                <i class="material-icons" style="font-size: 18px;">edit</i>
                                            </a>
                                            <form action="{{ route('assets.destroy', $asset->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this asset?')" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Delete Asset" style="background: none; border: none; color: #ff00ff; cursor: pointer;">
                                                    <i class="material-icons" style="font-size: 18px;">delete</i>
                                                </button>
                                            </form>
                                        </div>
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