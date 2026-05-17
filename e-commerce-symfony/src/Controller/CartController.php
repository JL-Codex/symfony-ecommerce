<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'app_cart')]
    public function index(): Response
    {
        return $this->render('cart.html.twig');
    }

    #[Route('/cart/add/{id}', name: 'app_cart_add')]
    public function add(int $id): Response
    {
        // Will be implemented in Étape 3
        return $this->redirectToRoute('app_cart');
    }
}