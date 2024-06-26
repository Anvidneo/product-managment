<?php

namespace App\Application\UseCases\Category;

use App\Core\Repositories\CategoryRepository;

class GetCategoryByIdUseCase {
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute(int $id) {
        return $this->categoryRepository->findById($id);
    }
}