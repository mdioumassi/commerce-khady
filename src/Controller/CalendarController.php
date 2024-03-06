<?php

namespace App\Controller;

use App\Repository\CalendarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CalendarController extends AbstractController
{
   
    public function index(CalendarRepository $calendarRepository): Response
    {
        $calendars = $calendarRepository->findAll();
        if (!$calendars) {
            throw $this->createNotFoundException('No calendar found');
        }
        return $this->render('calendar/index.html.twig', [
            'calendars' => $calendars,
        ]);
    }
}
