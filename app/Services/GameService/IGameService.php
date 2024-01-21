<?php

namespace App\Services\GameService;

interface IGameService
{
    public function pickTeams(int $limit = 4);

    public function matchTeams(array $data);

    public function playNextWeek(array $data);

    public function playAllWeeks(array $data);

}
