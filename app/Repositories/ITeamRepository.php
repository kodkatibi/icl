<?php

namespace App\Repositories;

interface ITeamRepository
{
    public function get(array $select = ['*']);

    public function getRandomly(int $count, array $select = ['*']);

    public function getById(int $id, array $select = ['*']);
    public function getByIds(array $ids, array $select = ['*']);

    public function create(array $request);

    public function update(array $request, int $id);

    public function delete(int $id);

}
