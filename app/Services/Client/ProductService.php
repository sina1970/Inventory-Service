<?php

namespace App\Services\Client;

use App\Repositories\Product\ProductRepositoryInterface;

class ProductService
{
    public function __construct(public ProductRepositoryInterface $productRepository)
    {}

    public function getProduct(int $id){
        return $this->productRepository->find($id);
    }
}
