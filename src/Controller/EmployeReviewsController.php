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

    #[Route('/new', name: 'app_employe_reviews_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ReviewsRepository $reviewsRepository): Response
    {
        $review = new Reviews();
        $form = $this->createForm(Reviews1Type::class, $review);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reviewsRepository->save($review, true);

            return $this->redirectToRoute('app_employe_reviews_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('employe_reviews/new.html.twig', [
            'review' => $review,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_employe_reviews_show', methods: ['GET'])]
    public function show(Reviews $review): Response
    {
        return $this->render('employe_reviews/show.html.twig', [
            'review' => $review,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_employe_reviews_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reviews $review, ReviewsRepository $reviewsRepository): Response
    {
        $form = $this->createForm(Reviews1Type::class, $review);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reviewsRepository->save($review, true);

            return $this->redirectToRoute('app_employe_reviews_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('employe_reviews/edit.html.twig', [
            'review' => $review,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_employe_reviews_delete', methods: ['POST'])]
    public function delete(Request $request, Reviews $review, ReviewsRepository $reviewsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$review->getId(), $request->request->get('_token'))) {
            $reviewsRepository->remove($review, true);
        }

        return $this->redirectToRoute('app_employe_reviews_index', [], Response::HTTP_SEE_OTHER);
    }
}
