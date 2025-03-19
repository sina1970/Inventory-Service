<?php

use App\Http\Controllers\Client\V1\InventoryController;
use App\Http\Controllers\Client\V1\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function (){
    Route::post('change-stock',[InventoryController::class,'getInventoryStockByProductId']);
});
