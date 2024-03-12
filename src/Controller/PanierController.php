<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Service\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PanierController extends AbstractController
{
    #[Route('/cart/add/{id}', name: 'cart.add', requirements: ["id" => "\d+"])]
    public function add($id, ProductRepository $productRepository, CartService $cartService): Response
    {
        $product = $productRepository->find($id);
        if (!$product) {
            throw $this->createNotFoundException('Le produit n\'existe pas');
        }
        $cartService->add($id);
        $this->addFlash('success', 'Le produit a été bien ajouté au panier');
       
        return $this->redirectToRoute('app.cart.show');
    }

    #[Route('/cart', name: 'app.cart.show')]
    public function show(CartService $cartService): Response
    {
        $cart = $cartService->show();
        return $this->render('panier/index.html.twig', [
            'carts' => $cart,
            'total' => $cartService->getTotal()
        ]);
    }
}
