<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Comment;
use AppBundle\Entity\News;
use AppBundle\Form\CommentType;

/**
 * Comment controller.
 *
 * @Route("/comment")
 */
class CommentController extends Controller
{
    /**
     * Creates a new Comment entity.
     *
     * @Route("/new/{id}", name="comment_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $news = $em->getRepository('AppBundle:News')->find($id);
        if (!$news instanceof News) {
            throw new Exception("Error Processing Request", 1);
        }

        $comment = new Comment();
        $comment->setNews($news);

        $form = $this->createForm(get_class(new CommentType()), $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('news_index');
        }

        return $this->render('comment/new.html.twig', array(
            'comment' => $comment,
            'form' => $form->createView(),
        ));
    }
}
