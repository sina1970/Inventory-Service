<?php

namespace App\Services\Internal;

use App\Repositories\Product\ProductRepositoryInterface;

class InternalProductService
{
    public function __construct(public ProductRepositoryInterface $productRepository){}

    public function getManyProductsData(array $productLists){
        $totalPrice = 0;
        $productIdArray = [];
        foreach($productLists as $productList){
            $productIdArray[] = $productList["productId"];
        }

        return $this->productRepository->findManyById($productIdArray);
    }
}
