<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(public $model)
    {
        $this->model = $model;
    }

    public function all(array $columns = ['*'], array $relations=[]):Collection
    {
        return $this->model->get($columns);
    }

    public function find(int $id, array $columns = ['*'], array $relations=[]):Model
    {
        return $this->model->select($columns)->find($id);
    }

    public function findByConditions(array $conditions, array $columns = ['*'], array $relations=[]):Model
    {
        return $this->model->where($conditions)->get($columns)->first();
    }

    public function create(array $data):Model
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data):void
    {
        $this->model->where('id', $id)->update([$data]);
        
    }

    public function delete(int $id):void
    {
        $model = $this->model->find($id);
        $model->delete();
    }
}
