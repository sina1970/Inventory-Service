<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class InventoryRepository extends BaseRepository implements InventoryRepositoryInterface
{
    public function __construct(Inventory $model)
    {
        parent::__construct($model);
    }

    public function getInventoryRecordAndLockForUpdate(int $productId)
    {
        return $this->model->query()->where('product_id',$productId)
            ->lockForUpdate()
            ->first();
    }
}
