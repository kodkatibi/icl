<?php

namespace App\Repositories;

interface IResultRepository
{
    public function get(array $select = ['*']);

    public function getById(int $id, array $select = ['*']);

    public function create(array $request);

    public function update(array $request, int $id);

    public function delete(int $id);
}
