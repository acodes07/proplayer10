<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AuthController extends Controller
{
    public function showSignup()
    {
        return view('auth.signup');
    }

    public function showSignin()
    {
        return view('auth.signin');
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'role' => 'required|in:admin,coach,player',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // First, let's check if we can connect to the database
            if (!\DB::connection()->getPdo()) {
                throw new \Exception('Database connection failed');
            }
            
            // Check if the users table exists
            if (!\Schema::hasTable('users')) {
                throw new \Exception('Users table does not exist. Please run migrations first.');
            }
            
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'number' => $request->number,
                'address' => $request->address,
                'role' => $request->role,
            ]);

            // Don't auto-login, redirect to signin page instead
            return redirect()->route('signin')->with('success', 'Account created successfully! Please sign in with your credentials.');
        } catch (\Exception $e) {
            // Log the actual error for debugging
            \Log::error('User creation failed: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return redirect()->back()
                ->withErrors(['email' => 'Signup failed: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function signin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $role = Auth::user()->role;
            
            if ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($role === 'coach') {
                return redirect()->route('coach.dashboard');
            } elseif ($role === 'player') {
                return redirect()->route('player.dashboard');
            } else {
                return redirect()->route('dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
} 