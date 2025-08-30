<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coach Dashboard - ProPlayer#10</title>
    
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
        
        .user-menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .user-info {
            text-align: right;
        }
        
        .user-name {
            font-weight: 600;
            color: #4ade80;
            font-size: 1.1rem;
        }
        
        .user-email {
            font-size: 0.9rem;
            color: #9ca3af;
        }
        
        .role-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            background: #3b82f6;
            color: white;
            margin-top: 5px;
        }
        
        .logout-btn {
            background: rgba(239, 68, 68, 0.2);
            border: 1px solid rgba(239, 68, 68, 0.5);
            color: #fca5a5;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            cursor: pointer;
            font-family: inherit;
        }
        
        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.3);
            color: #fecaca;
            transform: translateY(-2px);
        }
        
        .main-content {
            padding: 40px 0;
        }
        
        .welcome-section {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .welcome-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 10px;
            color: #4ade80;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .welcome-subtitle {
            font-size: 1.2rem;
            color: #9ca3af;
            margin-bottom: 20px;
        }
        
        .coach-status {
            background: rgba(59, 130, 246, 0.2);
            border: 1px solid rgba(59, 130, 246, 0.5);
            color: #93c5fd;
            padding: 15px 25px;
            border-radius: 25px;
            display: inline-block;
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
            margin-bottom: 50px;
        }
        
        .profile-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }
        
        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }
        
        .profile-card h2 {
            color: #4ade80;
            margin-bottom: 25px;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .profile-detail {
            margin-bottom: 20px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            border-left: 4px solid #4ade80;
        }
        
        .detail-label {
            font-weight: 600;
            color: #9ca3af;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }
        
        .detail-value {
            color: #e5e7eb;
            font-size: 1.1rem;
            font-weight: 500;
        }
        
        .rating-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        
        .rating-title {
            color: #4ade80;
            margin-bottom: 20px;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .rating-score {
            font-size: 3rem;
            font-weight: 800;
            color: #fbbf24;
            margin-bottom: 10px;
        }
        
        .rating-stars {
            font-size: 1.5rem;
            color: #fbbf24;
            margin-bottom: 15px;
        }
        
        .rating-reviews {
            color: #9ca3af;
            font-size: 0.9rem;
        }
        
        .players-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            margin-bottom: 40px;
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        
        .section-title {
            color: #4ade80;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .browse-btn {
            background: linear-gradient(45deg, #3b82f6, #60a5fa);
            color: white;
            padding: 12px 24px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .browse-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
            color: white;
        }
        
        .players-list {
            min-height: 200px;
        }
        
        .players-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        
        .player-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(74, 222, 128, 0.1) 100%);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .player-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #4ade80, #22c55e, #16a34a);
        }
        
        .player-card:hover {
            transform: translateY(-5px);
            border-color: rgba(74, 222, 128, 0.4);
            box-shadow: 0 15px 35px rgba(74, 222, 128, 0.2);
        }
        
        .player-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        
        .player-info h4 {
            color: #4ade80;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .player-id {
            color: #9ca3af;
            font-size: 0.85rem;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.1);
            padding: 4px 8px;
            border-radius: 8px;
            display: inline-block;
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
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .detail-value {
            color: #e5e7eb;
            font-size: 0.95rem;
            font-weight: 500;
        }
        
        .player-actions {
            display: flex;
            gap: 10px;
        }
        
        .btn {
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: none;
            cursor: pointer;
            font-family: inherit;
            font-size: 0.85rem;
        }
        
        .btn-view {
            background: rgba(59, 130, 246, 0.2);
            border: 1px solid rgba(59, 130, 246, 0.4);
            color: #93c5fd;
            flex: 1;
            justify-content: center;
        }
        
        .btn-view:hover {
            background: rgba(59, 130, 246, 0.3);
            color: #a7c7fd;
            transform: translateY(-2px);
        }
        
        .no-players {
            text-align: center;
            color: #9ca3af;
            font-size: 1.1rem;
            padding: 60px 20px;
        }
        
        .no-players i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #6b7280;
            opacity: 0.5;
        }
        
        .no-players p {
            margin-bottom: 10px;
        }
        
        .no-players p:last-child {
            margin-bottom: 0;
            font-size: 0.95rem;
            opacity: 0.8;
        }
        
        .success-message {
            background: rgba(34, 197, 94, 0.2);
            border: 1px solid rgba(34, 197, 94, 0.5);
            color: #86efac;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 30px;
            text-align: center;
            backdrop-filter: blur(10px);
        }
        
        .error-message {
            background: rgba(239, 68, 68, 0.2);
            border: 1px solid rgba(239, 68, 68, 0.5);
            color: #fca5a5;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 30px;
            text-align: center;
            backdrop-filter: blur(10px);
        }
        
        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .header-content {
                flex-direction: column;
                gap: 15px;
            }
            
            .user-menu {
                flex-direction: column;
                gap: 10px;
            }
            
            .welcome-title {
                font-size: 2rem;
            }
            
            .section-header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            .players-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .player-card {
                padding: 20px;
            }
            
            .player-actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
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
                <div class="user-menu">
                    <div class="user-info">
                        <div class="user-name">{{ $user->name }}</div>
                        <div class="user-email">{{ $user->email }}</div>
                        <div class="role-badge">
                            <i class="fas fa-user-tie"></i> {{ ucfirst($user->role) }}
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
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
            
            @if(session('error'))
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                </div>
            @endif
            
            <div class="welcome-section">
                <h1 class="welcome-title">Welcome to Your Coach Dashboard!</h1>
                <p class="welcome-subtitle">Manage your team and discover new talent</p>
                <div class="coach-status">
                    <i class="fas fa-user-tie"></i> Professional Coach Account
                </div>
            </div>
            
            <div class="dashboard-grid">
                <div class="profile-card">
                    <h2><i class="fas fa-user-circle"></i> Coach Profile</h2>
                    
                    <div class="profile-detail">
                        <div class="detail-label">Coach ID</div>
                        <div class="detail-value">#{{ $user->id }}</div>
                    </div>
                    
                    <div class="profile-detail">
                        <div class="detail-label">Full Name</div>
                        <div class="detail-value">{{ $user->name }}</div>
                    </div>
                    
                    <div class="profile-detail">
                        <div class="detail-label">Email Address</div>
                        <div class="detail-value">{{ $user->email }}</div>
                    </div>
                    
                    <div class="profile-detail">
                        <div class="detail-label">Phone Number</div>
                        <div class="detail-value">{{ $user->number }}</div>
                    </div>
                    
                    <div class="profile-detail">
                        <div class="detail-label">Address</div>
                        <div class="detail-value">{{ $user->address }}</div>
                    </div>
                    
                    <div class="profile-detail">
                        <div class="detail-label">Account Type</div>
                        <div class="detail-value">
                            <span style="
                                display: inline-block;
                                padding: 6px 16px;
                                border-radius: 20px;
                                font-weight: bold;
                                color: white;
                                background: #3b82f6;">
                                <i class="fas fa-user-tie"></i> Coach
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="rating-card">
                    <h3 class="rating-title">
                        <i class="fas fa-star"></i> Coach Rating
                    </h3>
                    
                    <div class="rating-score">{{ $coachRating['overall'] }}</div>
                    
                    <div class="rating-stars">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $coachRating['stars'])
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </div>
                    
                    <div class="rating-reviews">
                        Based on {{ $coachRating['total_reviews'] }} reviews
                    </div>
                </div>
            </div>
            
            <div class="players-section">
                <div class="section-header">
                    <h3 class="section-title">
                        <i class="fas fa-users"></i> Players to Coach ({{ count($assignedPlayers) }})
                    </h3>
                    <a href="{{ route('coach.browse-players') }}" class="browse-btn">
                        <i class="fas fa-search"></i> Browse Players
                    </a>
                </div>
                
                <div class="players-list">
                    @if(count($assignedPlayers) > 0)
                        <div class="players-grid">
                            @foreach($assignedPlayers as $relationship)
                                @php $player = $relationship->player; @endphp
                                <div class="player-card">
                                    <div class="player-header">
                                        <div class="player-info">
                                            <h4>{{ $player->name }}</h4>
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
                                            <span class="detail-label">Hired Date</span>
                                            <span class="detail-value">{{ $relationship->hired_date->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="player-actions">
                                        <a href="{{ route('coach.player.show', $player->id) }}" class="btn btn-view">
                                            <i class="fas fa-eye"></i> View Profile
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="no-players">
                            <i class="fas fa-users-slash"></i>
                            <p>No players hired yet.</p>
                            <p>Click "Browse Players" to discover and hire new talent!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
</body>
</html>