<?php

namespace App\Repositories\StockTransaction;

use App\Models\StockTransaction;
use App\Repositories\BaseRepository;
use App\Repositories\StockTransaction\StockTransactionRepositoryInterface;

class StockTransactionRepository extends BaseRepository implements StockTransactionRepositoryInterface
{
    public function __construct(StockTransaction $model)
    {
        parent::__construct($model);
    }
}
