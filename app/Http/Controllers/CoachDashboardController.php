<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CoachDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $players = \DB::table('players')->get(); // Fetch all players
        return view('coach.dashboard', compact('user', 'players'));
    }
}