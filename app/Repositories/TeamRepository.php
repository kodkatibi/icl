<?php

namespace App\Repositories;

use App\Models\Team;

class TeamRepository implements ITeamRepository
{

    public function get(array $select = ['*'])
    {
        return Team::select($select)->with('standings')->get();
    }

    public function getById(int $id, array $select = ['*'])
    {
        return Team::select($select)->with('standings')->where('id', $id)->firstOrFail();
    }

    public function create(array $request)
    {
        return Team::create($request);
    }

    public function update(array $request, int $id)
    {
        return Team::find($id)->update($request);
    }

    public function delete(int $id)
    {
        return Team::find($id)->delete();
    }

    public function getRandomly(int $count, array $select = ['*'])
    {
        return Team::select($select)->with('standings')->inRandomOrder()->limit($count)->get();
    }
}
