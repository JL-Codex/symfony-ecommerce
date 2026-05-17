<?php

namespace App\Controller;

use App\Cart\CartHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CartController extends AbstractController
{
    public function __construct(
        private CartHandler $cartHandler
    ) {}

    #[Route('/cart', name: 'app_cart')]
    public function index(): Response
    {
        return $this->render('cart.html.twig', [
            'items' => $this->cartHandler->getItems(),
            'total' => $this->cartHandler->getTotal(),
        ]);
    }

    #[Route('/cart/add/{id}', name: 'app_cart_add', methods: ['POST'])]
    public function add(int $id, Request $request): Response
    {
        $quantity = (int) $request->request->get('quantity', 1);
        $this->cartHandler->add($id, $quantity);
        return $this->redirectToRoute('app_cart');
    }

    #[Route('/cart/remove/{id}', name: 'app_cart_remove')]
    public function remove(int $id): Response
    {
        $this->cartHandler->remove($id);
        return $this->redirectToRoute('app_cart');
    }

    #[Route('/cart/clear', name: 'app_cart_clear')]
    public function clear(): Response
    {
        $this->cartHandler->clear();
        return $this->redirectToRoute('app_cart');
    }
}