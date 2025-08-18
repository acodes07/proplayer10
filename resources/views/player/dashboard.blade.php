<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Player Dashboard - ProPlayer#10</title>
    
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
            background: #22c55e;
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
        
        .player-status {
            background: rgba(34, 197, 94, 0.2);
            border: 1px solid rgba(34, 197, 94, 0.5);
            color: #86efac;
            padding: 15px 25px;
            border-radius: 25px;
            display: inline-block;
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
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
        
        .stats-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .stats-section h2 {
            color: #4ade80;
            margin-bottom: 25px;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            border: 1px solid rgba(74, 222, 128, 0.1);
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-3px);
            border-color: rgba(74, 222, 128, 0.3);
        }
        
        .stat-icon {
            font-size: 2.5rem;
            color: #4ade80;
            margin-bottom: 15px;
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
        
        .quick-actions {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            margin-top: 30px;
        }
        
        .quick-actions h2 {
            color: #4ade80;
            margin-bottom: 25px;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        
        .action-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            border: 1px solid rgba(74, 222, 128, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            display: block;
        }
        
        .action-card:hover {
            transform: translateY(-5px);
            border-color: rgba(74, 222, 128, 0.3);
            background: rgba(255, 255, 255, 0.08);
            text-decoration: none;
            color: inherit;
        }
        
        .action-icon {
            font-size: 2.5rem;
            color: #4ade80;
            margin-bottom: 15px;
        }
        
        .action-title {
            font-weight: 600;
            color: #4ade80;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }
        
        .action-description {
            color: #d1d5db;
            font-size: 0.9rem;
            line-height: 1.5;
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
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .actions-grid {
                grid-template-columns: 1fr;
            }
        }
        
        .coach-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            margin-top: 30px;
        }
        
        .coach-section h2 {
            color: #4ade80;
            margin-bottom: 25px;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .coach-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 25px;
            border: 1px solid rgba(74, 222, 128, 0.1);
        }
        
        .coach-name {
            font-size: 1.3rem;
            font-weight: 700;
            color: #4ade80;
            margin-bottom: 15px;
        }
        
        .coach-details .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .coach-details .detail-row:last-child {
            border-bottom: none;
        }
        
        .coach-details .detail-label {
            color: #9ca3af;
            font-weight: 600;
        }
        
        .coach-details .detail-value {
            color: white;
            font-weight: 500;
        }
        
        .no-coach-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .no-coach-card i {
            font-size: 3rem;
            color: #9ca3af;
            margin-bottom: 20px;
        }
        
        .no-coach-card p {
            color: #9ca3af;
            margin-bottom: 10px;
        }
        
        .no-coach-card p:last-child {
            margin-bottom: 0;
        }
        
        .recent-matches-section {
            margin-top: 40px;
        }
        
        .recent-matches-section h2 {
            color: #4ade80;
            font-size: 1.8rem;
            margin-bottom: 25px;
            font-weight: 700;
        }
        
        .matches-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .match-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            transition: transform 0.3s ease;
        }
        
        .match-card:hover {
            transform: translateY(-2px);
        }
        
        .match-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .match-date {
            color: #4ade80;
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        .match-venue {
            color: #9ca3af;
            font-size: 0.9rem;
        }
        
        .match-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .match-opponent {
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .match-stats {
            display: flex;
            gap: 15px;
        }
        
        .stat-item {
            color: #9ca3af;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .stat-item i {
            color: #4ade80;
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
                            <i class="fas fa-user-shield"></i> {{ ucfirst($user->role) }}
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
                <h1 class="welcome-title">Welcome to Your Player Dashboard!</h1>
                <p class="welcome-subtitle">Track your football journey and showcase your talent</p>
                <div class="player-status">
                    <i class="fas fa-futbol"></i> Active Player Account
                </div>
            </div>
            
            <div class="dashboard-grid">
                <div class="profile-card">
                    <h2><i class="fas fa-user-circle"></i> Player Profile</h2>
                    
                    <div class="profile-detail">
                        <div class="detail-label">Player ID</div>
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
                                background: #22c55e;">
                                <i class="fas fa-futbol"></i> Player
                            </span>
                        </div>
                    </div>
                </div>
                
                @if($coach)
                <div class="coach-section">
                    <h2><i class="fas fa-user-tie"></i> Your Coach</h2>
                    
                    <div class="coach-card">
                        <div class="coach-info">
                            <div class="coach-name">{{ $coach->name }}</div>
                            <div class="coach-details">
                                <div class="detail-row">
                                    <span class="detail-label">Email:</span>
                                    <span class="detail-value">{{ $coach->email }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Phone:</span>
                                    <span class="detail-value">{{ $coach->number }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Hired Date:</span>
                                    <span class="detail-value">{{ $coachRelationship->hired_date->format('M d, Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="coach-section">
                    <h2><i class="fas fa-user-tie"></i> Coach Status</h2>
                    
                    <div class="no-coach-card">
                        <i class="fas fa-user-slash"></i>
                        <p>You are not currently hired by any coach.</p>
                        <p>Coaches can discover and hire you from the browse players section.</p>
                    </div>
                </div>
                @endif
                
                <div class="stats-section">
                    <h2><i class="fas fa-chart-line"></i> Player Statistics</h2>
                    
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="stat-number">{{ $totalMatches }}</div>
                            <div class="stat-label">Total Matches</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-futbol"></i>
                            </div>
                            <div class="stat-number">{{ $totalGoals }}</div>
                            <div class="stat-label">Total Goals</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-hands-helping"></i>
                            </div>
                            <div class="stat-number">{{ $totalAssists }}</div>
                            <div class="stat-label">Total Assists</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="stat-number">{{ $averageRating }}</div>
                            <div class="stat-label">Average Rating</div>
                        </div>
                    </div>
                </div>
                
                @if($records->count() > 0)
                <div class="recent-matches-section">
                    <h2><i class="fas fa-history"></i> Recent Match Records</h2>
                    
                    <div class="matches-list">
                        @foreach($records->take(5) as $record)
                        <div class="match-card">
                            <div class="match-header">
                                <div class="match-date">{{ $record->match_date }}</div>
                                <div class="match-venue">{{ $record->venue }}</div>
                            </div>
                            <div class="match-details">
                                <div class="match-opponent">vs {{ $record->opponent }}</div>
                                <div class="match-stats">
                                    <span class="stat-item">
                                        <i class="fas fa-futbol"></i> {{ $record->goals_scored }} Goals
                                    </span>
                                    <span class="stat-item">
                                        <i class="fas fa-hands-helping"></i> {{ $record->assists }} Assists
                                    </span>
                                    <span class="stat-item">
                                        <i class="fas fa-star"></i> {{ $record->overall_rating }}/10 Rating
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            
            <div class="quick-actions">
                <h2><i class="fas fa-bolt"></i> Player Actions</h2>
                
                <div class="actions-grid">
                    <a href="{{ route('player.edit') }}" class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="action-title">Edit Profile</div>
                        <div class="action-description">Update your personal information and football details</div>
                    </a>
                    
                    <a href="{{ route('player.show') }}" class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="action-title">View Profile</div>
                        <div class="action-description">See your complete player profile and achievements</div>
                    </a>
                    
                    <div class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="action-title">Performance Stats</div>
                        <div class="action-description">Track your football performance and progress</div>
                    </div>
                    
                    <div class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="action-title">Training Schedule</div>
                        <div class="action-description">View and manage your training sessions</div>
                    </div>
                    
                    <div class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="action-title">Team Info</div>
                        <div class="action-description">Connect with your team and coaches</div>
                    </div>
                    
                    <div class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-cog"></i>
                        </div>
                        <div class="action-title">Settings</div>
                        <div class="action-description">Manage your account settings and privacy</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

