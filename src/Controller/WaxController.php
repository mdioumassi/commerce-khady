<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class WaxController extends AbstractController
{
    #[Route('/wax', name: 'app.wax')]
    public function index(): Response
    {
        return $this->render('wax/index.html.twig');
    }

    public function lastWaxAdded() : Response
    {
        $lastWax1 = [
            'id' => 1,
            'title' => 'Wax 1',
            'description' => 'Wax 1 description',
            'image' => "https://picsum.photos/200/200",
        ];
        $lastWax2 = [
            'id' => 2,
            'title' => 'Wax 2',
            'description' => 'Wax 2 description',
            'image' => "https://picsum.photos/200/200",
        ];
        $lastWax3 = [
            'id' => 3,
            'title' => 'Wax 3',
            'description' => 'Wax 3 description',
            'image' => "https://picsum.photos/200/200",
        ];
        $lastWaxAdded = [
            $lastWax1,
            $lastWax2,
            $lastWax3,
        ];
        return $this->render('wax/last_wax_added.html.twig', [
            'lastWaxAdded' => $lastWaxAdded,
        ]);
    }
}