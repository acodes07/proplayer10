<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Record;

class PlayerProfileController extends Controller
{
    // Show the edit form for the player's profile
    public function edit()
    {
        $user = Auth::user();
        
        // Ensure only players can access this
        if ($user->role !== 'player') {
            abort(403, 'Unauthorized action. Only players can edit their profile.');
        }
        
        return view('player.edit', compact('user'));
    }

    // Update the player's profile
    public function update(Request $request)
    {
        $user = Auth::user();
        
        // Ensure only players can access this
        if ($user->role !== 'player') {
            abort(403, 'Unauthorized action. Only players can edit their profile.');
        }
        
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);
        
        // Update the user's information in the database
        $user->update($validated);
        
        return redirect()->route('player.dashboard')->with('success', 'Your profile has been updated successfully!');
    }

    // Show the player's profile (read-only)
    public function show()
    {
        $user = Auth::user();
        
        // Ensure only players can access this
        if ($user->role !== 'player') {
            abort(403, 'Unauthorized action. Only players can view their profile.');
        }
        
        // Get match records for this player
        $records = Record::where('player_id', $user->id)->orderBy('created_at', 'desc')->get();
        
        return view('player.show', compact('user', 'records'));
    }

    // Show a player's profile by player_id (for coach/admin)
    public function showById($player_id)
    {
        $user = Auth::user();
        
        // Only allow coach or admin to view
        if (!in_array($user->role, ['coach', 'admin'])) {
            abort(403, 'Unauthorized action. Only coaches and admins can view player profiles.');
        }
        
        // Get the user by ID since we don't have a separate players table
        $player = \App\Models\User::where('id', $player_id)->where('role', 'player')->first();
        
        if (!$player) {
            abort(404, 'Player not found.');
        }
        
        // Get match records for this player
        $records = Record::where('player_id', $player->id)->orderBy('created_at', 'desc')->get();
        
        return view('player.show', compact('player', 'records'));
    }
}