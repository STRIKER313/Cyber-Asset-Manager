<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator - Edit Asset</title>
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
            <h2 class="glitch" data-text="EDIT ASSET: {{ $asset->asset_code }}" style="margin: 0; text-align: left;">EDIT ASSET: {{ $asset->asset_code }}</h2>
        </div>
        
        <div class="form-card">
            
            <form action="{{ route('assets.update', $asset->id) }}" method="POST">
                @csrf
                @method('PUT') 
                
                <div class="form-group">
                    <label for="asset_code">Asset Code (e.g., LPT-001)</label>
                    <input type="text" id="asset_code" name="asset_code" value="{{ old('asset_code', $asset->asset_code) }}" required>
                    @error('asset_code')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Asset Name/Description</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $asset->name) }}" required>
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" required>
                        @foreach(['Available', 'In Use', 'Maintenance', 'Retired'] as $status)
                            <option value="{{ $status }}" {{ old('status', $asset->status) == $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                    @error('status')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="acquisition_value">Acquisition Value (Rp)</label>
                    <input type="number" step="any" id="acquisition_value" name="acquisition_value" value="{{ old('acquisition_value', $asset->acquisition_value) }}">
                    @error('acquisition_value')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="purchase_date">Purchase Date</label>
                    <input type="date" id="purchase_date" name="purchase_date" value="{{ old('purchase_date', $asset->purchase_date) }}">
                    @error('purchase_date')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary" style="background: #00ffff; color: #000;">
                        <i class="material-icons" style="font-size: 16px; margin-right: 5px;">save</i> UPDATE ASSET
                    </button>
                    <a href="{{ route('assets.index') }}" class="btn-secondary">
                        <i class="material-icons" style="font-size: 16px; margin-right: 5px;">arrow_back</i> CANCEL
                    </a>
                </div>
            </form>

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