<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Player Profile</title>
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
        .edit-container {
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
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #e5e7eb;
        }
        .form-input, .form-select {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid rgba(74, 222, 128, 0.3);
            border-radius: 8px;
            background: rgba(255,255,255,0.1);
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        .form-input:focus, .form-select:focus {
            outline: none;
            border-color: #4ade80;
            box-shadow: 0 0 0 3px rgba(74, 222, 128, 0.1);
        }
        .form-input::placeholder {
            color: #9ca3af;
        }
        .btn {
            width: 100%;
            padding: 14px 20px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            background: linear-gradient(45deg, #4ade80, #22c55e);
            color: #1a1a1a;
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(74, 222, 128, 0.3);
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
        .error-message {
            background: rgba(239, 68, 68, 0.2);
            border: 1px solid rgba(239, 68, 68, 0.5);
            color: #fca5a5;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="edit-container">
        <a href="{{ route('dashboard') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Back to Dashboard
        </a>
        <h2>Edit Player Profile</h2>
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('player.update') }}">
            @csrf
            <div class="form-group">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" id="full_name" name="full_name" class="form-input" value="{{ old('full_name', $player->full_name ?? Auth::user()->username) }}" required>
            </div>
            <div class="form-group">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" id="date_of_birth" name="date_of_birth" class="form-input" value="{{ old('date_of_birth', $player->date_of_birth ?? '') }}" required>
            </div>
            <div class="form-group">
                <label for="nationality" class="form-label">Nationality</label>
                <input type="text" id="nationality" name="nationality" class="form-input" value="{{ old('nationality', $player->nationality ?? '') }}" required>
            </div>
            <div class="form-group">
                <label for="position" class="form-label">Position</label>
                <input type="text" id="position" name="position" class="form-input" value="{{ old('position', $player->position ?? '') }}" required>
            </div>
            <div class="form-group">
                <label for="height_cm" class="form-label">Height (cm)</label>
                <input type="number" id="height_cm" name="height_cm" class="form-input" value="{{ old('height_cm', $player->height_cm ?? '') }}" min="100" max="250" required>
            </div>
            <div class="form-group">
                <label for="weight_kg" class="form-label">Weight (kg)</label>
                <input type="number" id="weight_kg" name="weight_kg" class="form-input" value="{{ old('weight_kg', $player->weight_kg ?? '') }}" min="30" max="200" required>
            </div>
            <div class="form-group">
                <label for="preferred_foot" class="form-label">Preferred Foot</label>
                <select id="preferred_foot" name="preferred_foot" class="form-select" required>
                    <option value="">Select</option>
                    <option value="Left" {{ old('preferred_foot', $player->preferred_foot ?? '') == 'Left' ? 'selected' : '' }}>Left</option>
                    <option value="Right" {{ old('preferred_foot', $player->preferred_foot ?? '') == 'Right' ? 'selected' : '' }}>Right</option>
                    <option value="Both" {{ old('preferred_foot', $player->preferred_foot ?? '') == 'Both' ? 'selected' : '' }}>Both</option>
                </select>
            </div>
            <button type="submit" class="btn"><i class="fas fa-save"></i> Save Profile</button>
        </form>
    </div>
</body>
</html>