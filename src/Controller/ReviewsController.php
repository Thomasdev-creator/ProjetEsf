<?php

namespace App\Controller;

use App\Entity\Reviews;
use App\Form\Reviews2Type;
use App\Repository\ReviewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DateTimeImmutable;

#[Route('/reviews')]
class ReviewsController extends AbstractController
{
    #[Route('/', name: 'app_reviews_index', methods: ['GET'])]
    public function index(ReviewsRepository $reviewsRepository): Response
    {
        return $this->render('reviews/index.html.twig', [
            'reviews' => $reviewsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_reviews_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ReviewsRepository $reviewsRepository): Response
    {
        $review = new Reviews();
        $review->setCreatedAt(new DateTimeImmutable());
        $review->setUser($this->getUser());
        $form = $this->createForm(Reviews2Type::class, $review);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reviewsRepository->save($review, true);

            return $this->redirectToRoute('app_reviews_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reviews/new.html.twig', [
            'review' => $review,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reviews_show', methods: ['GET'])]
    public function show(Reviews $review): Response
    {
        return $this->render('reviews/show.html.twig', [
            'review' => $review,
        ]);
    }
}
