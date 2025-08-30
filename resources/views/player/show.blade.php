<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Player Profile - ProPlayer#10</title>
    
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
        
        .profile-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .profile-header {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .profile-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 20px;
            color: #4ade80;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .profile-subtitle {
            color: #9ca3af;
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        
        .profile-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 50px;
        }
        
        .profile-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }
        
        .profile-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.3);
        }
        
        .section-title {
            color: #4ade80;
            font-size: 1.5rem;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid rgba(74, 222, 128, 0.3);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .profile-detail {
            margin-bottom: 25px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            border-left: 4px solid #4ade80;
            transition: all 0.3s ease;
        }
        
        .profile-detail:hover {
            background: rgba(255, 255, 255, 0.08);
            transform: translateX(5px);
        }
        
        .detail-label {
            font-weight: 600;
            color: #9ca3af;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 8px;
        }
        
        .detail-value {
            color: #e5e7eb;
            font-size: 1.2rem;
            font-weight: 500;
        }
        
        .role-badge {
            display: inline-block;
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: bold;
            color: white;
            background: #22c55e;
            font-size: 1rem;
        }
        
        .actions-section {
            text-align: center;
            margin-top: 50px;
        }
        
        .edit-btn {
            display: inline-block;
            background: linear-gradient(45deg, #4ade80, #22c55e);
            color: #1a1a1a;
            padding: 18px 40px;
            border-radius: 15px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(74, 222, 128, 0.3);
        }
        
        .edit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(74, 222, 128, 0.4);
            color: #1a1a1a;
        }
        
        .stats-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            margin-top: 40px;
            text-align: center;
        }
        
        .stats-title {
            color: #4ade80;
            font-size: 1.8rem;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 25px;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 25px;
            border: 1px solid rgba(74, 222, 128, 0.1);
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
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
            margin-bottom: 8px;
        }
        
        .stat-label {
            color: #9ca3af;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        /* Match Records Section */
        .records-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            margin-top: 40px;
        }
        
        .records-title {
            color: #4ade80;
            font-size: 1.8rem;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .records-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
        }
        
        .record-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 25px;
            border: 1px solid rgba(74, 222, 128, 0.1);
            transition: all 0.3s ease;
        }
        
        .record-card:hover {
            transform: translateY(-5px);
            border-color: rgba(74, 222, 128, 0.3);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .record-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .record-opponent {
            color: #4ade80;
            font-size: 1.3rem;
            font-weight: 700;
        }
        
        .record-date {
            color: #9ca3af;
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        .record-rating {
            background: linear-gradient(45deg, #fbbf24, #f59e0b);
            color: #1a1a1a;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 1.1rem;
        }
        
        .record-details {
            margin-bottom: 20px;
        }
        
        .record-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            padding: 8px 0;
        }
        
        .record-row:last-child {
            margin-bottom: 0;
        }
        
        .record-label {
            color: #9ca3af;
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        .record-value {
            color: #e5e7eb;
            font-size: 1rem;
            font-weight: 500;
        }
        
        .record-notes {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 15px;
            margin-top: 15px;
        }
        
        .notes-label {
            color: #9ca3af;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .notes-content {
            color: #e5e7eb;
            font-size: 0.95rem;
            line-height: 1.5;
        }
        
        .no-records {
            text-align: center;
            padding: 60px 20px;
            color: #9ca3af;
        }
        
        .no-records i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #6b7280;
        }
        
        .no-records h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #9ca3af;
        }
        
        @media (max-width: 768px) {
            .profile-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .profile-title {
                font-size: 2.2rem;
            }
            
            .header-content {
                flex-direction: column;
                gap: 15px;
            }
            
            .profile-section {
                padding: 30px 20px;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .records-grid {
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
                <a href="{{ route('player.dashboard') }}" class="back-link">
                    <i class="fas fa-arrow-left"></i> Back to Player Dashboard
                </a>
            </div>
        </div>
    </header>
    
    <main class="main-content">
        <div class="profile-container">
            <div class="profile-header">
                <h1 class="profile-title"><i class="fas fa-user-circle"></i> Player Profile</h1>
                <p class="profile-subtitle">Your complete profile information and account details</p>
            </div>
            
            <div class="profile-grid">
                <!-- Personal Information Section -->
                <div class="profile-section">
                    <h3 class="section-title">
                        <i class="fas fa-user"></i> Personal Information
                    </h3>
                    
                    <div class="profile-detail">
                        <div class="detail-label">Player ID</div>
                        <div class="detail-value">#{{ $user->id }}</div>
                    </div>
                    
                    <div class="profile-detail">
                        <div class="detail-label">Full Name</div>
                        <div class="detail-value">{{ $user->name }}</div>
                    </div>
                    
                    <div class="profile-detail">
                        <div class="detail-label">Phone Number</div>
                        <div class="detail-value">{{ $user->number }}</div>
                    </div>
                    
                    <div class="profile-detail">
                        <div class="detail-label">Address</div>
                        <div class="detail-value">{{ $user->address }}</div>
                    </div>
                </div>
                
                <!-- Account Information Section -->
                <div class="profile-section">
                    <h3 class="section-title">
                        <i class="fas fa-shield-alt"></i> Account Information
                    </h3>
                    
                    <div class="profile-detail">
                        <div class="detail-label">Email Address</div>
                        <div class="detail-value">{{ $user->email }}</div>
                    </div>
                    
                    <div class="profile-detail">
                        <div class="detail-label">Account Type</div>
                        <div class="detail-value">
                            <span class="role-badge">
                                <i class="fas fa-futbol"></i> {{ ucfirst($user->role) }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="profile-detail">
                        <div class="detail-label">Member Since</div>
                        <div class="detail-value">{{ $user->created_at ? $user->created_at->format('F j, Y') : 'N/A' }}</div>
                    </div>
                    
                    <div class="profile-detail">
                        <div class="detail-label">Last Updated</div>
                        <div class="detail-value">{{ $user->updated_at ? $user->updated_at->format('F j, Y') : 'N/A' }}</div>
                    </div>
                </div>
            </div>
            
            <!-- Account Statistics Section -->
            <div class="stats-section">
                <h3 class="stats-title">
                    <i class="fas fa-chart-line"></i> Account Statistics
                </h3>
                
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
                    
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <div class="stat-number">{{ count($records) }}</div>
                        <div class="stat-label">Match Records</div>
                    </div>
                </div>
            </div>
            
            <!-- Match Records Section -->
            <div class="records-section">
                <h3 class="records-title">
                    <i class="fas fa-trophy"></i> Match Records
                </h3>
                
                @if(count($records) > 0)
                    <div class="records-grid">
                        @foreach($records as $record)
                            <div class="record-card">
                                <div class="record-header">
                                    <div>
                                        <div class="record-opponent">vs {{ $record->opponent }}</div>
                                        <div class="record-date">{{ $record->match_date }}</div>
                                    </div>
                                    <div class="record-rating">{{ $record->overall_rating }}</div>
                                </div>
                                
                                <div class="record-details">
                                    <div class="record-row">
                                        <span class="record-label">Goals</span>
                                        <span class="record-value">{{ $record->goals_scored }}</span>
                                    </div>
                                    <div class="record-row">
                                        <span class="record-label">Assists</span>
                                        <span class="record-value">{{ $record->assists }}</span>
                                    </div>
                                    <div class="record-row">
                                        <span class="record-label">Minutes Played</span>
                                        <span class="record-value">{{ $record->match_time_played }}'</span>
                                    </div>
                                    <div class="record-row">
                                        <span class="record-label">Fouls</span>
                                        <span class="record-value">{{ $record->total_fouls }}</span>
                                    </div>
                                    <div class="record-row">
                                        <span class="record-label">Yellow Cards</span>
                                        <span class="record-value">{{ $record->yellow_cards }}</span>
                                    </div>
                                    <div class="record-row">
                                        <span class="record-label">Red Cards</span>
                                        <span class="record-value">{{ $record->red_cards }}</span>
                                    </div>
                                    <div class="record-row">
                                        <span class="record-label">Venue</span>
                                        <span class="record-value">{{ $record->venue }}</span>
                                    </div>
                                </div>
                                
                                @if($record->notes)
                                    <div class="record-notes">
                                        <div class="notes-label">Notes</div>
                                        <div class="notes-content">{{ $record->notes }}</div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="no-records">
                        <i class="fas fa-trophy"></i>
                        <h3>No Match Records Yet</h3>
                        <p>Your match performance records will appear here once they are added by administrators.</p>
                    </div>
                @endif
            </div>
            
            <!-- Actions Section -->
            <div class="actions-section">
                <a href="{{ route('player.edit') }}" class="edit-btn">
                    <i class="fas fa-edit"></i> Edit Profile
                </a>
            </div>
        </div>
    </main>
</body>
</html>