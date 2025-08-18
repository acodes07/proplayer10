<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Record;

class PlayerDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        
        // Ensure only players can access this dashboard
        if ($user->role !== 'player') {
            return redirect()->route('dashboard')->with('error', 'Access denied. This dashboard is for players only.');
        }
        
        // Get player's match records
        $records = Record::where('player_id', $user->id)->orderBy('created_at', 'desc')->get();
        
        // Calculate statistics
        $totalMatches = $records->count();
        $totalGoals = $records->sum('goals_scored');
        $totalAssists = $records->sum('assists');
        $averageRating = $totalMatches > 0 ? round($records->avg('overall_rating'), 1) : 0;
        
        // Get coach information if player is hired
        $coachRelationship = $user->hiredByCoach()->with('coach')->first();
        $coach = $coachRelationship ? $coachRelationship->coach : null;
        
        return view('player.dashboard', compact('user', 'records', 'totalMatches', 'totalGoals', 'totalAssists', 'averageRating', 'coach', 'coachRelationship'));
    }
}

