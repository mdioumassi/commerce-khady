<?php

namespace App\Service;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService
{
    public function __construct(
        protected ProductRepository $productRepository,
        protected RequestStack $requestStack)
    {
    }
    public function add(int $id)
    {
        $session = $this->requestStack->getSession();
        $cart = $session->get('cart', []);
        if (array_key_exists($id, $cart)) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }
        $session->set('cart', $cart);
    }

    public function show()
    {
        $session = $this->requestStack->getSession();
        $cart = $session->get('cart', []);
        $detailCart = [];

        foreach ($cart as $id => $quantity) {
            $product = $this->productRepository->find($id);
            if (!$product) {
                continue;
            }
            $detailCart[] = new CartItem($product, $quantity);
        }
        return $detailCart;
    }

    public function getTotal(): int
    {
        $total = 0;
        $session = $this->requestStack->getSession();
        $cart = $session->get('cart', []);
        foreach ($cart as $id => $quantity) {
            $product = $this->productRepository->find($id);
            if (!$product) {
                continue;
            }
            $total += $product->getPrice() * $quantity;
        }
        return $total;
    }

    public function remove(int $id): void
    {
        $session = $this->requestStack->getSession();
        $cart = $session->get('cart', []);
        if (array_key_exists($id, $cart)) {
            if ($cart[$id] > 1) {
                $cart[$id]--;
            } else {
                unset($cart[$id]);
            }
        }
        $session->set('cart', $cart);
    }

    public function decrement(int $id): void
    {
        $session = $this->requestStack->getSession();
        $cart = $session->get('cart', []);
        if (array_key_exists($id, $cart)) {
            if ($cart[$id] > 1) {
                $cart[$id]--;
            } else {
                unset($cart[$id]);
            }
        }
        $session->set('cart', $cart);
    }
}