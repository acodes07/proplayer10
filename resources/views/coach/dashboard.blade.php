<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach Dashboard</title>
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
            max-width: 900px;
            margin: 40px auto;
            background: rgba(255,255,255,0.08);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }
        h2 {
            color: #3b82f6;
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
            background: linear-gradient(45deg, #22c55e, #4ade80);
            color: #1a1a1a;
            border: none;
            border-radius: 8px;
            padding: 8px 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
        }
        .btn-view:hover {
            background: linear-gradient(45deg, #4ade80, #22c55e);
            color: #222;
        }
    </style>
</head>
<body>
    <div class="container">
        <div style="margin-bottom: 16px; color: #fca5a5; font-weight: bold;">
            Debug: Role = {{ $user->role }}, Players found = {{ count($players) }}
        </div>
        <h2><i class="fas fa-chalkboard-teacher"></i> Coach Dashboard</h2>
        <table>
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Position</th>
                    <th>Nationality</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($players as $player)
                <tr>
                    <td>{{ $player->full_name }}</td>
                    <td>{{ $player->position }}</td>
                    <td>{{ $player->nationality }}</td>
                    <td>
                        <a href="{{ url('/coach/player/'.$player->player_id) }}" class="btn-view"><i class="fas fa-eye"></i> View Profile</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>