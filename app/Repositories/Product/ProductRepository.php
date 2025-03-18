<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;

class ProductRepository extends BaseRepository implements BaseRepositoryInterface
{
    public function __construct(public Product $model){
        parent::__construct($model);
    }
}
