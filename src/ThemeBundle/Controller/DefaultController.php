<?php

namespace ThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/themebundle")
     */
    public function indexAction()
    {
        return $this->render('ThemeBundle:Default:index.html.twig');
    }
}
