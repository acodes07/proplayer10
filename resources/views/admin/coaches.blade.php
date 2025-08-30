<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Coaches - Admin Dashboard</title>
    
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
        
        .stats-bar {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-bottom: 40px;
        }
        
        .stat-item {
            text-align: center;
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
        
        .coaches-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(74, 222, 128, 0.2);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }
        
        .section-title {
            color: #4ade80;
            font-size: 1.8rem;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .coaches-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 25px;
        }
        
        .coach-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 25px;
            border: 1px solid rgba(74, 222, 128, 0.1);
            transition: all 0.3s ease;
            position: relative;
        }
        
        .coach-card:hover {
            transform: translateY(-5px);
            border-color: rgba(74, 222, 128, 0.3);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .coach-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        
        .coach-info h3 {
            color: #4ade80;
            font-size: 1.3rem;
            margin-bottom: 5px;
        }
        
        .coach-id {
            color: #9ca3af;
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        .coach-details {
            margin-bottom: 20px;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .detail-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }
        
        .detail-label {
            color: #9ca3af;
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .detail-value {
            color: #e5e7eb;
            font-size: 1rem;
            font-weight: 500;
        }
        
        .coach-actions {
            display: flex;
            gap: 15px;
        }
        
        .btn {
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            cursor: pointer;
            font-family: inherit;
            font-size: 0.9rem;
        }
        
        .btn-view {
            background: rgba(59, 130, 246, 0.2);
            border: 1px solid rgba(59, 130, 246, 0.5);
            color: #93c5fd;
            flex: 1;
            justify-content: center;
        }
        
        .btn-view:hover {
            background: rgba(59, 130, 246, 0.3);
            color: #a7c7fd;
            transform: translateY(-2px);
        }
        
        .btn-delete {
            background: linear-gradient(45deg, #dc2626, #ef4444);
            color: white;
            flex: 1;
            justify-content: center;
        }
        
        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(220, 38, 38, 0.3);
        }
        
        .no-coaches {
            text-align: center;
            padding: 60px 20px;
            color: #9ca3af;
        }
        
        .no-coaches i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #6b7280;
        }
        
        .no-coaches h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #9ca3af;
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
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
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
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
        }
        
        .modal-content {
            background: rgba(30, 30, 30, 0.95);
            margin: 5% auto;
            padding: 30px;
            border-radius: 20px;
            width: 90%;
            max-width: 500px;
            border: 2px solid #dc2626;
            text-align: center;
        }
        
        .modal-title {
            color: #dc2626;
            font-size: 1.5rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .modal-message {
            color: #e5e7eb;
            font-size: 1.1rem;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .modal-actions {
            display: flex;
            gap: 15px;
            justify-content: center;
        }
        
        .btn-cancel {
            background: rgba(107, 114, 128, 0.2);
            border: 1px solid rgba(107, 114, 128, 0.5);
            color: #9ca3af;
            padding: 12px 24px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-cancel:hover {
            background: rgba(107, 114, 128, 0.3);
            color: #d1d5db;
        }
        
        .btn-confirm-delete {
            background: linear-gradient(45deg, #dc2626, #ef4444);
            color: white;
            padding: 12px 24px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-confirm-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(220, 38, 38, 0.3);
        }
        
        @media (max-width: 768px) {
            .coaches-grid {
                grid-template-columns: 1fr;
            }
            
            .header-content {
                flex-direction: column;
                gap: 15px;
            }
            
            .nav-links {
                flex-direction: column;
                gap: 10px;
            }
            
            .stats-bar {
                flex-direction: column;
                gap: 20px;
            }
            
            .page-title {
                font-size: 2rem;
            }
            
            .coach-card {
                padding: 20px;
            }
            
            .coach-actions {
                flex-direction: column;
            }
            
            .modal-content {
                margin: 10% auto;
                padding: 20px;
                width: 95%;
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
                    <a href="{{ route('admin.dashboard') }}" class="back-link">
                        <i class="fas fa-arrow-left"></i> Back to Admin Dashboard
                    </a>
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
            
            <div class="page-header">
                <h1 class="page-title"><i class="fas fa-user-tie"></i> All Coaches</h1>
                <p class="page-subtitle">Manage coach accounts and monitor activities</p>
            </div>
            
            <div class="stats-bar">
                <div class="stat-item">
                    <div class="stat-number">{{ count($coaches) }}</div>
                    <div class="stat-label">Total Coaches</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ count($coaches) }}</div>
                    <div class="stat-label">Active Coaches</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">0</div>
                    <div class="stat-label">Suspended</div>
                </div>
            </div>
            
            <div class="coaches-container">
                <h2 class="section-title">
                    <i class="fas fa-list"></i> Coach List
                </h2>
                
                @if(count($coaches) > 0)
                    <div class="coaches-grid">
                        @foreach($coaches as $coach)
                            <div class="coach-card">
                                <div class="coach-header">
                                    <div class="coach-info">
                                        <h3>{{ $coach->name }}</h3>
                                        <div class="coach-id">#{{ $coach->id }}</div>
                                    </div>
                                </div>
                                
                                <div class="coach-details">
                                    <div class="detail-row">
                                        <span class="detail-label">Email</span>
                                        <span class="detail-value">{{ $coach->email }}</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Phone</span>
                                        <span class="detail-value">{{ $coach->number }}</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Location</span>
                                        <span class="detail-value">{{ $coach->address }}</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Member Since</span>
                                        <span class="detail-value">{{ $coach->created_at ? $coach->created_at->format('M Y') : 'N/A' }}</span>
                                    </div>
                                </div>
                                
                                <div class="coach-actions">
                                    <a href="{{ route('admin.player.show', $coach->id) }}" class="btn btn-view">
                                        <i class="fas fa-eye"></i> View Profile
                                    </a>
                                    <button onclick="showDeleteModal({{ $coach->id }}, '{{ $coach->name }}')" class="btn btn-delete">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="no-coaches">
                        <i class="fas fa-user-tie"></i>
                        <h3>No Coaches Found</h3>
                        <p>There are currently no coaches registered in the system.</p>
                    </div>
                @endif
            </div>
        </div>
    </main>
    
    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <h3 class="modal-title">
                <i class="fas fa-exclamation-triangle"></i> Confirm Deletion
            </h3>
            <p class="modal-message" id="deleteMessage">
                Are you sure you want to delete this coach? This action cannot be undone.
            </p>
            <div class="modal-actions">
                <button onclick="closeDeleteModal()" class="btn-cancel">Cancel</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-confirm-delete">Delete Coach</button>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        function showDeleteModal(userId, userName) {
            const modal = document.getElementById('deleteModal');
            const message = document.getElementById('deleteMessage');
            const form = document.getElementById('deleteForm');
            
            message.textContent = `Are you sure you want to delete coach "${userName}"? This action cannot be undone and will remove all associated data.`;
            form.action = `/admin/delete-user/${userId}`;
            
            modal.style.display = 'block';
        }
        
        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.style.display = 'none';
        }
        
        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('deleteModal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
</html>




