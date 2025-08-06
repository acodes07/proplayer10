<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d5016 50%, #4a7c59 100%);
            min-height: 100vh;
            color: white;
        }
        .container {
            max-width: 1000px;
            margin: 40px auto;
            background: rgba(255,255,255,0.08);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }
        h2 {
            color: #ef4444;
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            padding: 14px 10px;
            border-bottom: 1px solid #4ade80;
            text-align: left;
        }
        th {
            color: #4ade80;
            font-size: 1.1rem;
        }
        tr:last-child td {
            border-bottom: none;
        }
        .btn-view {
            background: linear-gradient(45deg, #3b82f6, #60a5fa);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 8px 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
        }
        .btn-view:hover {
            background: linear-gradient(45deg, #60a5fa, #3b82f6);
            color: #222;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><i class="fas fa-user-shield"></i> Admin Dashboard</h2>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Address</th>
                    <th>Player Profile</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $userRow)
                <tr>
                    <td>{{ $userRow->username }}</td>
                    <td>{{ $userRow->email }}</td>
                    <td>{{ ucfirst($userRow->role) }}</td>
                    <td>{{ $userRow->address }}</td>
                    <td>
                        @php
                            $player = $players->firstWhere('full_name', $userRow->username);
                        @endphp
                        @if($player)
                            <a href="{{ url('/admin/player/'.$player->player_id) }}" class="btn-view"><i class="fas fa-eye"></i> View Player Profile</a>
                        @else
                            <span style="color:#fca5a5;">N/A</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>