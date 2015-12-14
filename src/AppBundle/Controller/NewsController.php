<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class NewsController extends Controller
{
    /**
     * @Route("/news", name="news_index")
     */
    public function indexAction(Request $request)
    {
        $news = array(
            array(
                'firstname' => 'John',
                'lastname' => 'Doe',
                'text' => 'Text test',
                'date' => new \DateTime('2015-06-12'),
            ),
            array(
                'firstname' => 'John',
                'lastname' => 'Doe',
                'text' => 'News 2',
                'date' => new \DateTime('2015-07-12'),
            ),
            array(
                'firstname' => 'Emma',
                'lastname' => 'Doe',
                'text' => 'Text <h4></h4>',
                'date' => new \DateTime('2015-05-12'),
            ),
            array(
                'firstname' => 'Juliet',
                'lastname' => 'Moe',
                'text' => 'Text test test',
                'date' => new \DateTime('2015-05-11'),
            ),
        );

        return $this->render('news/index.html.twig', array(
            'news' => $news
        ));
    }
}
