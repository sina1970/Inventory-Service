<?php

namespace App\Repositories\Product;

use App\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function findManyById(array $ids, array $relations = [], array $columns= ['*']):Collection;
}
