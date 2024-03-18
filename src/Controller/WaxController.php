<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class WaxController extends AbstractController
{
    #[Route('/waxs', name: 'app.waxs')]
    public function index(): Response
    {
        $wax1 = [
            'id' => 1,
            'title' => 'Wax 1',
            'description' => 'Wax 1 description',
            'image' => "https://picsum.photos/200/200",
        ];
        $wax2 = [
            'id' => 2,
            'title' => 'Wax 2',
            'description' => 'Wax 2 description',
            'image' => "https://picsum.photos/200/200",
        ];
        $wax3 = [
            'id' => 3,
            'title' => 'Wax 3',
            'description' => 'Wax 3 description',
            'image' => "https://picsum.photos/200/200",
        ];
        $wax4 = [
            'id' => 4,
            'title' => 'Wax 4',
            'description' => 'Wax 4 description',
            'image' => "https://picsum.photos/200/200",
        ];
        $wax5 = [
            'id' => 5,
            'title' => 'Wax 5',
            'description' => 'Wax 5 description',
            'image' => "https://picsum.photos/200/200",
        ];
        $wax6 = [
            'id' => 6,
            'title' => 'Wax 6',
            'description' => 'Wax 6 description',
            'image' => "https://picsum.photos/200/200",
        ];
        $waxs = [
            $wax1,
            $wax2,
            $wax3,
            $wax4,
            $wax5,
            $wax6,
        ];
        return $this->render('wax/index.html.twig', [
            'waxs' => $waxs,
        ]);
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