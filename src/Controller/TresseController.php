<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TresseController extends AbstractController
{
    #[Route('/tresse', name: 'app.tresse')]
    public function index(): Response
    {
        $tresse1 = [
            'id' => 1,
            'title' => 'Tresse 1',
            'description' => 'Tresse 1 description',
            'image' => "https://picsum.photos/200/200",
            'category' => 'Fille'
        ];
        $tresse2 = [
            'id' => 2,
            'title' => 'Tresse 2',
            'description' => 'Tresse 2 description',
            'image' => "https://picsum.photos/200/200",
            'category' => 'Femme'
        ];
        $tresse3 = [
            'id' => 3,
            'title' => 'Tresse 3',
            'description' => 'Tresse 3 description',
            'image' => "https://picsum.photos/200/200",
            'category' => 'Fille'
        ];
        $tresse4 = [
            'id' => 4,
            'title' => 'Tresse 4',
            'description' => 'Tresse 4 description',
            'image' => "https://picsum.photos/200/200",
            'category' => 'Femme'
        ];
        $tresse5 = [
            'id' => 5,
            'title' => 'Tresse 5',
            'description' => 'Tresse 5 description',
            'image' => "https://picsum.photos/200/200",
            'category' => 'Fille'
        ];
        $tresse6 = [
            'id' => 6,
            'title' => 'Tresse 6',
            'description' => 'Tresse 6 description',
            'image' => "https://picsum.photos/200/200",
            'category' => 'Femme'
        ];
        $tresse7 = [
            'id' => 7,
            'title' => 'Tresse 7',
            'description' => 'Tresse 7 description',
            'image' => "https://picsum.photos/200/200",
            'category' => 'Fille'
        ];
        $tresses = [
            $tresse1,
            $tresse2,
            $tresse3,
            $tresse4,
            $tresse5,
            $tresse6,
            $tresse7,
        ];
        return $this->render('tresse/index.html.twig', [
            'tresses' => $tresses,
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

    public function showTresse(int $id): Response
    {
        $tresse = [
            'id' => $id,
            'title' => 'Tresse ' . $id,
            'description' => 'Tresse ' . $id . ' description',
            'image' => "https://picsum.photos/200/200",
            'category' => 'Fille'
        ];
        return $this->render('tresse/show_tresse.html.twig', [
            'tresse' => $tresse,
        ]);
    }
}
