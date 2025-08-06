<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $users = DB::table('users')->get();
        $players = DB::table('players')->get();
        return view('admin.dashboard', compact('user', 'users', 'players'));
    }
}