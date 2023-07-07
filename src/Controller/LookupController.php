<?php

namespace App\Controller;

use App\Repository\CarsRepository;
use App\Repository\CategoryRepository;
use App\Repository\ServicesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LookupController extends AbstractController
{
    #[Route('/lookup', name: 'app_lookup')]
    public function index(Request $request, CarsRepository $carsRepository): Response
    {
        $search = $request->query->get('search');
        $cars = $carsRepository->findBySearch($search);
        return $this->render('lookup/index.html.twig', [
            'controller_name' => 'LookupController',
            'cars' => $cars
        ]);
    }
}
