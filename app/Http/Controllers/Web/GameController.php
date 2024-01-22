<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\TeamRepository;
use App\Services\GameService\GameService;
use Illuminate\Support\Facades\Session;

class GameController extends Controller
{
    protected GameService $gameService;

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    public function index()
    {
        $pickedTeams = $this->gameService->pickTeams();
        Session::put('pickedTeams', $pickedTeams->pluck('id')->toArray());
        return view('team.index', ['teams' => $pickedTeams]);
    }

    public function generateFixture()
    {
        $pickedTeamsId = Session::get('pickedTeams');
        $teamRepository = new TeamRepository();
        $data['teams'] = $teamRepository->getByIds($pickedTeamsId);
        $this->gameService->matchTeams($data);
        dd(Session::get('pickedTeams'));
    }
}
