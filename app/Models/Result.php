<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'game_id',
        'home_team_score',
        'away_team_score',
        'winner_id',
    ];

    public function match()
    {
        return $this->belongsTo(Game::class);
    }
}
