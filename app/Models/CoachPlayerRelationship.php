<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachPlayerRelationship extends Model
{
    use HasFactory;

    protected $fillable = [
        'coach_id',
        'player_id',
        'status',
        'hired_date',
        'notes',
    ];

    protected $casts = [
        'hired_date' => 'date',
    ];

    /**
     * Get the coach for this relationship.
     */
    public function coach()
    {
        return $this->belongsTo(User::class, 'coach_id');
    }

    /**
     * Get the player for this relationship.
     */
    public function player()
    {
        return $this->belongsTo(User::class, 'player_id');
    }
}
