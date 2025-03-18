<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function all(array $columns = ['*'], array $relations = []):Collection;
    public function find(int $id, array $columns = ['*'], array $relations = []):Model;
    public function findByConditions(array $conditions, array $columns = ['*']):Model;
    public function create(array $data):Model;
    public function update(int $id, array $data):void;
    public function delete(int $id):void;
}
