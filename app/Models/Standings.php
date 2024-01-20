<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Standings extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'team_id',
        'points',
        'goals_for',
        'goals_against',
        'sum_won_match',
        'sum_lose_match',
        'sum_draw_match',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
