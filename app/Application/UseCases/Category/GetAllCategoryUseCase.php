<?php

namespace App\Application\UseCases\Category;

use App\Core\Repositories\CategoryRepository;

class GetAllCategoryUseCase {
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute() {
        return $this->categoryRepository->getAll();
    }
}