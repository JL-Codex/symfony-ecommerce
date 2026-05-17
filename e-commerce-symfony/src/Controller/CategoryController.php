<?php

namespace App\Controller;

use App\Service\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CategoryController extends AbstractController
{
    public function __construct(
        private CategoryService $categoryService
    ) {}

    #[Route('/categories', name: 'app_categories')]
    public function categories(): Response
    {
        return $this->render('browse_categories.html.twig', [
            'categories' => $this->categoryService->getAllCategories(),
        ]);
    }

    #[Route('/categories/{id}', name: 'app_products_by_category')]
    public function productsByCategory(int $id): Response
    {
        $category = $this->categoryService->getCategoryById($id);

        if (!$category) {
            throw $this->createNotFoundException('Category not found.');
        }

        return $this->render('products_by_category.html.twig', [
            'category' => $category,
            'products' => $category->getProducts(),
        ]);
    }
}