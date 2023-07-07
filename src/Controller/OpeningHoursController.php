<?php

namespace App\Controller;

use App\Entity\OpeningHours;
use App\Form\OpeningHours1Type;
use App\Repository\OpeningHoursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/opening/hours')]
class OpeningHoursController extends AbstractController
{
    #[Route('/', name: 'app_opening_hours_index', methods: ['GET'])]
    public function index(OpeningHoursRepository $openingHoursRepository): Response
    {
        return $this->render('opening_hours/index.html.twig', [
            'opening_hours' => $openingHoursRepository->findAll(),
        ]);
    }

    #[Route('', name: 'app_opening_hours_show', methods: ['GET'])]
    public function show(): Response
    {
        $openingHour = $this->getUser();
        return $this->render('opening_hours/show.html.twig', [
            'opening_hour' => $openingHour,
        ]);
    }
}
