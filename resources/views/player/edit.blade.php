<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Player Profile - ProPlayer#10</title>
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
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .edit-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 50px;
            width: 100%;
            max-width: 800px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        
        .edit-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .edit-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 15px;
            color: #4ade80;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .edit-subtitle {
            color: #9ca3af;
            font-size: 1.1rem;
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
        
        .btn {
            width: 100%;
            padding: 18px 30px;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            background: linear-gradient(45deg, #4ade80, #22c55e);
            color: #1a1a1a;
            transition: all 0.3s ease;
            margin-top: 20px;
        }
        
        .btn:hover {
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
            
            .edit-container {
                padding: 30px 20px;
                margin: 20px;
            }
            
            .edit-title {
                font-size: 2rem;
            }
            
            .header-content {
                flex-direction: column;
                gap: 15px;
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
        <div class="edit-container">
            <div class="edit-header">
                <h1 class="edit-title"><i class="fas fa-edit"></i> Edit Player Profile</h1>
                <p class="edit-subtitle">Update your personal information and contact details</p>
            </div>
            
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
                
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-user-circle"></i> Personal Information
                    </h3>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" id="name" name="name" class="form-input" value="{{ old('name', $user->name) }}" required placeholder="Enter your full name">
                            <div class="field-info">
                                <i class="fas fa-info-circle"></i>
                                This is your display name that will be shown to coaches and administrators
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="number" class="form-label">Phone Number</label>
                            <input type="text" id="number" name="number" class="form-input" value="{{ old('number', $user->number) }}" required placeholder="Enter your phone number">
                            <div class="field-info">
                                <i class="fas fa-phone"></i>
                                Your contact number for team communications
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group full-width">
                        <label for="address" class="form-label">Address</label>
                        <textarea id="address" name="address" class="form-textarea" required placeholder="Enter your complete address">{{ old('address', $user->address) }}</textarea>
                        <div class="field-info">
                            <i class="fas fa-map-marker-alt"></i>
                            Your residential address for official records
                        </div>
                    </div>
                </div>
                
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-shield-alt"></i> Account Information
                    </h3>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-input" value="{{ $user->email }}" disabled>
                            <div class="field-info">
                                <i class="fas fa-lock"></i>
                                Email cannot be changed for security reasons
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Account Role</label>
                            <input type="text" class="form-input" value="{{ ucfirst($user->role) }}" disabled>
                            <div class="field-info">
                                <i class="fas fa-user-tag"></i>
                                Your account type is set to Player
                            </div>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn">
                    <i class="fas fa-save"></i> Save Profile Changes
                </button>
            </form>
        </div>
    </main>
</body>
</html>