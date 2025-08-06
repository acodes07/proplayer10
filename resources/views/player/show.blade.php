<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Player Profile</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d5016 50%, #4a7c59 100%);
            min-height: 100vh;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .profile-container {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 500px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }
        h2 {
            color: #4ade80;
            text-align: center;
            margin-bottom: 30px;
        }
        .profile-detail {
            margin-bottom: 20px;
            padding: 15px;
            background: rgba(255,255,255,0.05);
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
        .back-link {
            display: inline-flex;
            align-items: center;
            color: #9ca3af;
            text-decoration: none;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
        .back-link:hover {
            color: #4ade80;
        }
        .back-link i {
            margin-right: 8px;
        }
        .empty-message {
            color: #fca5a5;
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            font-size: 1.1rem;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <a href="{{ route('dashboard') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Back to Dashboard
        </a>
        <h2>Player Profile</h2>
        @if(!$player)
            <div class="empty-message">Nothing to see.</div>
        @else
            <div class="profile-detail">
                <div class="detail-label">Full Name</div>
                <div class="detail-value">{{ $player->full_name }}</div>
            </div>
            <div class="profile-detail">
                <div class="detail-label">Date of Birth</div>
                <div class="detail-value">{{ $player->date_of_birth }}</div>
            </div>
            <div class="profile-detail">
                <div class="detail-label">Nationality</div>
                <div class="detail-value">{{ $player->nationality }}</div>
            </div>
            <div class="profile-detail">
                <div class="detail-label">Position</div>
                <div class="detail-value">{{ $player->position }}</div>
            </div>
            <div class="profile-detail">
                <div class="detail-label">Height (cm)</div>
                <div class="detail-value">{{ $player->height_cm }}</div>
            </div>
            <div class="profile-detail">
                <div class="detail-label">Weight (kg)</div>
                <div class="detail-value">{{ $player->weight_kg }}</div>
            </div>
            <div class="profile-detail">
                <div class="detail-label">Preferred Foot</div>
                <div class="detail-value">{{ $player->preferred_foot }}</div>
            </div>
        @endif
    </div>
</body>
</html>