<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ProPlayer#10 - Football Talent Management System</title>
    
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
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }
        
        .logo {
            font-size: 2rem;
            font-weight: 800;
            color: #4ade80;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        
        .auth-buttons {
            display: flex;
            gap: 15px;
        }
        
        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            font-size: 1rem;
        }
        
        .btn-primary {
            background: linear-gradient(45deg, #4ade80, #22c55e);
            color: #1a1a1a;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(74, 222, 128, 0.3);
        }
        
        .btn-secondary {
            background: transparent;
            color: white;
            border: 2px solid #4ade80;
        }
        
        .btn-secondary:hover {
            background: #4ade80;
            color: #1a1a1a;
        }
        
        .hero {
            text-align: center;
            padding: 80px 0;
        }
        
        .hero h1 {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 20px;
            background: linear-gradient(45deg, #4ade80, #22c55e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: none;
        }
        
        .hero p {
            font-size: 1.5rem;
            margin-bottom: 40px;
            color: #e5e7eb;
            font-weight: 600;
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
            color: #9ca3af;
            margin-bottom: 50px;
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 60px;
        }
        
        .feature-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            border: 1px solid rgba(74, 222, 128, 0.2);
            transition: transform 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
        }
        
        .feature-icon {
            font-size: 3rem;
            color: #4ade80;
            margin-bottom: 20px;
        }
        
        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #4ade80;
        }
        
        .feature-card p {
            color: #d1d5db;
            line-height: 1.6;
        }
        
        .cta-section {
            text-align: center;
            margin-top: 80px;
            padding: 60px 0;
        }
        
        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #4ade80;
        }
        
        .cta-section p {
            font-size: 1.2rem;
            margin-bottom: 40px;
            color: #e5e7eb;
        }
        
        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        
        .btn-large {
            padding: 16px 32px;
            font-size: 1.1rem;
        }
        
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p {
                font-size: 1.2rem;
            }
            
            .auth-buttons {
                flex-direction: column;
                gap: 10px;
            }
            
            .features {
                grid-template-columns: 1fr;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="logo">
                <i class="fas fa-futbol"></i> ProPlayer#10
            </div>
            <div class="auth-buttons">
                <a href="{{ route('signin') }}" class="btn btn-secondary">Sign In</a>
                <a href="{{ route('signup') }}" class="btn btn-primary">Sign Up</a>
            </div>
        </header>
        
        <main class="hero">
            <h1>Welcome to ProPlayer#10</h1>
            <p>From Grassroots to Greatness!</p>
            <div class="hero-subtitle">
                The ultimate integrated football talent management system
            </div>
            
            <div class="features">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Multi-Role Platform</h3>
                    <p>Connect as Admin, Coach, Scout, or Player. Each role has specialized tools and features designed for your specific needs in talent management.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Talent Tracking</h3>
                    <p>Comprehensive player profiles, performance metrics, and progress tracking to identify and nurture the next generation of football stars.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h3>Career Development</h3>
                    <p>From grassroots to professional level, our platform supports every stage of a player's journey with tailored development programs.</p>
                </div>
            </div>
        </main>
        
        <section class="cta-section">
            <h2>Ready to Transform Football Talent Management?</h2>
            <p>Join thousands of professionals who trust ProPlayer#10 for their talent development needs</p>
            <div class="cta-buttons">
                <a href="{{ route('signup') }}" class="btn btn-primary btn-large">
                    <i class="fas fa-rocket"></i> Get Started Now
                </a>
                <a href="{{ route('signin') }}" class="btn btn-secondary btn-large">
                    <i class="fas fa-sign-in-alt"></i> Sign In to Dashboard
                </a>
            </div>
        </section>
    </div>
</body>
</html>
