<?php

namespace App\Repositories;

use App\Models\Game;

class GameRepository implements IGameRepository
{

    public function get(array $select = ['*'])
    {
        return Game::select($select)->with('homeTeam')->with('awayTeam')->with('result')->get();
    }

    public function getById(int $id, array $select = ['*'])
    {
        return Game::select($select)->with('homeTeam')->with('awayTeam')->with('result')
            ->where('id', $id)->firstOrFail();
    }

    public function getByWeek(int $week, array $select = ['*'])
    {
        return Game::select($select)->with('homeTeam')->with('awayTeam')->with('result')->get();
    }

    public function create(array $request)
    {
        return Game::create($request);
    }

    public function update(array $request, int $id)
    {
        return Game::find($id)->update($request);
    }

    public function delete(int $id)
    {
        return Game::find($id)->delete();
    }

    public function getOrderBy(string $column, string $order = 'asc', array $select = ['*'])
    {
        return Game::select($select)->with('homeTeam')->with('awayTeam')->orderBy($column, $order)->get();
    }
}
