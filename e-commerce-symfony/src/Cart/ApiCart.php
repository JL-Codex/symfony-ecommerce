<?php

namespace App\Cart;

class ApiCart implements CartInterface
{
    public function add(int $productId, int $quantity): void
    {
        dd('ApiCart::add called', $productId, $quantity);
    }

    public function remove(int $productId): void
    {
        dd('ApiCart::remove called', $productId);
    }

    public function getItems(): array
    {
        dd('ApiCart::getItems called');
    }

    public function clear(): void
    {
        dd('ApiCart::clear called');
    }

    public function getTotal(): float
    {
        dd('ApiCart::getTotal called');
    }
}