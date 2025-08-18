<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\CoachPlayerRelationship;

class CoachDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        
        // Ensure only coaches can access this dashboard
        if ($user->role !== 'coach') {
            return redirect()->route('dashboard')->with('error', 'Access denied. This dashboard is for coaches only.');
        }
        
        // Get players hired by this coach with relationship data
        $assignedPlayers = $user->hiredPlayers()->with('player')->get();
        
        // Debug: Log the count
        \Log::info("Coach {$user->id} ({$user->name}) has {$assignedPlayers->count()} hired players");
        
        // Get coach rating (for now, default values)
        $coachRating = [
            'overall' => 4.5,
            'total_reviews' => 12,
            'stars' => 4
        ];
        
        return view('coach.dashboard', compact('user', 'assignedPlayers', 'coachRating'));
    }

    public function browsePlayers()
    {
        $user = Auth::user();
        
        // Ensure only coaches can access this
        if ($user->role !== 'coach') {
            abort(403, 'Access denied. Only coaches can browse players.');
        }
        
        // Get all available players (not already hired by any coach)
        $hiredPlayerIds = CoachPlayerRelationship::where('status', 'active')->pluck('player_id');
        $availablePlayers = User::where('role', 'player')
            ->whereNotIn('id', $hiredPlayerIds)
            ->get();
        
        // Get total players count
        $totalPlayers = User::where('role', 'player')->count();
        
        // Get players hired by this coach
        $hiredByThisCoach = $user->hiredPlayers()->count();
        
        // Debug: Log the counts
        \Log::info("Browse Players - Coach {$user->id}: Total Players: {$totalPlayers}, Available: " . count($availablePlayers) . ", Hired by this coach: {$hiredByThisCoach}");
        
        return view('coach.browse-players', compact('user', 'availablePlayers', 'totalPlayers', 'hiredByThisCoach'));
    }

    public function hirePlayer(Request $request, $playerId)
    {
        $user = Auth::user();
        
        // Ensure only coaches can access this
        if ($user->role !== 'coach') {
            abort(403, 'Access denied. Only coaches can hire players.');
        }
        
        $player = User::where('id', $playerId)->where('role', 'player')->first();
        
        if (!$player) {
            abort(404, 'Player not found.');
        }
        
        // Check if player is already hired
        $existingHire = CoachPlayerRelationship::where('player_id', $playerId)
            ->where('status', 'active')
            ->first();
            
        if ($existingHire) {
            return redirect()->route('coach.browse-players')->with('error', "{$player->name} is already hired by another coach.");
        }
        
        // Create the hiring relationship
        $relationship = CoachPlayerRelationship::create([
            'coach_id' => $user->id,
            'player_id' => $playerId,
            'status' => 'active',
            'hired_date' => now(),
            'notes' => $request->input('notes', ''),
        ]);
        
        // Debug: Log the hiring
        \Log::info("Coach {$user->id} hired player {$playerId} - Relationship ID: {$relationship->id}");
        
        return redirect()->route('coach.dashboard')->with('success', "You have successfully hired {$player->name}!");
    }
}