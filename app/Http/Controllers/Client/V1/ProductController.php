<?php

namespace App\Http\Controllers\Client\V1;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\Client\ProductService;

class ProductController extends Controller
{
    public function __construct(public ProductService $productService)
    {}

    public function getProduct(int $id){
        $response = $this->productService->getProduct($id);
        return ApiResponse::success("success", $response);
    }


}
