<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Match Record - Admin Dashboard</title>
    
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
        
        .player-info {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            margin-bottom: 40px;
            text-align: center;
        }
        
        .player-name {
            color: #4ade80;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .player-id {
            color: #9ca3af;
            font-size: 1.1rem;
        }
        
        .form-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            margin: 0 auto;
        }
        
        .form-title {
            color: #4ade80;
            font-size: 1.8rem;
            margin-bottom: 30px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }
        
        .form-section {
            margin-bottom: 30px;
        }
        
        .section-title {
            color: #4ade80;
            font-size: 1.3rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid rgba(74, 222, 128, 0.3);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            margin-bottom: 25px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group.full-width {
            grid-column: 1 / -1;
        }
        
        .form-label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #e5e7eb;
            font-size: 1rem;
        }
        
        .form-input, .form-textarea {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid rgba(74, 222, 128, 0.3);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-input:focus, .form-textarea:focus {
            outline: none;
            border-color: #4ade80;
            box-shadow: 0 0 0 4px rgba(74, 222, 128, 0.1);
            background: rgba(255, 255, 255, 0.15);
        }
        
        .form-input::placeholder {
            color: #9ca3af;
        }
        
        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }
        
        .form-actions {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 40px;
        }
        
        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        
        .btn-cancel {
            background: rgba(107, 114, 128, 0.2);
            border: 1px solid rgba(107, 114, 128, 0.5);
            color: #9ca3af;
        }
        
        .btn-cancel:hover {
            background: rgba(107, 114, 128, 0.3);
            color: #d1d5db;
            transform: translateY(-2px);
        }
        
        .btn-submit {
            background: linear-gradient(45deg, #4ade80, #22c55e);
            color: #1a1a1a;
        }
        
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(74, 222, 128, 0.4);
        }
        
        .error-message {
            background: rgba(239, 68, 68, 0.2);
            border: 1px solid rgba(239, 68, 68, 0.5);
            color: #fca5a5;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            font-size: 0.95rem;
        }
        
        .error-message ul {
            margin-left: 20px;
        }
        
        .error-message li {
            margin-bottom: 5px;
        }
        
        .field-info {
            background: rgba(74, 222, 128, 0.1);
            border: 1px solid rgba(74, 222, 128, 0.3);
            color: #86efac;
            padding: 12px 16px;
            border-radius: 8px;
            margin-top: 8px;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .header-content {
                flex-direction: column;
                gap: 15px;
            }
            
            .nav-links {
                flex-direction: column;
                gap: 10px;
            }
            
            .page-title {
                font-size: 2rem;
            }
            
            .form-container {
                padding: 30px 20px;
                margin: 0 20px;
            }
            
            .form-actions {
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
                    <a href="{{ route('admin.players') }}" class="back-link">
                        <i class="fas fa-arrow-left"></i> Back to Players List
                    </a>
                </div>
            </div>
        </div>
    </header>
    
    <main class="main-content">
        <div class="container">
            <div class="page-header">
                <h1 class="page-title"><i class="fas fa-plus"></i> Add Match Record</h1>
                <p class="page-subtitle">Record detailed match performance for the selected player</p>
            </div>
            
            <div class="player-info">
                <div class="player-name">{{ $player->name }}</div>
                <div class="player-id">Player ID: #{{ $player->id }}</div>
            </div>
            
            <div class="form-container">
                <h2 class="form-title">
                    <i class="fas fa-clipboard-list"></i> Match Performance Details
                </h2>
                
                @if ($errors->any())
                    <div class="error-message">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('admin.store-match-record', $player->id) }}">
                    @csrf
                    
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-gamepad"></i> Match Information
                        </h3>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="opponent" class="form-label">Opponent Team</label>
                                <input type="text" id="opponent" name="opponent" class="form-input" value="{{ old('opponent') }}" required placeholder="e.g., Team Alpha">
                                <div class="field-info">
                                    <i class="fas fa-info-circle"></i>
                                    Name of the opposing team
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="match_date" class="form-label">Match Date</label>
                                <input type="text" id="match_date" name="match_date" class="form-input" value="{{ old('match_date') }}" required placeholder="e.g., 15th August 2024">
                                <div class="field-info">
                                    <i class="fas fa-calendar"></i>
                                    Date when the match was played
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="venue" class="form-label">Venue</label>
                                <input type="text" id="venue" name="venue" class="form-input" value="{{ old('venue') }}" required placeholder="e.g., Central Stadium">
                                <div class="field-info">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Location where the match was held
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="match_time_played" class="form-label">Minutes Played</label>
                                <input type="number" id="match_time_played" name="match_time_played" class="form-input" value="{{ old('match_time_played') }}" required min="0" max="120" placeholder="e.g., 90">
                                <div class="field-info">
                                    <i class="fas fa-clock"></i>
                                    Total minutes the player was on the field (0-120)
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-star"></i> Performance Metrics
                        </h3>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="overall_rating" class="form-label">Overall Rating</label>
                                <input type="number" id="overall_rating" name="overall_rating" class="form-input" value="{{ old('overall_rating') }}" required min="0" max="10" step="0.1" placeholder="e.g., 8.5">
                                <div class="field-info">
                                    <i class="fas fa-star"></i>
                                    Player's overall performance rating (0.0-10.0)
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="goals_scored" class="form-label">Goals Scored</label>
                                <input type="number" id="goals_scored" name="goals_scored" class="form-input" value="{{ old('goals_scored') }}" required min="0" placeholder="e.g., 2">
                                <div class="field-info">
                                    <i class="fas fa-futbol"></i>
                                    Number of goals scored by the player
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="assists" class="form-label">Assists</label>
                                <input type="number" id="assists" name="assists" class="form-input" value="{{ old('assists') }}" required min="0" placeholder="e.g., 1">
                                <div class="field-info">
                                    <i class="fas fa-hands-helping"></i>
                                    Number of assists provided by the player
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="total_fouls" class="form-label">Total Fouls</label>
                                <input type="number" id="total_fouls" name="total_fouls" class="form-input" value="{{ old('total_fouls') }}" required min="0" placeholder="e.g., 3">
                                <div class="field-info">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    Total number of fouls committed
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="yellow_cards" class="form-label">Yellow Cards</label>
                                <input type="number" id="yellow_cards" name="yellow_cards" class="form-input" value="{{ old('yellow_cards') }}" required min="0" placeholder="e.g., 1">
                                <div class="field-info">
                                    <i class="fas fa-square"></i>
                                    Number of yellow cards received
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="red_cards" class="form-label">Red Cards</label>
                                <input type="number" id="red_cards" name="red_cards" class="form-input" value="{{ old('red_cards') }}" required min="0" placeholder="e.g., 0">
                                <div class="field-info">
                                    <i class="fas fa-square"></i>
                                    Number of red cards received
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-edit"></i> Additional Notes
                        </h3>
                        
                        <div class="form-group full-width">
                            <label for="notes" class="form-label">Match Notes</label>
                            <textarea id="notes" name="notes" class="form-textarea" placeholder="Add any additional observations, tactical notes, or special highlights about the player's performance...">{{ old('notes') }}</textarea>
                            <div class="field-info">
                                <i class="fas fa-info-circle"></i>
                                Optional notes about the player's performance, tactics, or special moments
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <a href="{{ route('admin.players') }}" class="btn btn-cancel">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-submit">
                            <i class="fas fa-save"></i> Save Match Record
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>




