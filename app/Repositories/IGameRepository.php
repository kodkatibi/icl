<?php

namespace App\Repositories;

interface IGameRepository
{
    public function get(array $select = ['*']);

    public function getOrderBy(string $column, string $order = 'asc', array $select = ['*'],);

    public function getById(int $id, array $select = ['*']);

    public function create(array $request);

    public function update(array $request, int $id);

    public function delete(int $id);

}
