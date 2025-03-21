<?php

namespace App\Http\Controllers\Internal;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\Internal\InternalProductService;
use Illuminate\Http\Request;

class InternalProducController extends Controller
{
    public function __construct(public InternalProductService $productService){}

    public function getManyProductsData(Request $request){

        $response = $this->productService->getManyProductsData($request->productLists);
        return ApiResponse::success("success", $response);

    }
}
