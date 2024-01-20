<?php

namespace App\Repositories;

use App\Models\Result;

class ResultRepository implements IResultRepository
{

    public function get(array $select = ['*'])
    {
        return Result::select($select)->get();
    }

    public function getById(int $id, array $select = ['*'])
    {
        return Result::select($select)->where('id', $id)->firstOrFail();
    }

    public function create(array $request)
    {
        return Result::create($request);
    }

    public function update(array $request, int $id)
    {
        return Result::find($id)->update($request);
    }

    public function delete(int $id)
    {
        return Result::find($id)->delete();
    }
}
