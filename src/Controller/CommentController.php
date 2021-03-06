<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Traobject;
use App\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/comment")
 */
class CommentController extends BaseController
{
    /**
     * @Route("/", name="comment_index", methods="GET")
     */
    public function index(): Response
    {
        $comments = $this->getDoctrine()
            ->getRepository(Comment::class)
            ->findAll();

        return $this->render('comment/index.html.twig', ['comments' => $comments]);
    }

    /**
     * @Route("/new/{id}", name="comment_new", methods="GET|POST")
     */
    public function new(Traobject $traobject, Request $request): Response
    {
        $comment = new Comment();
        $comment->setUser($this->getUser());
        $comment->setTraobject($traobject);

        $form = $this->createForm(CommentType::class, $comment, [
            'action' => $this->generateUrl('comment_new', ['id' => $traobject->getId()])
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('traobject_show', ['id' => $traobject->getId()]);
        }

        return $this->render('comment/new.html.twig', [
            'comment' => $comment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="comment_show", methods="GET")
     */
    public function show(Comment $comment): Response
    {
        return $this->render('comment/show.html.twig', ['comment' => $comment]);
    }

    /**
     * @Route("/{id}/edit", name="comment_edit", methods="GET|POST")
     */
    public function edit(Request $request, Comment $comment): Response
    {
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comment_index', ['id' => $comment->getId()]);
        }

        return $this->render('comment/edit.html.twig', [
            'comment' => $comment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="comment_delete", methods="DELETE")
     */
    public function delete(Request $request, Comment $comment): Response
    {
        if ($this->isCsrfTokenValid('delete'.$comment->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($comment);
            $em->flush();
        }

        return $this->redirectToRoute('comment_index');
    }
}
