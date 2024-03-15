<?php

namespace App\Controller;

use App\Repository\ProductTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class TypeProductController extends AbstractController
{
    public function __construct(
        protected ProductTypeRepository $productTypeRepository,
    ){}
    
    public function renderMenuList(): Response
    {
        $typeProducts = $this->productTypeRepository->findAll();
        return $this->render('type_product/_menu_list.html.twig', [
            'typeProducts' => $typeProducts,
        ]);
    }
}
