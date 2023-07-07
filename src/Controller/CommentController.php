<?php

namespace App\Controller;

use App\Entity\Cars;
use App\Entity\Comment;
use App\Form\Comment3Type;
use App\Repository\CommentRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cars/{id}/comment')]
class CommentController extends AbstractController
{

    #[Route('/new', name: 'app_comment_new', methods: ['GET', 'POST'])]
    public function new(Request $request, Cars $car, CommentRepository $commentRepository): Response
    {
        $comment = new Comment();
        $comment->setCreatedAt(new DateTimeImmutable());
        $comment->setUser($this->getUser());
        $comment->setCars($car);
        $form = $this->createForm(Comment3Type::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commentRepository->save($comment, true);

            return $this->redirectToRoute('app_cars_show', [
                'id' => $car->getId()
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->render('comment/new.html.twig', [
            'comment' => $comment,
            'form' => $form,
        ]);
    }
    
}
