<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'player_name',
        'opponent',
        'overall_rating',
        'goals_scored',
        'total_fouls',
        'match_time_played',
        'assists',
        'yellow_cards',
        'red_cards',
        'match_date',
        'venue',
        'notes',
    ];

    /**
     * Get the player that owns the record.
     */
    public function player()
    {
        return $this->belongsTo(User::class, 'player_id');
    }
}
