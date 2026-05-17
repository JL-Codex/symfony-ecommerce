<?php

namespace App\Controller;

use App\Service\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    public function __construct(
        private ProductService $productService
    ) {}

    #[Route('/', name: 'app_home')]
    public function home(): Response
    {
        return $this->render('index.html.twig', [
            'products' => $this->productService->getAllProducts(),
        ]);
    }

    #[Route('/product/{id}', name: 'app_product_details')]
    public function productDetails(int $id): Response
    {
        $product = $this->productService->getProductById($id);

        if (!$product) {
            throw $this->createNotFoundException('Product not found.');
        }

        return $this->render('product_details.html.twig', [
            'product' => $product,
        ]);
    }
}