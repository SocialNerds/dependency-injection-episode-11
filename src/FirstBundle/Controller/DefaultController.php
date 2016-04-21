<?php

namespace FirstBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {

        $data = array(
          'name' => 'SocialNerds',
          'time' => time(),
        );

        return $this->render(
          'FirstBundle:Default:index.html.twig',
          $data
        );
    }
}
