<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Repository\TresseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TresseController extends AbstractController
{
    #[Route('/tresse', name: 'app.tresse')]
    public function index(ProductRepository $productRepository): Response
    {
        $tresses = $productRepository->findAllProductsTresses();
        return $this->render('tresse/index.html.twig', [
            'products' => $tresses,
        ]);
    }

    public function lastTresseAdded(): Response
    {
        $lastTresse1 = [
            'id' => 1,
            'title' => 'Tresse 1',
            'description' => 'Tresse 1 description',
            'image' => "https://picsum.photos/200/200",
            'category' => 'Fille'
        ];
        $lastTresse2 = [
            'id' => 2,
            'title' => 'Tresse 2',
            'description' => 'Tresse 2 description',
            'image' => "https://picsum.photos/200/200",
            'category' => 'Femme'
        ];
        $lastTresse3 = [
            'id' => 3,
            'title' => 'Tresse 3',
            'description' => 'Tresse 3 description',
            'image' => "https://picsum.photos/200/200",
            'category' => 'Fille'
        ];
        $lastTresseAdded = [
            $lastTresse1,
            $lastTresse2,
            $lastTresse3,
        ];
        return $this->render('tresse/last_tresse_added.html.twig', [
            'lastTresseAdded' => $lastTresseAdded,
        ]);
    }

    #[Route('/tresse/{slug}', name: 'app.tresse.show', methods: ['GET', 'POST'], requirements: ['slug' => '[a-z0-9-]+' ])]
    public function showTresse(Request $request, ProductRepository $productRepository, Product $product): Response
    {
        if ($request->isMethod('POST')) {
            $data = $request->request->all();
            dd($data);
        }
        $tresse = $productRepository->findTressesByProduct($product);
        if (!$tresse) {
            throw $this->createNotFoundException('The tresse does not exist');
        }

        return $this->render('tresse/show_tresse.html.twig', [
            'product' => $tresse,
        ]);
    }
}
