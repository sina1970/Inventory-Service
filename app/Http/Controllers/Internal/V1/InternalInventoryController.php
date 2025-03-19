<?php

namespace App\Http\Controllers\Internal\V1;

use App\Enums\StockTransactionTypeEnum;
use App\Http\Controllers\Controller;
use App\Services\Internal\InventoryService;
use Illuminate\Http\Request;

class InternalInventoryController extends Controller
{
    public function __construct(public InventoryService $inventoryService)
    {}

    public function changeInventoryStock(Request $request)
    {
        $this->inventoryService->changeInventoryAndStock(
            StockTransactionTypeEnum::from($request->type),
            $request->inventoryData
        );
    }
}
