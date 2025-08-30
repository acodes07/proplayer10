<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - ProPlayer#10</title>
    
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
            background: #dc2626;
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
            color: #9ca3af;
            font-size: 1.2rem;
            margin-bottom: 20px;
        }
        
        .admin-status {
            background: rgba(220, 38, 38, 0.2);
            border: 1px solid rgba(220, 38, 38, 0.5);
            color: #fca5a5;
            padding: 15px 25px;
            border-radius: 25px;
            display: inline-block;
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }
        
        .stat-icon {
            font-size: 3rem;
            color: #4ade80;
            margin-bottom: 20px;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: #4ade80;
            margin-bottom: 10px;
        }
        
        .stat-label {
            color: #9ca3af;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .management-sections {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 50px;
        }
        
        .management-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.3s ease;
        }
        
        .management-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.3);
        }
        
        .management-icon {
            font-size: 4rem;
            color: #4ade80;
            margin-bottom: 25px;
        }
        
        .management-title {
            color: #4ade80;
            font-size: 1.8rem;
            margin-bottom: 15px;
            font-weight: 700;
        }
        
        .management-description {
            color: #9ca3af;
            font-size: 1.1rem;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .management-btn {
            display: inline-block;
            background: linear-gradient(45deg, #4ade80, #22c55e);
            color: #1a1a1a;
            padding: 15px 30px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(74, 222, 128, 0.3);
        }
        
        .management-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(74, 222, 128, 0.4);
            color: #1a1a1a;
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
        }
        
        .error-message {
            background: rgba(239, 68, 68, 0.2);
            border: 1px solid rgba(239, 68, 68, 0.5);
            color: #fca5a5;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            text-align: center;
            backdrop-filter: blur(10px);
        }
        
        @media (max-width: 768px) {
            .management-sections {
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
            
            .stats-grid {
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
                        <div class="role-badge">
                            <i class="fas fa-shield-alt"></i> {{ ucfirst($user->role) }}
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
                <h1 class="welcome-title">Welcome to Admin Dashboard!</h1>
                <p class="welcome-subtitle">Manage players, coaches, and system operations</p>
                <div class="admin-status">
                    <i class="fas fa-shield-alt"></i> System Administrator Access
                </div>
            </div>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number">{{ $totalPlayers }}</div>
                    <div class="stat-label">Total Players</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="stat-number">{{ $totalCoaches }}</div>
                    <div class="stat-label">Total Coaches</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div class="stat-number">{{ $totalRecords }}</div>
                    <div class="stat-label">Match Records</div>
                </div>
            </div>
            
            <div class="management-sections">
                <div class="management-card">
                    <div class="management-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="management-title">Player Management</h3>
                    <p class="management-description">
                        View all registered players, manage their profiles, add match records, and remove accounts if necessary.
                    </p>
                    <a href="{{ route('admin.players') }}" class="management-btn">
                        <i class="fas fa-eye"></i> Show All Players
                    </a>
                </div>
                
                <div class="management-card">
                    <div class="management-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3 class="management-title">Coach Management</h3>
                    <p class="management-description">
                        Monitor all registered coaches, review their activities, and manage their access to the platform.
                    </p>
                    <a href="{{ route('admin.coaches') }}" class="management-btn">
                        <i class="fas fa-eye"></i> Show All Coaches
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>