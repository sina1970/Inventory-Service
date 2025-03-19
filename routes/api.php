<?php

use App\Http\Controllers\Client\V1\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('products')->group(function (){
    Route::get('/{productId}', [ProductController::class,'getProduct']);
});
