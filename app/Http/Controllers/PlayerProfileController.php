<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlayerProfileController extends Controller
{
    // Show the edit form for the player's profile
    public function edit()
    {
        $user = Auth::user();
        // Allow if role is 'player' or NULL (assuming NULL means player)
        if ($user->role !== 'player' && $user->role !== null) {
            abort(403, 'Unauthorized action.');
        }
        $player = DB::table('players')->where('full_name', $user->username)->first();
        return view('player.edit', compact('player'));
    }

    // Update the player's profile
    public function update(Request $request)
    {
        $user = Auth::user();
        // Allow if role is 'player' or NULL (assuming NULL means player)
        if ($user->role !== 'player' && $user->role !== null) {
            abort(403, 'Unauthorized action.');
        }
        $validated = $request->validate([
            'full_name' => 'required|string|max:100',
            'date_of_birth' => 'required|date',
            'nationality' => 'required|string|max:50',
            'position' => 'required|string|max:50',
            'height_cm' => 'required|integer|min:100|max:250',
            'weight_kg' => 'required|integer|min:30|max:200',
            'preferred_foot' => 'required|in:Left,Right,Both',
        ]);
        // Update or insert
        DB::table('players')->updateOrInsert(
            ['full_name' => $user->username],
            $validated
        );
        return redirect()->route('dashboard')->with('success', 'Your profile has been updated!');
    }

    // Show the player's profile (read-only)
    public function show()
    {
        $user = Auth::user();
        // Allow if role is 'player' or NULL (assuming NULL means player)
        if ($user->role !== 'player' && $user->role !== null) {
            abort(403, 'Unauthorized action.');
        }
        $player = DB::table('players')->where('full_name', $user->username)->first();
        return view('player.show', compact('player'));
    }

    // Show a player's profile by player_id (for coach/admin)
    public function showById($player_id)
    {
        $user = Auth::user();
        $player = \DB::table('players')->where('player_id', $player_id)->first();
        // Only allow coach or admin to view
        if (!in_array($user->role, ['coach', 'admin'])) {
            abort(403, 'Unauthorized action.');
        }
        return view('player.show', compact('player'));
    }
}