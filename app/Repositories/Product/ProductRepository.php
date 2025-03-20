<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $model){
        parent::__construct($model);
    }

    public function findManyById(array $ids, array $relations = [], array $columns= ['*']):Collection{
        return $this->model->query()->select($columns)
        ->whereIn('id', $ids)
        ->with($relations)
        ->get();
    }
}
