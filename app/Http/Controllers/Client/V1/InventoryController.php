<?php

namespace App\Http\Controllers\Client\V1;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\Client\InventoryService;
use Illuminate\Http\JsonResponse;

class InventoryController extends Controller
{
    public function __construct(public InventoryService $inventoryService)
    {}

    public function getInventoryStockByProductId(int $productId): JsonResponse
    {
        $response = $this->inventoryService->getInventoryStockByProductId($productId);
        return ApiResponse::success("success", $response);
    }
}
