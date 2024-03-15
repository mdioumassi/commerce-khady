<?php

namespace App\Controller;

use App\Entity\Calendar;
use App\Entity\Product;
use App\Entity\Tresse;
use App\Repository\CalendarRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TresseController extends AbstractController
{
    #[Route('/tresse', name: 'app.tresse')]
    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAllByTypeProduct('Tresse');
        return $this->render('tresse/index.html.twig', [
            'products' => $products,
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
    public function showTresse(
        Request $request, 
        ProductRepository $productRepository, 
        Product $product,
        CalendarRepository $calendarRepository,
        EntityManagerInterface $entityManager,
        ): Response
    {
        if ($request->isMethod('POST') && $request->request->has('dateChoice')) {
            $data = $request->request->all();
            if (!array_key_exists('dateChoice', $data)) {
                throw $this->createNotFoundException('The dateChoice does not exist');
            }
            $this->getDataCalendar($data['dateChoice'], $calendarRepository, $entityManager);
            $tresse = new Tresse();
            if (array_key_exists('deplacement', $data) && $data['deplacement'] == 'on') {
                $tresse->setIsMove(true);
                $tresse->setYourAddress($data['address-shift']);
                $tresse->setMyAddress("");
                $tresse->setMovePrice((int)$data['frais-deplacement']);
            }        
            $calendar = $calendarRepository->findByCodeDay($data['dateChoice']);
            $tresse->setCalendar($calendar);
            // if (array_key_exists('number-girl', $data)) {
            //     $tresse->setNumberPerson($data['number-girl']);
            // }
            $product->addTress($tresse);
            $entityManager->persist($product);
            $entityManager->persist($tresse);
            $entityManager->flush();

            return $this->redirectToRoute('cart.add', ['id' => $product->getId()]);
        }
        $productDetail = $productRepository->findByProductSlug($product);
        if (!$productDetail) {
            throw $this->createNotFoundException('The tresse does not exist');
        }
        $calendars = $calendarRepository->findAll();

        return $this->render('tresse/show_tresse.html.twig', [
            'product' => $productDetail,
            'calendars' => $calendars,
        ]);
    }

    public function getDataCalendar($dateChoice, CalendarRepository $calendarRepository, EntityManagerInterface $entityManager)
    {
        $calendar = $calendarRepository->findByCodeDay($dateChoice);
        if (!$calendar) {
            throw $this->createNotFoundException('The calendar does not exist');
        }
        $dayWeekMorning = ['Lundi-9-12', 'Mardi-9-12', 'Mercredi-9-12', 'Jeudi-9-12', 'Vendredi-9-12', 'Samedi-9-12', 'Dimanche-9-12'];
        $dayWeekAfternoon = ['Lundi-12-22', 'Mardi-12-22', 'Mercredi-12-22', 'Jeudi-12-22', 'Vendredi-12-22', 'Samedi-12-22', 'Dimanche-12-22'];
        $dayWeekAllDay = ['Lundi-all-day', 'Mardi-all-day', 'Mercredi-all-day', 'Jeudi-all-day', 'Vendredi-all-day', 'Samedi-all-day', 'Dimanche-all-day'];
        if (in_array($dateChoice, $dayWeekMorning)) {  
            $calendar->setIsMorning(true);
        } elseif (in_array($dateChoice, $dayWeekAfternoon)) {
            $calendar->setIsAfternoon(true);
        } elseif (in_array($dateChoice, $dayWeekAllDay)) {
            $calendar->setIsAllDay(true);
        }

        $entityManager->persist($calendar);
        $entityManager->flush();
    }
}
