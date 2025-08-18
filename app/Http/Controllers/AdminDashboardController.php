<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Record;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        
        // Ensure only admins can access this dashboard
        if ($user->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Access denied. This dashboard is for administrators only.');
        }
        
        // Get counts for dashboard
        $totalPlayers = User::where('role', 'player')->count();
        $totalCoaches = User::where('role', 'coach')->count();
        $totalRecords = Record::count();
        
        return view('admin.dashboard', compact('user', 'totalPlayers', 'totalCoaches', 'totalRecords'));
    }

    public function showAllPlayers()
    {
        $user = Auth::user();
        
        // Ensure only admins can access this
        if ($user->role !== 'admin') {
            abort(403, 'Access denied. Only administrators can view all players.');
        }
        
        $players = User::where('role', 'player')->get();
        
        return view('admin.players', compact('user', 'players'));
    }

    public function showAllCoaches()
    {
        $user = Auth::user();
        
        // Ensure only admins can access this
        if ($user->role !== 'admin') {
            abort(403, 'Access denied. Only administrators can view all coaches.');
        }
        
        $coaches = User::where('role', 'coach')->get();
        
        return view('admin.coaches', compact('user', 'coaches'));
    }

    public function deleteUser($userId)
    {
        $user = Auth::user();
        
        // Ensure only admins can access this
        if ($user->role !== 'admin') {
            abort(403, 'Access denied. Only administrators can delete users.');
        }
        
        $userToDelete = User::findOrFail($userId);
        
        // Don't allow admin to delete themselves
        if ($userToDelete->id === $user->id) {
            return redirect()->back()->with('error', 'You cannot delete your own account.');
        }
        
        $userName = $userToDelete->name;
        $userRole = $userToDelete->role;
        
        // Delete the user (this will also delete their records due to cascade)
        $userToDelete->delete();
        
        return redirect()->back()->with('success', "Successfully deleted {$userRole} {$userName}.");
    }

    public function showAddMatchRecord($playerId)
    {
        $user = Auth::user();
        
        // Ensure only admins can access this
        if ($user->role !== 'admin') {
            abort(403, 'Access denied. Only administrators can add match records.');
        }
        
        $player = User::where('id', $playerId)->where('role', 'player')->firstOrFail();
        
        return view('admin.add-match-record', compact('user', 'player'));
    }

    public function storeMatchRecord(Request $request, $playerId)
    {
        $user = Auth::user();
        
        // Ensure only admins can access this
        if ($user->role !== 'admin') {
            abort(403, 'Access denied. Only administrators can add match records.');
        }
        
        $player = User::where('id', $playerId)->where('role', 'player')->firstOrFail();
        
        $validated = $request->validate([
            'opponent' => 'required|string|max:100',
            'overall_rating' => 'required|numeric|min:0|max:10',
            'goals_scored' => 'required|integer|min:0',
            'total_fouls' => 'required|integer|min:0',
            'match_time_played' => 'required|integer|min:0|max:120',
            'assists' => 'required|integer|min:0',
            'yellow_cards' => 'required|integer|min:0',
            'red_cards' => 'required|integer|min:0',
            'match_date' => 'required|string|max:50',
            'venue' => 'required|string|max:100',
            'notes' => 'nullable|string|max:500',
        ]);
        
        // Create the match record
        Record::create([
            'player_id' => $player->id,
            'player_name' => $player->name,
            'opponent' => $validated['opponent'],
            'overall_rating' => $validated['overall_rating'],
            'goals_scored' => $validated['goals_scored'],
            'total_fouls' => $validated['total_fouls'],
            'match_time_played' => $validated['match_time_played'],
            'assists' => $validated['assists'],
            'yellow_cards' => $validated['yellow_cards'],
            'red_cards' => $validated['red_cards'],
            'match_date' => $validated['match_date'],
            'venue' => $validated['venue'],
            'notes' => $validated['notes'],
        ]);
        
        return redirect()->route('admin.players')->with('success', "Match record added successfully for {$player->name}!");
    }
}