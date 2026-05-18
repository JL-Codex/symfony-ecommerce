<?php

namespace App\Service;

use App\Entity\Category;
use App\Repository\CategoryRepository;

class CategoryService
{
    public function __construct(
        private CategoryRepository $CategoryRepository
    ) {}

    public function getAllCategories(): array
    {
        return $this->CategoryRepository->findAll();
    }

    public function getCategoryById(int $id): ?Category
    {
        return $this->CategoryRepository->find($id);
    }
}