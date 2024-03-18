<?php

namespace App\Service;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\RequestStack;

class CartService
{
    public function __construct(
        protected ProductRepository $productRepository,
        protected RequestStack $requestStack
    ){}

    public function getCart(): array
    {
        $session = $this->requestStack->getSession();
        return $session->get('cart', []);
    }

    public function setCart(array $cart): void
    {
        $session = $this->requestStack->getSession();
        $session->set('cart', $cart);
    }

    public function getQuantity(){
         $session = $this->requestStack->getSession();
         return $session->get('number-girl', []);
    }

    public function getFraisDeplacement(){
        $session = $this->requestStack->getSession();
        return (int)$session->get('frais-deplacement', 0);
    }

    public function add(int $id)
    {
        $cart = $this->getCart();
        if (!array_key_exists($id, $cart)) {
            $cart[$id] = 0;
        }
        $cart[$id]++;

        $this->setCart($cart);
    }

    public function show()
    {
        $cart = $this->getCart();
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
        $cart = $this->getCart();
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
        $cart = $this->getCart();
        if (array_key_exists($id, $cart)) {
            unset($cart[$id]);
        }
        $this->setCart($cart);
    }

    public function decrement(int $id): void
    {
        $cart = $this->getCart();
        if (array_key_exists($id, $cart)) {
            if ($cart[$id] > 1) {
                $cart[$id]--;
            } else {
                unset($cart[$id]);
            }
        }
       $this->setCart($cart);
    }
}