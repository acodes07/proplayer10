<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Browse Players - Coach Dashboard</title>
    
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d5016 50%, #4a7c59 100%);
            min-height: 100vh;
            color: white;
        }
        
        .header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(74, 222, 128, 0.2);
            padding: 20px 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            color: #4ade80;
            text-decoration: none;
        }
        
        .nav-links {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .back-link {
            display: inline-flex;
            align-items: center;
            color: #9ca3af;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }
        
        .back-link:hover {
            color: #4ade80;
        }
        
        .back-link i {
            margin-right: 8px;
        }
        
        .main-content {
            padding: 40px 0;
        }
        
        .page-header {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 15px;
            color: #4ade80;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .page-subtitle {
            color: #9ca3af;
            font-size: 1.2rem;
            margin-bottom: 20px;
        }
        
        .stats-bar {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-bottom: 40px;
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: #4ade80;
            margin-bottom: 5px;
        }
        
        .stat-label {
            color: #9ca3af;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .players-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }
        
        .section-title {
            color: #4ade80;
            font-size: 1.8rem;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .players-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
        }
        
        .player-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 25px;
            border: 1px solid rgba(74, 222, 128, 0.1);
            transition: all 0.3s ease;
            position: relative;
        }
        
        .player-card:hover {
            transform: translateY(-5px);
            border-color: rgba(74, 222, 128, 0.3);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .player-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        
        .player-info h3 {
            color: #4ade80;
            font-size: 1.3rem;
            margin-bottom: 5px;
        }
        
        .player-id {
            color: #9ca3af;
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        .player-details {
            margin-bottom: 20px;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .detail-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }
        
        .detail-label {
            color: #9ca3af;
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .detail-value {
            color: #e5e7eb;
            font-size: 1rem;
            font-weight: 500;
        }
        
        .player-actions {
            display: flex;
            gap: 15px;
        }
        
        .btn {
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            cursor: pointer;
            font-family: inherit;
            font-size: 0.9rem;
        }
        
        .btn-view {
            background: rgba(59, 130, 246, 0.2);
            border: 1px solid rgba(59, 130, 246, 0.5);
            color: #93c5fd;
        }
        
        .btn-view:hover {
            background: rgba(59, 130, 246, 0.3);
            color: #a7c7fd;
            transform: translateY(-2px);
        }
        
        .btn-hire {
            background: linear-gradient(45deg, #22c55e, #4ade80);
            color: #1a1a1a;
            flex: 1;
            justify-content: center;
        }
        
        .btn-hire:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(34, 197, 94, 0.3);
        }
        
        .no-players {
            text-align: center;
            padding: 60px 20px;
            color: #9ca3af;
        }
        
        .no-players i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #6b7280;
        }
        
        .no-players h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #9ca3af;
        }
        
        .success-message {
            background: rgba(34, 197, 94, 0.2);
            border: 1px solid rgba(34, 197, 94, 0.5);
            color: #86efac;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            text-align: center;
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        @media (max-width: 768px) {
            .players-grid {
                grid-template-columns: 1fr;
            }
            
            .header-content {
                flex-direction: column;
                gap: 15px;
            }
            
            .nav-links {
                flex-direction: column;
                gap: 10px;
            }
            
            .stats-bar {
                flex-direction: column;
                gap: 20px;
            }
            
            .page-title {
                font-size: 2rem;
            }
            
            .player-card {
                padding: 20px;
            }
            
            .player-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <a href="{{ route('home') }}" class="logo">
                    <i class="fas fa-futbol"></i> ProPlayer#10
                </a>
                <div class="nav-links">
                    <a href="{{ route('coach.dashboard') }}" class="back-link">
                        <i class="fas fa-arrow-left"></i> Back to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </header>
    
    <main class="main-content">
        <div class="container">
            @if(session('success'))
                <div class="success-message">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif
            
            <div class="page-header">
                <h1 class="page-title"><i class="fas fa-search"></i> Browse Available Players</h1>
                <p class="page-subtitle">Discover talented players and build your dream team</p>
            </div>
            
            <div class="stats-bar">
                <div class="stat-item">
                    <div class="stat-number">{{ $totalPlayers }}</div>
                    <div class="stat-label">Total Players</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ count($availablePlayers) }}</div>
                    <div class="stat-label">Available</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ $hiredByThisCoach }}</div>
                    <div class="stat-label">Already Hired</div>
                </div>
            </div>
            
            <div class="players-container">
                <h2 class="section-title">
                    <i class="fas fa-users"></i> Available Players
                </h2>
                
                @if(count($availablePlayers) > 0)
                    <div class="players-grid">
                        @foreach($availablePlayers as $player)
                            <div class="player-card">
                                <div class="player-header">
                                    <div class="player-info">
                                        <h3>{{ $player->name }}</h3>
                                        <div class="player-id">#{{ $player->id }}</div>
                                    </div>
                                </div>
                                
                                <div class="player-details">
                                    <div class="detail-row">
                                        <span class="detail-label">Email</span>
                                        <span class="detail-value">{{ $player->email }}</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Phone</span>
                                        <span class="detail-value">{{ $player->number }}</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Location</span>
                                        <span class="detail-value">{{ $player->address }}</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Member Since</span>
                                        <span class="detail-value">{{ $player->created_at ? $player->created_at->format('M Y') : 'N/A' }}</span>
                                    </div>
                                </div>
                                
                                <div class="player-actions">
                                    <a href="{{ route('coach.player.show', $player->id) }}" class="btn btn-view">
                                        <i class="fas fa-eye"></i> View Profile
                                    </a>
                                    <button type="button" class="btn btn-hire" onclick="confirmHire({{ $player->id }}, '{{ $player->name }}')">
                                        <i class="fas fa-handshake"></i> Hire Player
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="no-players">
                        <i class="fas fa-users-slash"></i>
                        <h3>No Players Available</h3>
                        <p>There are currently no players registered in the system.</p>
                        <p>Check back later or encourage players to sign up!</p>
                    </div>
                @endif
            </div>
        </div>
    </main>
    
    <!-- Hidden form for hiring -->
    <form id="hireForm" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="notes" id="hireNotes">
    </form>
    
    <script>
        function confirmHire(playerId, playerName) {
            if (confirm(`Are you sure you want to hire ${playerName}?`)) {
                const form = document.getElementById('hireForm');
                form.action = `{{ url('/coach/hire-player') }}/${playerId}`;
                form.submit();
            }
        }
    </script>
</body>
</html>
