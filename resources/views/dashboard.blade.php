<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - ProPlayer#10</title>
    
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
        }
        
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 50px;
        }
        
        .user-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }
        
        .user-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }
        
        .user-card h2 {
            color: #4ade80;
            margin-bottom: 25px;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .user-detail {
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
            
            <div class="welcome-section">
                <h1 class="welcome-title">Welcome back, {{ $user->name }}!</h1>
                <p class="welcome-subtitle">Manage your football talent journey with ProPlayer#10</p>
            </div>
            
            <div class="dashboard-grid">
                <div class="user-card">
                    <h2><i class="fas fa-user-circle"></i> Your Profile</h2>
                    
                    <div class="user-detail">
                        <div class="detail-label">User ID</div>
                        <div class="detail-value">#{{ $user->id }}</div>
                    </div>
                    
                    <div class="user-detail">
                        <div class="detail-label">Username</div>
                        <div class="detail-value">{{ $user->name }}</div>
                    </div>
                    
                    <div class="user-detail">
                        <div class="detail-label">Email Address</div>
                        <div class="detail-value">{{ $user->email }}</div>
                    </div>
                    
                    <div class="user-detail">
                        <div class="detail-label">Role</div>
                        <div class="detail-value">
                            <span style="
                                display: inline-block;
                                padding: 6px 16px;
                                border-radius: 20px;
                                font-weight: bold;
                                color: white;
                                background: {{
                                    $user->role === 'admin' ? '#ef4444' :
                                    ($user->role === 'coach' ? '#3b82f6' : '#22c55e')
                                }};">
                                {{ ucfirst($user->role) }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="user-detail">
                        <div class="detail-label">Address</div>
                        <div class="detail-value">{{ $user->address }}</div>
                    </div>
                </div>
                
                @if($user->role === 'player' || $user->role === null)
                <div style="display: flex; gap: 16px; margin-top: 20px;">
                    <a href="{{ route('player.edit') }}" class="btn" style="background: linear-gradient(45deg, #3b82f6, #60a5fa); color: #fff; font-weight: bold; text-align: center; text-decoration: none;">Edit Profile</a>
                    <a href="{{ route('player.show') }}" class="btn" style="background: linear-gradient(45deg, #22c55e, #4ade80); color: #fff; font-weight: bold; text-align: center; text-decoration: none;">View Profile</a>
                </div>
                @endif
                
                <div class="stats-section">
                    <h2><i class="fas fa-chart-line"></i> Your Statistics</h2>
                    
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="stat-number">1</div>
                            <div class="stat-label">Active Account</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="stat-number">100%</div>
                            <div class="stat-label">Account Security</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="stat-number">5.0</div>
                            <div class="stat-label">Platform Rating</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="quick-actions">
                <h2><i class="fas fa-bolt"></i> Quick Actions</h2>
                
                <div class="actions-grid">
                    @if($user->role === 'player' || $user->role === null)
                    <a href="{{ route('player.edit') }}" class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="action-title">Edit Profile</div>
                        <div class="action-description">Update your personal information and preferences</div>
                    </a>
                    
                    <a href="{{ route('player.show') }}" class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="action-title">View Profile</div>
                        <div class="action-description">See your full player profile details</div>
                    </a>
                    @endif
                    
                    <div class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-cog"></i>
                        </div>
                        <div class="action-title">Settings</div>
                        <div class="action-description">Manage your account settings and privacy</div>
                    </div>
                    
                    <div class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-question-circle"></i>
                        </div>
                        <div class="action-title">Help & Support</div>
                        <div class="action-description">Get help and contact our support team</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html> 