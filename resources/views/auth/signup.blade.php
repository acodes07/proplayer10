<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up - ProPlayer#10</title>
    
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .auth-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 500px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        
        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo {
            font-size: 2rem;
            font-weight: 800;
            color: #4ade80;
            margin-bottom: 10px;
        }
        
        .auth-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #4ade80;
        }
        
        .auth-subtitle {
            color: #9ca3af;
            font-size: 0.9rem;
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
        
        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid rgba(74, 222, 128, 0.3);
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #4ade80;
            box-shadow: 0 0 0 3px rgba(74, 222, 128, 0.1);
        }
        
        .form-input::placeholder {
            color: #9ca3af;
        }
        
        .password-container {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #9ca3af;
            cursor: pointer;
            font-size: 1rem;
        }
        
        .password-toggle:hover {
            color: #4ade80;
        }
        
        .btn {
            width: 100%;
            padding: 14px 20px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .btn-primary {
            background: linear-gradient(45deg, #4ade80, #22c55e);
            color: #1a1a1a;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(74, 222, 128, 0.3);
        }
        
        .auth-footer {
            text-align: center;
            margin-top: 20px;
        }
        
        .auth-link {
            color: #4ade80;
            text-decoration: none;
            font-weight: 600;
        }
        
        .auth-link:hover {
            text-decoration: underline;
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

        .success-message {
            background: rgba(34, 197, 94, 0.2);
            border: 1px solid rgba(34, 197, 94, 0.5);
            color: #86efac;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            text-align: center;
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
        
        @media (max-width: 768px) {
            .auth-container {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <a href="{{ route('home') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Back to Home
        </a>
        
        <div class="auth-header">
            <div class="logo">
                <i class="fas fa-futbol"></i> ProPlayer#10
            </div>
            <h1 class="auth-title">Create Your Account</h1>
            <p class="auth-subtitle">Join the ultimate football talent management platform</p>
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

        @if(session('success'))
            <div class="success-message">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('signup.post') }}">
            @csrf
            
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-input" value="{{ old('username') }}" required placeholder="Enter your username">
            </div>
            
            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" id="email" name="email" class="form-input" value="{{ old('email') }}" required placeholder="Enter your email address">
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" class="form-input" required placeholder="Enter your password">
                    <button type="button" class="password-toggle" onclick="togglePassword('password')">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
            
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <div class="password-container">
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" required placeholder="Confirm your password">
                    <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation')">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
            
            <div class="form-group">
                <label for="role" class="form-label">Role</label>
                <select id="role" name="role" class="form-input" style="border: 2px solid #4ade80; background: rgba(255,255,255,0.15); color: #222; font-weight: bold;" required>
                    <option value="">Select your role</option>
                    <option value="player" {{ old('role') == 'player' ? 'selected' : '' }}>Player</option>
                    <option value="coach" {{ old('role') == 'coach' ? 'selected' : '' }}>Coach</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="address" class="form-label">Address</label>
                <textarea id="address" name="address" class="form-input" rows="3" required placeholder="Enter your address">{{ old('address') }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-user-plus"></i> Create Account
            </button>
        </form>
        
        <div class="auth-footer">
            <p>Already have an account? <a href="{{ route('signin') }}" class="auth-link">Sign In</a></p>
        </div>
    </div>
    
    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const button = input.nextElementSibling;
            const icon = button.querySelector('i');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html> 