<?php

namespace App\Controller;

use App\Entity\Reviews;
use App\Form\ReviewsType;
use App\Repository\ReviewsRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/reviews')]
class AdminReviewsController extends AbstractController
{
    #[Route('/', name: 'app_admin_reviews_index', methods: ['GET'])]
    public function index(ReviewsRepository $reviewsRepository): Response
    {
        return $this->render('admin_reviews/index.html.twig', [
            'reviews' => $reviewsRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_admin_reviews_show', methods: ['GET'])]
    public function show(Reviews $review): Response
    {
        return $this->render('admin_reviews/show.html.twig', [
            'review' => $review,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_reviews_delete', methods: ['POST'])]
    public function delete(Request $request, Reviews $review, ReviewsRepository $reviewsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$review->getId(), $request->request->get('_token'))) {
            $reviewsRepository->remove($review, true);
        }

        return $this->redirectToRoute('app_admin_reviews_index', [], Response::HTTP_SEE_OTHER);
    }
}
