<?php

namespace App\Controller;

use App\Entity\Cars;
use App\Form\Cars2Type;
use App\Repository\CarsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cars')]
class CarsController extends AbstractController
{
     #[Route('/véhicules', name: 'app_cars_show', methods: ['GET'])]
    public function show(Cars $car): Response
    {
        $comments = $car->getComments();
        return $this->render('cars/show.html.twig', [
            'car' => $car,
            'comment' => $comments
        ]);
    }
}
