<?php

namespace App\Services\Internal;

use App\Enums\StockTransactionTypeEnum;
use App\Events\InventoryNotifEvent;
use App\Repositories\Inventory\InventoryRepositoryInterface;
use App\Repositories\Setting\SettingRepositoryInterface;
use App\Repositories\StockTransaction\StockTransactionRepositoryInterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class InventoryService
{
    public function __construct(
        public InventoryRepositoryInterface        $inventoryRepository,
        public StockTransactionRepositoryInterface $stockTransactionRepository,
        public SettingRepositoryInterface $settingRepositoryInterface,
    ) {}

    public function changeInventoryAndStock(StockTransactionTypeEnum $type, array $inventoryData)
    {
        if ($type == StockTransactionTypeEnum::IN)
            $this->increaseInventory($inventoryData);
        else
            $this->decreaseInventory($inventoryData);
    }

    public function decreaseInventory(array $inventoryData): void
    {
        $productCountLimit = $this->settingRepositoryInterface->getKeyValues(['productCountLimit']);
        foreach ($inventoryData as $item) {

            DB::transaction(function () use ($item) {
                $inventory = $this->inventoryRepository->getInventoryRecordAndLockForUpdate($item["product_id"]);
                if (!$inventory || $inventory->stock < $item['amount']) {
                    throw new \Exception("error");
                }
                $newStock = $inventory->stock - $item['amount'];
                $this->inventoryRepository->update($inventory->id, ['stock' => $newStock]);
                $this->stockTransactionRepository->create([
                    'product_id' => $item['productId'],
                    'type' => StockTransactionTypeEnum::OUT->value,
                    'quantity' => $item['amount']
                ]);
            }, 5);
        }
    }

    public function inventoryLimitNotifier($inventory, $productCountLimit)
    {
        if ($inventory->stock <= $productCountLimit) {
            InventoryNotifEvent::dispatch($inventory);
        }
        
    }

    public function increaseInventory(array $inventoryData): void
    {
        foreach ($inventoryData as $item) {

            DB::transaction(function () use ($item) {
                $inventory = $this->inventoryRepository->getInventoryRecordAndLockForUpdate($item['productId']);
                if (!$inventory) {
                    throw new \Exception("not exists");
                }
                $newStock = $inventory->stock + $item['amount'];
                $this->inventoryRepository->update($inventory->id, ['stock' => $newStock]);

                $this->stockTransactionRepository->create([
                    'product_id' => $item['productId'],
                    'type' => StockTransactionTypeEnum::IN->value,
                    'quantity' => $item['amount']
                ]);
            }, 5);
        }
    }
}
