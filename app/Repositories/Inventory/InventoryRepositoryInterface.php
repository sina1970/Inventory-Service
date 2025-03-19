<?php

namespace App\Repositories\Inventory;

use App\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

interface InventoryRepositoryInterface extends BaseRepositoryInterface
{
    public function getInventoryRecordAndLockForUpdate(int $productId);
}
