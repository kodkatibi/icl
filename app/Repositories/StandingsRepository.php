<?php

namespace App\Repositories;

use App\Models\Standings;

class StandingsRepository implements IStandingsRepository
{

    public function get(array $select = ['*'])
    {
        return Standings::select($select)->with('team')->get();
    }

    public function getById(int $id, array $select = ['*'])
    {
        return Standings::select($select)->with('team')->where('id', $id)->firstOrFail();
    }

    public function create(array $request)
    {
        return Standings::create($request);
    }

    public function update(array $request, int $id)
    {
        return Standings::find($id)->update($request);
    }

    public function delete(int $id)
    {
        return Standings::find($id)->delete();
    }
}
