<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Service\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PanierController extends AbstractController
{
    public function __construct(
        protected ProductRepository $productRepository,
        protected CartService $cartService
    ) {
    }
    #[Route('/cart/add/{id}', name: 'cart.add', requirements: ["id" => "\d+"])]
    public function add($id): Response
    {
        $product = $this->productRepository->find($id);
        if (!$product) {
            throw $this->createNotFoundException('Le produit n\'existe pas');
        }
        $this->cartService->add($id);
        $this->addFlash('success', 'Le produit a été bien ajouté au panier');
       
        return $this->redirectToRoute('app.cart.show');
    }

    #[Route('/cart', name: 'app.cart.show')]
    public function show(): Response
    {
        $cart = $this->cartService->show();
        return $this->render('panier/index.html.twig', [
            'carts' => $cart,
            'total' => $this->cartService->getTotal()
        ]);
    }

    #[Route('/cart/remove/{id}', name: 'cart.remove', requirements: ["id" => "\d+"])]   
    public function remove($id): Response
    {
        $product = $this->productRepository->find($id);
        if (!$product) {
            throw $this->createNotFoundException('Le produit n\'existe pas');
        }
        $this->cartService->remove($id);
        $this->addFlash('success', 'Le produit a été bien supprimé du panier');
        return $this->redirectToRoute('app.cart.show');
    }

    #[Route('/cart/decrement/{id}', name: 'cart.decrement', requirements: ["id" => "\d+"])]
    public function decremente($id) {
        $product = $this->productRepository->find($id);
        if (!$product) {
            throw $this->createNotFoundException('Le produit n\'existe pas');
        }
        $this->cartService->decrement($id);
        return $this->redirectToRoute('app.cart.show');
    }
}
