<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'home_team_id',
        'away_team_id',
        'game_date',
        'week',
    ];

    protected $casts = [
        'game_date' => 'datetime',
    ];
}