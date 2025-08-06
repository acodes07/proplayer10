<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication routes
Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.post');
Route::get('/signin', [AuthController::class, 'showSignin'])->name('signin');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard (protected routes)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/coach/dashboard', [\App\Http\Controllers\CoachDashboardController::class, 'index'])->name('coach.dashboard');
    Route::get('/admin/dashboard', [\App\Http\Controllers\AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/coach/player/{player_id}', [\App\Http\Controllers\PlayerProfileController::class, 'showById'])->name('coach.player.show');
    Route::get('/admin/player/{player_id}', [\App\Http\Controllers\PlayerProfileController::class, 'showById'])->name('admin.player.show');
    Route::get('/profile/edit', [\App\Http\Controllers\PlayerProfileController::class, 'edit'])->name('player.edit');
    Route::post('/profile/edit', [\App\Http\Controllers\PlayerProfileController::class, 'update'])->name('player.update');
    Route::get('/profile/view', [\App\Http\Controllers\PlayerProfileController::class, 'show'])->name('player.show');
});
