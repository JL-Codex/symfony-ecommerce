<?php

namespace App\Controller;

use App\Service\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CategoryController extends AbstractController
{
    public function __construct(
        private CategoryService $CategoryService
    ) {}

    #[Route('/categories', name: 'app_categories')]
    public function categories(): Response
    {
        return $this->render('browse_categories.html.twig', [
            'categories' => $this->CategoryService->getAllCategories(),
        ]);
    }

    #[Route('/categories/{id}', name: 'app_products_by_Category')]
    public function productsByCategory(int $id): Response
    {
        $Category = $this->CategoryService->getCategoryById($id);

        if (!$Category) {
            throw $this->createNotFoundException('Category not found.');
        }

        return $this->render('products_by_Category.html.twig', [
            'Category' => $Category,
            'products' => $Category->getProducts(),
        ]);
    }
}