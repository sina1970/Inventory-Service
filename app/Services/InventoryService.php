<?php

namespace App\Services;

use App\Repositories\Inventory\InventoryRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class InventoryService
{
    public function __construct(public InventoryRepositoryInterface $inventoryRepository)
    {}

    public function getInventoryStockByProductId(int $productId):Model{
        return $this->inventoryRepository->findByConditions(["product_id", $productId]);
    }
}
