<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run()
    {
        $insert = [];
        $teams = file_get_contents(__DIR__ . '/data/teams/en-clubs.json');
        foreach (json_decode($teams)->clubs as $team) {
            $insert[] = [
                'name' => $team->name,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        Team::insert($insert);

    }
}
