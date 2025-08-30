<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'number',
        'role',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the records for the user (if they are a player).
     */
    public function records()
    {
        return $this->hasMany(Record::class, 'player_id');
    }

    /**
     * Get the players hired by this coach.
     */
    public function hiredPlayers()
    {
        return $this->hasMany(CoachPlayerRelationship::class, 'coach_id')->where('status', 'active');
    }

    /**
     * Get the coach who hired this player.
     */
    public function hiredByCoach()
    {
        return $this->hasOne(CoachPlayerRelationship::class, 'player_id')->where('status', 'active');
    }
}
