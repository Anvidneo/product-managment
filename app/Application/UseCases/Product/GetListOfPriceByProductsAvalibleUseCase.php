<?php

namespace App\Application\UseCases\Product;

use App\Core\Repositories\ProductRepository;

class GetListOfPriceByProductsAvalibleUseCase {
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute() {
        return $this->productRepository->listOfPriceByProductsAvalible();
    }
}