<?php

namespace App\Services\GameService;

use App\Repositories\GameRepository;
use App\Repositories\TeamRepository;

abstract class AGameService implements IGameService
{

    protected GameRepository $gameRepository;

    public function __construct()
    {
        $this->gameRepository = new GameRepository();
    }

    public function pickTeams(int $limit = 4)
    {
        $teamRepository = new TeamRepository();
        return $teamRepository->getRandomly($limit);

    }

    public function matchTeams(array $data)
    {
        $teams = $data['teams'];
        $totalTeams = count($teams);
        $rounds = ($totalTeams - 1) * 2;
        $matchesPerRound = $totalTeams / 2;
        $games = [];
        foreach ($teams as $team) {
            foreach ($teams as $opponent) {
                if ($team->id != $opponent->id) {
                    $games[] = [
                        'home_team_id' => $team->id,
                        'away_team_id' => $opponent->id,
                    ];
                }
            }
        }

        $games = array_chunk($games, $matchesPerRound, true);
        $this->initStandings($teams);
        foreach ($games as $key => $round) {
            $week = $key + 1;
            foreach ($round as $game) {
                $game['week'] = $week;

                $this->gameRepository->create($game);
            }
        }

    }

    public function playNextWeek(array $data)
    {
        $games = $data['games'] ?? $this->gameRepository->getByWeek($data['week']);

        foreach ($games as $game) {
            $gameResult = [
                'home_team_score' => rand(0, 5),
                'away_team_score' => rand(0, 5),
            ];
            $gameResult['winner_id'] = $gameResult['home_team_score'] > $gameResult['away_team_score'] ? $game->home_team_id : $game->away_team_id;
            $gameResult['winner_id'] = $gameResult['home_team_score'] == $gameResult['away_team_score'] ? null : $gameResult['winner_id'];
            $game->result()->create($gameResult);
        }
    }

    public function playAllWeeks()
    {
        $games = $this->gameRepository->get();
        $this->playNextWeek(['games' => $games]);
    }

    private function initStandings($teams)
    {
        foreach ($teams as $team) {
            $team->standings()->create();
        }
    }
}
