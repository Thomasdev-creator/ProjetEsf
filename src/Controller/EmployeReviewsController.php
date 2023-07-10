<?php

namespace App\Controller;

use App\Entity\Reviews;
use App\Form\Reviews1Type;
use App\Repository\ReviewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/employe/reviews')]
class EmployeReviewsController extends AbstractController
{
    #[Route('/', name: 'app_employe_reviews_index', methods: ['GET'])]
    public function index(ReviewsRepository $reviewsRepository): Response
    {
        return $this->render('employe_reviews/index.html.twig', [
            'reviews' => $reviewsRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_employe_reviews_show', methods: ['GET'])]
    public function show(Reviews $review): Response
    {
        return $this->render('employe_reviews/show.html.twig', [
            'review' => $review,
        ]);
    }
}
