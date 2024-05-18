<?php

namespace App\Application\UseCases\Product;

use App\Core\Repositories\ProductRepository;

class GetProductByCategoryOrPriceRangeUseCase {
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute($filter) {
        return $this->productRepository->filterByCategoryOrPriceRange($filter);
    }
}