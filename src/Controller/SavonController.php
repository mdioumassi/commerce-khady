<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SavonController extends AbstractController
{
    #[Route('/savons', name: 'app.savon')]
    public function index(): Response
    {
        return $this->render('savon/index.html.twig');
    }


    public function lastSavonAdded() : Response
    {
        $lastSavon1 = [
            'id' => 1,
            'title' => 'Savon 1',
            'description' => 'Savon 1 description',
            'image' => "https://picsum.photos/200/200",
            'category' => 'Carotte'
        ];
        $lastSavon2 = [
            'id' => 2,
            'title' => 'Savon 2',
            'description' => 'Savon 2 description',
            'image' => "https://picsum.photos/200/200",
            'category' => 'Curcuma'
        ];
        $lastSavon3 = [
            'id' => 3,
            'title' => 'Savon 3',
            'description' => 'Savon 3 description',
            'image' => "https://picsum.photos/200/200",
            'category' => 'Citron'
        ];
        $lastSavonAdded = [
            $lastSavon1,
            $lastSavon2,
            $lastSavon3,
        ];
        return $this->render('savon/last_savon_added.html.twig', [
            'lastSavonAdded' => $lastSavonAdded,
        ]);
    }
}
